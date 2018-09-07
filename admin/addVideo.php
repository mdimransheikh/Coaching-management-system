<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New video</h2>
        <div class="block">

<?php
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $content = mysqli_real_escape_string($db->link, $_POST['content']);

    $name = $_FILES['file']['name'];
    $temp = $_FILES['file']['tmp_name'];

    $div = explode('.', $name);
    $file_ext = strtolower(end($div));
    $unique_video = substr(md5(time()), 0, 10).'.'.$file_ext;
    $uploaded_video = "upload/".$unique_video;

    move_uploaded_file($temp, $uploaded_video);
    $query = "INSERT INTO tbl_video(name,content) VALUES('$uploaded_video','$content')";
    $inserted_rows = $db->insert($query);
    if ($inserted_rows) {
     echo "<span class='success'>Video Inserted Successfully.
     </span>";
    }else {
     echo "<span class='error'>Video Not Inserted !</span>";
    }
    }
  ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Upload video</label>
                    </td>
                    <td>
                        <input type="file" name="file"  />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Video description: </label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="content" >
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="submit" Value="Upload!" />
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


