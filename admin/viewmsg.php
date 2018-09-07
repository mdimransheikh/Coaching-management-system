<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
    if(isset($_GET['msgid'])){
        $id = $_GET['msgid'];
    }
?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>View message</h2>
                <div class="block">               
                 <form action="inbox.php" method="post">
                    <table class="form">
                        <?php 
                            $query = "select * from tbl_contact where id='$id'";
                            $result = $db->select($query);
                            if($result){
                                while($contact = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td>
                                <label>To</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $contact['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Name</label>
                            </td>
                            <td>
                                <input type="text" readonly value="<?php echo $contact['name']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message" >
                                    <?php echo $contact['body']; ?>
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Ok" />
                            </td>
                        </tr>
                <?php } } ?>
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
 <!-- Load TinyMCE -->
<?php include 'inc/footer.php'; ?>