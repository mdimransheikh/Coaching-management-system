<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Gallary image list</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="10%">Serial</th>
							<th width="35%">Image</th>
							<th width="25%">Class</th>
							<th width="35%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_gallary";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="60px" width="80px"/></td>
							<td><?php echo $data['gclass']; ?></td>
							<td>
							<a href="editGallary.php?editId=<?php echo $data['id']; ?>">Edit</a>
							 || 
							<a onclick="return confirm('Are you sure to delete?');"  href="deleteGallary.php?deleteId=<?php echo $data['id']; ?>">Delete</a>
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