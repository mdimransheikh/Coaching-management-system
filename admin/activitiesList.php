<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Member List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial</th>
							<th width="15%">Heading</th>
							<th width="20%">Image</th>
							<th width="50%">Description</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_activities";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $fm->textShorten($data['heading'], 50); ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="60px" width="80px"/></td>
							<td><?php echo $fm->textShorten($data['body'], 200); ?></td>
							<td>
							<a href="editActivities.php?activeId=<?php echo $data['id']; ?>">Edit</a>
							 || 
							<a onclick="return confirm('Are you sure to delete?');"  href="deleteActivities.php?deleteId=<?php echo $data['id']; ?>">Delete</a>
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