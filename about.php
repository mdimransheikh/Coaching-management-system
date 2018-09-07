<?php include "inc/header.php"; ?>

<!--team start here-->
<div class="team" style="margin-top: 40px">
	<div class="container">
		<div class="team-main" style="margin-top:110px">
			<div class="team-top wow fadeInDown" data-wow-delay="0.1s">
				<h3>Our Management Team</h3>
			</div>
			<div class="team-bottom wow fadeInRight" data-wow-delay="0.1s">
				<?php
					$query = "SELECT * FROM tbl_team LIMIT 3";
					$result = $db->select($query);
					if($result){
						while($data = $result->fetch_assoc()){
				?>
			  <div class="col-md-4 team-grids">
			    <!-- normal -->
			    <div class="ih-item circle effect5"><a href="#">
			        <div class="img"><img src="admin/<?php echo $data['image']; ?>" alt="img" class="img-responsive" width="220px" height="220px" /></div>
			        <div class="info">
			          <div class="info-back">
			            <h3><?php echo $data['name']; ?></h3>
			          </div>
			        </div></a></div>
			        <div class="team-bottom">
			        	  <p><?php echo $data['institute']; ?></p>
									<ul>
			        	  	<li><a href="<?php echo $data['fb_link']; ?>" class="fa"> </a></li>
			        	  	<li><a href="<?php echo $data['tw_link']; ?>" class="tw"> </a></li>
			        	  	<li><a href="<?php echo $data['g_link']; ?>" class="g"> </a></li>
			        	  </ul>
			        </div>
			    <!-- end normal -->
			   </div>
				 <?php } } ?>

			  </div>
			</div>
		</div>
	</div>
<!--team end here-->

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
</script>

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
			<h4>Welcome message</h4>
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
<hr/>
<!--stuff start here-->
<div class="team">
	<div class="container">
		<div class="team-main" style="">
			<div class="team-top wow fadeInDown" data-wow-delay="0.1s">
				<h3>Our Stuffs</h3>
			</div>
			<div class="team-bottom wow fadeInRight" data-wow-delay="0.1s">
				<?php
					$query = "SELECT * FROM tbl_stuff";
					$result = $db->select($query);
					if($result){
						while($data = $result->fetch_assoc()){
				?>
			  <div class="col-md-3 team-grids">
			    <!-- normal -->
			    <div class="ih-item circle effect5"><a href="#">
			        <div class="img"><img src="admin/<?php echo $data['image']; ?>" alt="img" class="img-responsive" width="120px" height="120px" /></div>
			        <div class="info">
			          <div class="info-back">
			            <h3><?php echo $data['name']; ?></h3>
			          </div>
			        </div></a></div>
			        <div class="team-bottom">
			        	  <p><?php echo $data['institute']; ?></p>
			        </div>
			    <!-- end normal -->
			   </div>
				 <?php } } ?>
			  </div>
			</div>
		</div>
	</div>
<!--stuff end here-->

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
</script>
<!--teacher start here-->
<div class="team">
	<div class="container">
		<div class="team-main" style="">
			<div class="team-top wow fadeInDown" data-wow-delay="0.1s">
				<h3>Our Teachers</h3>
			</div>
			<div class="team-bottom wow fadeInRight" data-wow-delay="0.1s">
				<?php
					$query = "SELECT * FROM tbl_teacher";
					$result = $db->select($query);
					if($result){
						while($data = $result->fetch_assoc()){
				?>
			  <div class="col-md-3 team-grids">
			    <!-- normal -->
			    <div class="ih-item circle effect5"><a href="#">
			        <div class="img"><img src="admin/<?php echo $data['image']; ?>" alt="img" class="img-responsive" width="120px" height="120px" /></div>
			        <div class="info">
			          <div class="info-back">
			            <h3><?php echo $data['name']; ?></h3>
			          </div>
			        </div></a></div>
			        <div class="team-bottom">
			        	  <p><?php echo $data['institute']; ?></p>
			        </div>
			    <!-- end normal -->
			   </div>
				 <?php } } ?>
			  </div>
			</div>
		</div>
	</div>
<!--teacher end here-->

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
</script>

<!--advisor start here-->
<div class="team">
	<div class="container">
		<div class="team-main" style="">
			<div class="team-top wow fadeInDown" data-wow-delay="0.1s">
				<h3>Our Advisors</h3>
			</div>
			<div class="team-bottom wow fadeInRight" data-wow-delay="0.1s">
				<?php
					$query = "SELECT * FROM tbl_advisor";
					$result = $db->select($query);
					if($result){
						while($data = $result->fetch_assoc()){
				?>
			  <div class="col-md-3 team-grids">
			    <!-- normal -->
			    <div class="ih-item circle effect5"><a href="#">
			        <div class="img"><img src="admin/<?php echo $data['image']; ?>" alt="img" class="img-responsive" width="120px" height="120px" /></div>
			        <div class="info">
			          <div class="info-back">
			            <h3><?php echo $data['name']; ?></h3>
			          </div>
			        </div></a></div>
			        <div class="team-bottom">
			        	  <p><?php echo $data['institute']; ?></p>
			        </div>
			    <!-- end normal -->
			   </div>
				 <?php } } ?>
			  </div>
			</div>
		</div>
	</div>
<!--advisor end here-->

<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
<script type="text/javascript">
			    $(document).ready(function () {
			        $('#horizontalTab').easyResponsiveTabs({
			            type: 'default', //Types: default, vertical, accordion
			            width: 'auto', //auto or any width like 600px
			            fit: true   // 100% fit in a container
			        });
			    });
</script>

<?php include "inc/footer.php"; ?>
