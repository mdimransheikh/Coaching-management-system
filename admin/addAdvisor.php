<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add new advisor</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $institute = mysqli_real_escape_string($db->link, $_POST['institute']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/team/".$unique_image;

            if($name == '' || $institute == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }elseif ($file_size >1048567) {
             echo "<span class='error'>Image Size should be less then 1MB!</span>";
            }elseif (in_array($file_ext, $permited) === false) {
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }else{
            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_advisor(image,name,institute) VALUES('$uploaded_image','$name','$institute')";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
             echo "<span class='success'>Advisor Inserted Successfully.
             </span>";
            }else {
             echo "<span class='error'>Advisor is not inserted !!</span>";
            }
        }
    }
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Institute</label>
                    </td>
                    <td>
                        <input type="text" name="institute"  class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <input type="file" name="image"  />
                    </td>
                </tr>
				<tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Save" />
                    </td>
                </tr>
            </table>
            </form>
        </div>
    </div>
</div>
        
<!-- Load TinyMCE -->
<script src="js/tiny-mce/jquery.tinymce.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {
    setupTinyMCE();
    setDatePicker('date-picker');
    $('input[type="checkbox"]').fancybutton();
    $('input[type="radio"]').fancybutton();
});
</script>

<?php include 'inc/footer.php'; ?>


