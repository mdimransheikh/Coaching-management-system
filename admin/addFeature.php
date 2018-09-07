<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add New Post</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $feature = mysqli_real_escape_string($db->link, $_POST['feature']);

            if($feature == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }else{
            $query = "INSERT INTO tbl_feature(feature) VALUES('$feature')";
            $inserted_rows = $db->insert($query);
            if ($inserted_rows) {
             echo "<span class='success'>Feature Inserted Successfully.
             </span>";
            }else {
             echo "<span class='error'>Feature is not inserted !!</span>";
            }
        }
    }
    ?>
         <form action="" method="POST">
            <table class="form">
                <tr>
                    <td>
                        <label>Feature:</label>
                    </td>
                    <td>
                        <input type="text" name="feature" placeholder="Enter the feature..." class="medium" />
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


