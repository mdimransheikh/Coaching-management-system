<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(!isset($_GET['teacherId']) || $_GET['teacherId']==NULL){
        header("Location:listTeacher.php");
    }else{
        $teacherId = $_GET['teacherId'];
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update teacher's data</h2>
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
            }
            if(!empty($file_name)){
                 if ($file_size >4048567) {
                 echo "<span class='error'>Image Size should be less then 4MB!</span>";
                }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
                }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_teacher
                          SET name='$name',
                            institute='$institute',
                            image='$uploaded_image'
                            WHERE id='$teacherId'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Teacher's Data Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Teache's data is not Updated !!</span>";
                }
                }
            }else{
                $query = "UPDATE tbl_teacher
                          SET name='$name',
                            institute='$institute'
                            WHERE id='$teacherId'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Teacher's Data Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Teacher's data is not Updated !!</span>";
                }
                }
            }
    ?>

    <?php 
        $querySelect = "SELECT * FROM tbl_teacher WHERE id='$teacherId'";
        $data = $db->select($querySelect);
        if($data){
            while($result = $data->fetch_assoc()){
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $result['name']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="institute" value="<?php echo $result['institute']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td>
                        <img src="<?php echo $result['image']; ?>" height="80px" width="100px"/>
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
            <?php } } ?>
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


