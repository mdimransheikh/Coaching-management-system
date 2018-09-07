<?php include "inc/header.php"; ?>

<?php 
	if(!isset($_GET['id']) || $_GET['id']==NULL){
		header("Location:activities.php");
	}else{
		$id = $_GET['id'];
	}
?>
<!--services start here-->
<div class="service" id="services" style="margin-top:110px">
	<div class="container">
		<div class="service-main">
			<div class="service-top wow fadeInDown" data-wow-delay="0.2s">
				<br/><h3>Recent Activities</h3>
				<span class="heading-line"> </span>
			</div>
			<div class="services-bottom">
			   <div class="serice-layer wow fadeInRight" data-wow-delay="0.1s">
	<?php 
		$query = "SELECT * FROM tbl_activities WHERE id='$id'";
		$result = $db->select($query);
		if($result){
			while($data = $result->fetch_assoc()){
	?>
		<div class="col-md-12 services-grid">
			<div class="col-md-4 serv-img">
				<a href="#"><img src="admin/<?php echo $data['image']; ?>" alt="" class="img-responsive"></a>
					<div class="blog-discription">
					  <div class="theme-border">
						<div class="tg-display-table">
							<div class="tg-display-table-cell">
								<div class="blog-title">
									<h4><?php echo $data['heading']; ?></h4>
									<ul class="blod-meta">
										<div class="clearfix"> </div>
									</ul>										
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-8 serv-text">
				<h4><?php echo $data['heading']; ?></h4>
				<p><?php echo $data['body']; ?></p>
			</div>
		<div class="clearfix"> </div>
		</div>

		<?php } } ?>
				
			<div class="clearfix"> </div>
		    </div>
		     
		   </div>
		</div>
	</div>
</div>
<!--services end here-->

<?php include "inc/footer.php"; ?>