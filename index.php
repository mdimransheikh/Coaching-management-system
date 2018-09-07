<?php include "inc/header.php"; ?>

<!--about start here-->
<div class="about" id="about" style="margin-top:80px">
	<div class="container">
		<div class="about-main">
			<div class="about-bottom" style="margin-top:20px">

				<div class="col-md-6 about-left wow fadeInLeft" data-wow-delay="0.2s">
				<center><h3>Notice Board</h3></center>
					<?php
						$query = "SELECT * FROM tbl_feature";
						$result = $db->select($query);
						if($result){
							while($feature = $result->fetch_assoc()){
					?>
					<div class="about-grid">
						<div class="about-icon">
							<a href="#" class="#"> <span class="learn"> </span> </a>
						</div>
						<div class="about-text">
							<p><?php echo $feature['feature']; ?></p>
						</div>
					   <div class="clearfix"> </div>
					</div><br/>
					<?php } } ?>

				</div>
				<div class="col-md-6 about-right wow fadeInRight" data-wow-delay="0.1s">
					<?php include "inc/slider.php"; ?>
				</div>
			   <div class="clearfix"> </div>
			</div>
		</div>
	</div>
</div>
<!--about end here-->

<!--Video starts here-->
<div class="advantages">
	<div class="container">
	<?php 
		$query = "SELECT * FROM tbl_video ORDER BY id DESC LIMIT 1";
		$result = $db->select($query);
		if($result != false){
			$data = mysqli_fetch_array($result);
	?>
		<div class="advantages-main" style="margin-bottom:-30px;">
			<div class="col-md-6 advantage-left wow fadeInLeft" data-wow-delay="0.1s">
				<video id="video" width="530" height="370" controls>
					<source src="admin/<?php echo $data['name']; ?>" type="video/mp4" />
		   </div>
		   <div class="col-md-6 advantage-left wow fadeInRight" data-wow-delay="0.1s" style="padding-top:30px">
				<p><?php echo $data['content']; ?></p>
		   </div>
		</div>
	<?php } ?>	
	</div>
</div>
<!--Video ends here-->
<hr/>
<!--advantages start here-->
<div class="advantages">
	<div class="container">
		<?php
				$queryAdvantage = "SELECT * FROM tbl_welcome ORDER BY id DESC LIMIT 1";
				$result = $db->select($queryAdvantage);
				if($result != false){
					$value = mysqli_fetch_array($result);
					$row = mysqli_num_rows($result);
		?>
		<div class="advantages-main">
			<h4>Recent Activities</h4>
			<div class="col-md-6 advantage-left wow fadeInLeft" data-wow-delay="0.1s">
				<h3><?php echo $value['title']; ?></h3>
			    <p><?php echo $value['body']; ?></p>
		   </div>
		   <div class="col-md-6 advantage-rit wow fadeInRight" data-wow-delay="0.1s">
		   	    <div class="advant-layer1">
		   	    	<div class="adv-layer1-text">
		   	    		<h5><?php echo $value['institute']; ?></h5>
		   	    		<p><?php echo $value['position']; ?></p>
						<p><?php echo $value['name']; ?></p>
		   	    	</div>
		   	    	<div class="advater-img">
		   	    		<img src="admin/<?php echo $value['image']; ?>"  alt="">
		   	    	</div>
		   	      <div class="clearfix"> </div>
		   	    </div>
		   	    <div class="advant-layer2">
		   	    	<div class="adv-layer2-text">
		   	    		<img src="images/left.png" alt="">
		   	    		<p><?php echo $value['slogan']; ?></p>
		   	    	</div>
		   	    	<div class="advater-img">
		   	    		<img src="images/arrow2.png"  alt="">
		   	    	</div>
		   	      <div class="clearfix"> </div>
		   	    </div>
		   </div>
		</div>
<?php } ?>
	</div>
</div>
<!--advantages end here-->

<?php include "inc/footer.php"; ?>
