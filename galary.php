<?php include "inc/header.php"; ?>

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

<!--gallery-->
<div class="portfolio" id="portfolio" style="margin-top:80px">
   <div class="container">
		<div class="sap_tabs">
		 <div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
		  <ul class="resp-tabs-list">
		  	 	<li class="resp-tab-item" aria-controls="tab_item-0" 				role="tab"><span>All</span></li>
			  	<li class="resp-tab-item" aria-controls="tab_item-1" role="tab"><span>JSC</span></li>
			  	<li class="resp-tab-item" aria-controls="tab_item-2" role="tab"><span>SSC</span></li>
			 		<li class="resp-tab-item" aria-controls="tab_item-3" role="tab"><span>HSC</span></li>
			  	<div class="clearfix"> </div>
		  </ul>
			<div class="resp-tabs-container">

			    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
					<div class="tab_img">
					<?php 
						$query = "SELECT * FROM tbl_gallary";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<div class="col-md-3 img-top ">
	   		  			   <div class="gal-one">
								<a href="#image-<?php echo $i; ?>">
									<figure class="effect-apollo">
										<img src="admin/<?php echo $data['image']; ?>" alt="image" width="400px" height="250px" class="img-responsive"/>
										<div class="link-top">
											 <i class="link"> </i>
										 </div>
									</figure>
								</a>
									<div class="lb-overlay" id="image-<?php echo $i; ?>">
											<img src="admin/<?php echo $data['image']; ?>" alt="image1" class="img-responsive">
											<div class="gal-info">
												<h3></h3>
												<p></p>
											  <div class="clearfix"> </div>
											</div>
											<a href="" class="lb-close">Close</a>
									</div>
							</div>
						</div>
							<?php $i++; ?>
						<?php } } ?>
			     	</div>
		  		</div>

			    <div class="tab-1 resp-tab-content" aria-labelledby="tab_item-1">
			     <div class="tab_img">
			     <?php 
						$query = "SELECT * FROM tbl_gallary WHERE gclass='SSC'";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
					  <div class="col-md-3 img-top ">
	   		  			   <div class="gal-one">
								<a href="#image-<?php echo $i; ?>">
									<figure class="effect-apollo">
										<img src="admin/<?php echo $data['image']; ?>" alt="image" width="400px" height="250px" class="img-responsive"/>
										<div class="link-top">
											 <i class="link"> </i>
										 </div>
									</figure>
								</a>
									<div class="lb-overlay" id="image-<?php echo $i; ?>">
											<img src="admin/<?php echo $data['image']; ?>" alt="image1" class="img-responsive">
											<div class="gal-info">
												<h3></h3>
												<p></p>
											  <div class="clearfix"> </div>
											</div>
											<a href="" class="lb-close">Close</a>
									</div>
							</div>
						</div>
							<?php $i++; ?>
						<?php } } ?>
			     	</div>
		  		</div>

		  		<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
			     <div class="tab_img">
			     <?php 
						$query = "SELECT * FROM tbl_gallary WHERE gclass='JSC'";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
					  <div class="col-md-3 img-top ">
	   		  			   <div class="gal-one">
								<a href="#image-<?php echo $i; ?>">
									<figure class="effect-apollo">
										<img src="admin/<?php echo $data['image']; ?>" alt="image" width="400px" height="250px" class="img-responsive"/>
										<div class="link-top">
											 <i class="link"> </i>
										 </div>
									</figure>
								</a>
									<div class="lb-overlay" id="image-<?php echo $i; ?>">
											<img src="admin/<?php echo $data['image']; ?>" alt="image1" class="img-responsive">
											<div class="gal-info">
												<h3></h3>
												<p></p>
											  <div class="clearfix"> </div>
											</div>
											<a href="" class="lb-close">Close</a>
									</div>
							</div>
						</div>
							<?php $i++; ?>
						<?php } } ?>
			     	</div>
		  		</div>
		  		<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-2">
			     <div class="tab_img">
			     <?php 
						$query = "SELECT * FROM tbl_gallary WHERE gclass='HSC'";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
					  <div class="col-md-3 img-top ">
	   		  			   <div class="gal-one">
								<a href="#image-<?php echo $i; ?>">
									<figure class="effect-apollo">
										<img src="admin/<?php echo $data['image']; ?>" alt="image" width="400px" height="250px" class="img-responsive"/>
										<div class="link-top">
											 <i class="link"> </i>
										 </div>
									</figure>
								</a>
									<div class="lb-overlay" id="image-<?php echo $i; ?>">
											<img src="admin/<?php echo $data['image']; ?>" alt="image1" class="img-responsive">
											<div class="gal-info">
												<h3></h3>
												<p></p>
											  <div class="clearfix"> </div>
											</div>
											<a href="" class="lb-close">Close</a>
									</div>
							</div>
						</div>
							<?php $i++; ?>
						<?php } } ?>
			     	</div>
		  		</div>
		    
		   	</div>
  		</div>
       </div>
    </div>
</div>
<!--gallery-->

<?php include "inc/footer.php"; ?>
