<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteId']) || $_GET['deleteId']==NULL){
        header("Location:gallaryImagelist.php");
    }else{
        $delid = $_GET['deleteId'];
        $query = "SELECT * FROM tbl_gallary WHERE id='$delid'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_gallary WHERE id='$delid'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:gallaryImagelist.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:gallaryImagelist.php");
        }
    }
?>