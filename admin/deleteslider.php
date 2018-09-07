<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['sldierId']) || $_GET['sldierId']==NULL){
        header("Location:postlist.php");
    }else{
        $delid = $_GET['sldierId'];
        $query = "SELECT * FROM tbl_slider WHERE id='$delid'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_slider WHERE id='$delid'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Image is deleted successfully !!');</script>";
            header("Location:Imagelist.php");
        }else{
        	echo "<script>alert('Image is not deleted !!');</script>";
        	header("Location:Imagelist.php");
        }
    }
?>