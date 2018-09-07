<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add new member</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $title = mysqli_real_escape_string($db->link, $_POST['title']);
            $content = mysqli_real_escape_string($db->link, $_POST['content']);
            $address = mysqli_real_escape_string($db->link, $_POST['address']);
            $fb_link = mysqli_real_escape_string($db->link, $_POST['fb_link']);
            $tw_link = mysqli_real_escape_string($db->link, $_POST['tw_link']);
            $g_link = mysqli_real_escape_string($db->link, $_POST['g_link']);

            $query = "INSERT INTO tbl_footer(title,content,address,fb_link,tw_link,g_link) VALUES('$title','$content','$address','$fb_link','$tw_link','$g_link')";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
             echo "<span class='success'>Footer Added Successfully.!!
             </span>";
            }else {
             echo "<span class='error'>Footer is not added !!</span>";
            }
        }
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="title" class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td style="vertical-align: top; padding-top: 9px;">
                        <label>Content</label>
                    </td>
                    <td>
                        <textarea class="tinymce" name="content" ></textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Address</label>
                    </td>
                    <td>
                        <input type="text" name="address"  class="medium" required />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Fb link:</label>
                    </td>
                    <td>
                        <input type="text" name="fb_link" placeholder="Such as http://www.facebook.com/jessoresheba/" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Twitter link:</label>
                    </td>
                    <td>
                        <input type="text" name="tw_link" placeholder="Such as http://www.twitter.com/jessoresheba/" class="medium" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label>Google+ link:</label>
                    </td>
                    <td>
                        <input type="text" name="g_link" placeholder="Such as http://www.google.com/jessoresheba/" class="medium" />
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


