<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteStuff']) || $_GET['deleteStuff']==NULL){
        header("Location:memberList.php");
    }else{
        $deleteStuff = $_GET['deleteStuff'];
        $query = "SELECT * FROM tbl_stuff WHERE id='$deleteStuff'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_stuff WHERE id='$deleteStuff'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:stuffList.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:stuffList.php");
        }
    }
?>