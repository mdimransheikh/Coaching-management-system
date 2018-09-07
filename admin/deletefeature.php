<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['featureId']) || $_GET['featureId']==NULL){
        header("Location:Featurelist.php");
    }else{
        $featureId = $_GET['featureId'];
        $delquery = "DELETE FROM tbl_feature WHERE id='$featureId'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Feature is deleted successfully !!');</script>";
            header("Location:Featurelist.php");
        }else{
        	echo "<script>alert('Feature is not deleted !!');</script>";
        	header("Location:Featurelist.php");
        }
    }
?>