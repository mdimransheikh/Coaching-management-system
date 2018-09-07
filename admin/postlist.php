<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>


        <div class="grid_10">
            <div class="box round first grid">
                <h2>Post List</h2>
                <div class="block">  
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th width="5%">Serial</th>
							<th width="15%">Author</th>
							<th width="15%">Title</th>
							<th width="30%">Description</th>
							<th width="15%">Image</th>
							<th width="15%">Date</th>
							<th width="10%">Action</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$query = "SELECT * FROM tbl_post";
						$result = $db->select($query);
						if($result){
							$i=1;
							while($data = $result->fetch_assoc()){
					?>
						<tr class="odd gradeX">
							<td><?php echo $i; ?></td>
							<td><?php echo $data['author']; ?></td>
							<td><?php echo $data['title']; ?></td>
							<td><?php echo $fm->textShorten($data['body']); ?></td>
							<td><img src="<?php echo $data['image']; ?>" height="60px" width="80px"/></td>
							<td><?php echo $fm->formatDate($data['date']); ?></td>
							<td>
							<a href="editpost.php?editId=<?php echo $data['id']; ?>">Edit</a>
							 || 
							<a onclick="return confirm('Are you sure to delete?');"  href="deletepost.php?deleteId=<?php echo $data['id']; ?>">Delete</a>
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