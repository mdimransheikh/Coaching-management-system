<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(!isset($_GET['editId']) || $_GET['editId']==NULL){
        header("Location:postlist.php");
    }else{
        $postid = $_GET['editId'];
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $author = mysqli_real_escape_string($db->link, $_POST['author']);
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $body = mysqli_real_escape_string($db->link, $_POST['body']);

            $permited  = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "upload/".$unique_image;

            if($author == '' || $title == '' || $body == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }
            if(!empty($file_name)){
                 if ($file_size >1048567) {
                 echo "<span class='error'>Image Size should be less then 1MB!</span>";
                }elseif (in_array($file_ext, $permited) === false) {
                 echo "<span class='error'>You can upload only:-"
                 .implode(', ', $permited)."</span>";
                }else{
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "UPDATE tbl_post
                          SET title='$title',
                            author='$author',
                            image='$uploaded_image',
                            body='$body'
                            WHERE id='$postid'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Service Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Service is not Updated !!</span>";
                }
                }
            }else{
                $query = "UPDATE tbl_post
                          SET title='$title',
                            author='$author',
                            body='$body'
                            WHERE id='$postid'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Service Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Service is not Updated !!</span>";
                }
                }
            }
    ?>

    <?php 
        $querySelect = "SELECT * FROM tbl_post WHERE id='$postid'";
        $data = $db->select($querySelect);
        if($data){
            while($result = $data->fetch_assoc()){
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Author</label>
                    </td>
                    <td>
                        <input type="text" name="author" value="<?php echo $result['author']; ?>" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" value="<?php echo $result['title']; ?>" class="medium" />
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
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="body" >
                            <?php echo $result['body']; ?>
                        </textarea>
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


