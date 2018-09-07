<?php include "inc/header.php"; ?>

<!--services start here-->
<div class="service" id="services" style="margin-top:80px">
	<div class="container">
		<div class="service-main">
			<div class="service-top wow fadeInDown" data-wow-delay="0.2s">
				<br/><h3>Our Recent Activities</h3>
				<span class="heading-line"></span>
			</div>
			<div class="services-bottom">
			   <div class="serice-layer wow fadeInRight" data-wow-delay="0.1s">
		<?php
			$query = "SELECT * FROM tbl_activities";
			$result = $db->select($query);
			if($result != false){
				while($post = $result->fetch_assoc()){
		?>
		<div class="col-md-12 services-grid">
			<div class="col-md-2 serv-text">
			</div>
			<div class="col-md-8 serv-text">
				<h4><a href="activedetails.php?id=<?php echo $post['id']; ?>"> <span class="glyphicon glyphicon-asterisk" aria-hidden="true"></span> <?php echo $post['heading']; ?></a></h4>
			</div>
		  <div class="clearfix"> </div>
		</div>
		<?php } }?>
				<div class="clearfix"> </div>
		     </div>
		   </div>
		</div>
	</div>
</div>
<!--services end here-->

<?php include "inc/footer.php"; ?>
