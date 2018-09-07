<?php include "inc/header.php"; ?>

<!--services start here-->
<div class="service" id="services" style="margin-top:80px">
	<div class="container">
		<div class="service-main">
			<div class="service-top wow fadeInDown" data-wow-delay="0.2s">
				<br/><h3>Our services</h3>
				<span class="heading-line"></span>
			</div>
			<div class="services-bottom">
			   <div class="serice-layer wow fadeInRight" data-wow-delay="0.1s">
		<?php
			$query = "SELECT * FROM tbl_post";
			$result = $db->select($query);
			if($result != false){
				while($post = $result->fetch_assoc()){
		?>
		<div class="col-md-6 services-grid">
			<div class="col-md-6 serv-img">
				<a href="details.php?id=<?php echo $post['id']; ?>"><img src="admin/<?php echo $post['image']; ?>" alt="" class="img-responsive" height="250px" width="250px" /></a>
					<div class="blog-discription">
					  <div class="theme-border">
						<div class="tg-display-table">
							<div class="tg-display-table-cell">
								<div class="blog-title">
									<h4><a href="details.php?id=<?php echo $post['id']; ?>"><?php echo $post['title']; ?></a></h4>
									<ul class="blod-meta">
										<li>Date: <?php echo $post['date']; ?></li>
										<div class="clearfix"> </div>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-md-6 serv-text">
				<h4><a href="details.php?id=<?php echo $post['id']; ?>"><?php echo $post['author']; ?></a></h4>
				<p><a href="details.php?id=<?php echo $post['id']; ?>"><?php echo $fm->textShorten($post['body']); ?></a></p>
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
