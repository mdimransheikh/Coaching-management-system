<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Update welcome message</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);
            $institute = mysqli_real_escape_string($db->link, $_POST['institute']);
            $position = mysqli_real_escape_string($db->link, $_POST['position']);
            $name = mysqli_real_escape_string($db->link, $_POST['name']);
            $slogan = mysqli_real_escape_string($db->link, $_POST['slogan']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($title == '' || $body == '' || $institute == '' || $position == '' || $name == '' || $slogan == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }
            if(!empty($file_name)){
            if(in_array($file_ext, $permited) === false){
             echo "<span class='error'>You can upload only:-"
             .implode(', ', $permited)."</span>";
            }else{
            move_uploaded_file($file_temp, $uploaded_image);

            $query = "UPDATE tbl_welcome
                        SET
                        title='$title',
                        body='$body',
                        institute='$institute',
                        position='$position',
                        name='$name',
                        image='$uploaded_image',
                        slogan='$slogan'
                        WHERE id = '1'";
            $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span class='success'>Welcome message Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Welcome message is not updated !!</span>";
            }
        }
        }else{
            $query = "UPDATE tbl_welcome
                        SET 
                        title='$title',
                        body='$body',
                        institute='$institute',
                        position='$position',
                        name='$name',
                        slogan='$slogan'
                        WHERE id = '1'";
            $updated_rows = $db->update($query);
            if ($updated_rows) {
             echo "<span class='success'>Welcome message Updated Successfully.
             </span>";
            }else {
             echo "<span class='error'>Welcome message is not updated !!</span>";
            }
        }
    }
    ?>

    <?php 
        $query = "SELECT * FROM tbl_welcome WHERE id='1'";
        $result = $db->select($query);
        if($result){
            while($data = $result->fetch_assoc()){
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title"  class="medium" required value="<?php echo $data['title']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Body</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" >
                        <?php echo $data['body']; ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Institute</label>
                    </td>
                    <td>
                        <input type="text" name="institute"  class="medium" required value="<?php echo $data['institute']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Position</label>
                    </td>
                    <td>
                        <input type="text" name="position"  class="medium" required value="<?php echo $data['position']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Name</label>
                    </td>
                    <td>
                        <input type="text" name="name"  class="medium" required value="<?php echo $data['name']; ?>"/>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Upload Image</label>
                    </td>
                    <td><img src="<?php echo $data['image']; ?>" />
                        <input type="file" name="image"  />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Slogan</label>
                    </td>
                    <td>
                        <input type="text" name="slogan"  class="medium" required value="<?php echo $data['slogan']; ?>"/>
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


