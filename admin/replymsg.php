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
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $toemail = $fm->validation($_POST['toemail']);
    $fromemail = $fm->validation($_POST['fromemail']); 
    $subject = $fm->validation($_POST['subject']); 
    $message = $fm->validation($_POST['message']);

    $sendEmail =  mail($toemail ,$subject ,$message);
    if($sendEmail){
        echo "Message sent successfully";
    }else{
        echo "Something went wrong.!!";
    }
}
?>
                <div class="block">               
                 <form action="" method="post">
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
                                <input type="text"  name ="toemail" readonly value="<?php echo $contact['email']; ?>" class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>From</label>
                            </td>
                            <td>
                                <input type="text" name="fromemail" placeholder="please enter your email.." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Subject</label>
                            </td>
                            <td>
                                <input type="text" name="subject" placeholder="please enter subject.." class="medium" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Message</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="message" placeholder="please enter your message.." >
                                    
                                </textarea>
                            </td>
                        </tr>
						<tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Send" />
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