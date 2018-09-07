<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Slider List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial</th>
							<th width="20%">Title</th>
							<th width="15%">Image</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_slider";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $data['title']; ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="60px" width="80px"/></td>
							<td>
							<a href="editslider.php?sldierId=<?php echo $data['id']; ?>">Edit</a>
							 || 
							<a onclick="return confirm('Are you sure to delete?');"  href="deleteslider.php?sldierId=<?php echo $data['id']; ?>">Delete</a>
							 </td>
						</tr>
						<?php $i++; ?>
					<?php } } ?>
						
					</tbody>
				</table>
	
               </div>
            </div>
        </div>

        <script type="text/javascript">
        $(document).ready(function () {
            setupLeftMenu();
            $('.datatable').dataTable();
			setSidebarHeight();
        });
    </script>
    
<?php include 'inc/footer.php'; ?>  