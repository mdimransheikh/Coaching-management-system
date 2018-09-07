<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteAdvisor']) || $_GET['deleteAdvisor']==NULL){
        header("Location:advisorList.php");
    }else{
        $deleteAdvisor = $_GET['deleteAdvisor'];
        $query = "SELECT * FROM tbl_advisor WHERE id='$deleteAdvisor'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_advisor WHERE id='$deleteAdvisor'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:advisorList.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:advisorList.php");
        }
    }
?>