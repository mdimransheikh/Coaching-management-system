<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

<?php 
	if(isset($_GET['seenid'])){
	$id = $_GET['seenid'];
	$querySeen = "UPDATE tbl_contact
					SET status = '1'
					WHERE id='$id'";
	$updated_row = $db->update($querySeen);
	if($updated_row){
		echo "<span style='font-size:18px;color:red;'>Message is sent to seenbox</span>";
	}else{
		echo "<span style='font-size:18px;color:red;'>Message is not sent to seenbox</span>";
	}
	}
?>

<div class="grid_10">
    <div class="box round first grid">
        <h2>Inbox</h2>
        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">Serial No.</th>
					<th width="15%">Name</th>
					<th width="20%">Email</th>
					<th width="30%">Message</th>
					<th width="10%">Date</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$query = "SELECT * FROM tbl_contact WHERE status='0' ORDER BY id DESC";
				$result = $db->select($query);
				if($result){
					$i=1;
					while($message = $result->fetch_assoc()){
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $message['name']; ?></td>
					<td><?php echo $message['email']; ?></td>
					<td><?php echo $fm->textShorten($message['body']); ?></td>
					<td><?php echo $fm->formatDate($message['date']); ?></td>
					<td>
						<a href="viewmsg.php?msgid=<?php echo $message['id']; ?>">View</a> || 
						<a href="replymsg.php?msgid=<?php echo $message['id']; ?>">Reply</a> ||
						<a onclick="return confirm('Are you sure to send the messageinto seen box ?');" href="?seenid=<?php echo $message['id']; ?>">Seen</a>
					</td>
				</tr>
				<?php $i++; ?>
			<?php } } ?>
			</tbody>
		</table>
       </div>
    </div>

    <div class="box round first grid">
        <h2>Seen box</h2>
        <?php 
        	if(isset($_GET['delid'])){
        		$delid = $_GET['delid'];
        		$delquery = "DELETE FROM tbl_contact WHERE id='$delid'";
        		$deletemsg = $db->delete($delquery);
        		if($deletemsg){
        			echo "<span style='color:green;font-size:18px;'>Message is deleted successfully !!</span>";
        		}else{
        			echo "<span style='color:green;font-size:18px;'>Message is not deleted !!</span>";
        		}
        	}
        ?>
        <div class="block">        
            <table class="data display datatable" id="example">
			<thead>
				<tr>
					<th width="10%">Serial No.</th>
					<th width="15%">Name</th>
					<th width="20%">Email</th>
					<th width="30%">Message</th>
					<th width="10%">Date</th>
					<th width="15%">Action</th>
				</tr>
			</thead>
			<tbody>
			<?php 
				$query = "SELECT * FROM tbl_contact WHERE status='1' ORDER BY id DESC";
				$result = $db->select($query);
				if($result){
					$i=1;
					while($message = $result->fetch_assoc()){
			?>
				<tr class="odd gradeX">
					<td><?php echo $i; ?></td>
					<td><?php echo $message['name']; ?></td>
					<td><?php echo $message['email']; ?></td>
					<td><?php echo $fm->textShorten($message['body']); ?></td>
					<td><?php echo $fm->formatDate($message['date']); ?></td>
					<td>
						<a onclick="return confirm('Are you sure to delete ?');" href="?delid=<?php echo $message['id']; ?>">Delete</a>
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


