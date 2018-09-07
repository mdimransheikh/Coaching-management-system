<section>
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel" data-slide-to="0"></li>
                <li data-target="#carousel" data-slide-to="1"></li>
                <li data-target="#carousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="item active">
                    <img src="admin/upload/slider/1.jpg" alt="Slide 1" height="450px" width="550px" />
                </div>
                <?php 
                    $query = "SELECT * FROM tbl_slider";
                    $result = $db->select($query);
                    if($result){
                        while($data = $result->fetch_assoc()){
                ?>
                <div class="item">
                    <img src="admin/<?php echo $data['image']; ?>" alt="Slide 2" height="450px" width="550px" />
                </div>
                <?php } } ?>
            </div>
            <a href="#carousel" class="left carousel-control" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a href="#carousel" class="right carousel-control" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
    </section><!--/#main-slider-->
