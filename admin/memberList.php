<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">
            <div class="box round first grid">
                <h2>Member List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="2%">Serial</th>
							<th width="15%">Name</th>
							<th width="15%">Institute</th>
							<th width="15%">Image</th>
							<th width="15%">Facebook</th>
							<th width="15%">Twitter</th>
							<th width="15%">Google plus</th>
							<th width="8%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_team";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $data['name']; ?></td>
							<td><?php echo $data['institute']; ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="60px" width="80px"/></td>
							<td><?php echo $data['fb_link']; ?></td>
							<td><?php echo $data['tw_link']; ?></td>
							<td><?php echo $data['g_link']; ?></td>
							<td>
							<a href="editMember.php?memberId=<?php echo $data['id']; ?>">Edit</a>
							 || 
							<a onclick="return confirm('Are you sure to delete?');"  href="deleteMember.php?deleteMember=<?php echo $data['id']; ?>">Delete</a>
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