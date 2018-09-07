<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteMember']) || $_GET['deleteMember']==NULL){
        header("Location:memberList.php");
    }else{
        $deleteMember = $_GET['deleteMember'];
        $query = "SELECT * FROM tbl_team WHERE id='$deleteMember'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_team WHERE id='$deleteMember'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:memberList.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:memberList.php");
        }
    }
?>