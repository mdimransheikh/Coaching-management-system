<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(!isset($_GET['featureId']) || $_GET['featureId']==NULL){
        header("Location:Featurelist.php");
    }else{
        $featureId = $_GET['featureId'];
    }
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Add a new feature</h2>
        <div class="block">

    <?php 
        if($_SERVER['REQUEST_METHOD']=="POST"){
            $feature = mysqli_real_escape_string($db->link, $_POST['feature']);

            if($feature == ''){
                echo "<span class='error'>Field must not be empty. !!</span>";
            }else{
                $query = "UPDATE tbl_feature
                          SET feature='$feature'
                            WHERE id='$featureId'";
                $updated_rows = $db->update($query);
                if ($updated_rows) {
                 echo "<span class='success'>Feature Updated Successfully.
                 </span>";
                }else {
                 echo "<span class='error'>Feture is not Updated !!</span>";
                }
                }
            }
    ?>

    <?php 
        $querySelect = "SELECT * FROM tbl_feature WHERE id='$featureId'";
        $data = $db->select($querySelect);
        if($data){
            while($result = $data->fetch_assoc()){
    ?>
         <form action="" method="POST" enctype="multipart/form-data">
            <table class="form">
                <tr>
                    <td>
                        <label>Title</label>
                    </td>
                    <td>
                        <input type="text" name="feature" value="<?php echo $result['feature']; ?>" class="medium" />
                    </td>
                </tr>
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


