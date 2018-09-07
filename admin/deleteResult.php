<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteId']) || $_GET['deleteId']==NULL){
        header("Location:resultlist.php");
    }else{
        $deleteId = $_GET['deleteId'];
        $query = "SELECT * FROM tbl_result WHERE id='$deleteId'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_result WHERE id='$deleteId'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:resultlist.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:resultlist.php");
        }
    }
?>