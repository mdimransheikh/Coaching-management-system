<?php include "inc/header.php"; ?>

<!--Result start here-->
<div class="service" id="services" style="margin-top:80px">
	<div class="container">
		<div class="service-main">
			<div class="service-top wow fadeInDown" data-wow-delay="0.2s">
				<br/><h3>Results</h3>
			</div>
			<div class="services-bottom">
			   <div class="serice-layer wow fadeInRight" data-wow-delay="0.1s">
	<?php 
		$query = "SELECT * FROM tbl_result";
		$result = $db->select($query);
		if($result){
			while($data = $result->fetch_assoc()){
	?>
		<div class="col-md-12 services-grid">
			<div class="col-md-8 serv-text">
				<h3>Year : <?php echo $data['year']; ?></h3>
				<h5>Batch : <?php echo $data['batch']; ?></h5>
				<p><?php echo $data['body']; ?></p>
			</div>
			<div class="col-md-4 serv-img">
				<a href="#"><img src="admin/<?php echo $data['image']; ?>" alt="" class="img-responsive"></a>
					<div class="blog-discription">
					  <div class="theme-border">
						<div class="tg-display-table">
							<div class="tg-display-table-cell">
								<div class="blog-title">
									<h4><?php echo $data['batch']; ?></h4>
									<ul class="blod-meta">
										<div class="clearfix"> </div>
									</ul>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<div class="clearfix"> </div>
		</div>
		------------------------------------------------------------------------------------------------------
		<?php } } ?>
				
		<div class="clearfix"> </div>
    </div>
   </div>
</div>
</div>
</div>
<!--Result end here-->

<?php include "inc/footer.php"; ?>