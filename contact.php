<?php include "inc/header.php"; ?>

<?php 
	if($_SERVER['REQUEST_METHOD']=='POST'){
		$fname = $fm->validation($_POST['name']);
		$femail = $fm->validation($_POST['email']);
		$fbody = $fm->validation($_POST['body']);

		$name = mysqli_real_escape_string($db->link, $fname);
		$email = mysqli_real_escape_string($db->link, $femail);
		$body = mysqli_real_escape_string($db->link, $fbody);

		$error = "";
		if(empty($name)){
			$error = "Name must not be empty";
		}elseif(empty($email)){
			$error = "Email must not be empty";
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$error = "Please enter valid email";
		}elseif(empty($body)){
			$error = "Message must not be empty";
		}else{
			$query = "INSERT INTO tbl_contact(name, email, body) VALUES('$name','$email','$body')";
			$inserted_row = $db->select($query);
			if($inserted_row){
				$msg = "<span style='color:green;font-size:24px'>Message is sent successfully</span>";
			}else{
				$msg = "<span style='color:green;font-size:24px'>Message is sent successfully</span>";
			}
		}
	}
?>

<!--contact start here-->
<div class="contact" id="contact" style="margin-top:110px">
	<div class="container">
		<div class="contact-main">
			<div class="contact-top wow fadeInDown" data-wow-delay="0.3s">
				<br/><h3>Say Hello</h3>
				<span class="heading-line"> </span>
				<p>We are always connected with you.</p>
				<?php 
					if(isset($msg)){
						echo "<span style='color:green;font-size:24px'>$msg</span>";
					}

					if(isset($error)){
						echo "<span style='color:red;font-size:24px'>$error</span>";
					}
				?>
			</div>
			<div class="contact-bottom">
				<div class="col-md-6 contact-left wow fadeInLeft" data-wow-delay="0.2s">
					<form action="" method="POST">
						<input type="text"  name="name" value="Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Name';}">
						<input type="text" name="email" value="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email';}">
						<textarea name="body" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Message';}">Message</textarea>
						<input type="submit" name="submit" value="Send Message">
					</form>
				</div>
				<div class="col-md-6 contact-right wow fadeInRight" data-wow-delay="0.3s">
					<h4>Contact Info</h4>
					<p></p>
					<ul>
			    	<li><span class="glyphicon glyphicon-map-marker" aria-hidden="true"> </span>Jessore, Khulna, Bangladesh.</li>
			    	<li><span class="glyphicon glyphicon-phone" aria-hidden="true"> </span>+1284 485 978</li>
			    	<li><span class="glyphicon glyphicon-envelope" aria-hidden="true"> </span><a href="mailto:info@example.com">macscoaching@example.com</a></li>
			    </ul>

				</div>
				 <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--contact end here-->


<!--footer start here-->
<div class="footer">
	<div class="container">
	<?php 
		$query = "SELECT * FROM tbl_footer ORDER BY id DESC LIMIT 1";
		$result = $db->select($query);
		if($result){
			$value = mysqli_fetch_array($result);
	?>
		<div class="footer-main">
			<div class="col-md-4 ftr-grid wow zoomIn" data-wow-delay="0.3s">
				<h3><?php echo $value['title']; ?></h3>
				<span class="ftr-line"> </span>
				<p><?php echo $value['content']; ?></p>
				<p></p>
			</div>
			<div class="col-md-4 ftr-grid ftr-mid wow zoomIn" data-wow-delay="0.3s">
				 <h3>Find us on social media</h3>
				 <span class="ftr-line flm"> </span>
				 <ul >
				 	<li><a href="<?php echo $value['fb_link']; ?>"><span class="fa"> </span></a></li>
				 	<li><a href="<?php echo $value['tw_link']; ?>"><span class="tw"> </span></a></li>
				 	<li><a href="<?php echo $value['g_link']; ?>"><span class="gmail"> </span></a></li>
				 </ul>
			</div>
			<div class="col-md-4 ftr-grid ftr-rit wow zoomIn" data-wow-delay="0.3s">
				 <h3>Address</h3>
				 <span class="ftr-line flr"> </span>
				 <p><?php echo $value['address']; ?></p>
			</div>
			<div class="clearfix"> </div>
		</div>
		<?php } ?>
	</div>
</div>
<!--footer end here-->
<?php include "inc/footer.php"; ?>
