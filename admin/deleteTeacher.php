<?php include 'inc/header.php'; ?>


<?php 
    if(!isset($_GET['deleteTeacher']) || $_GET['deleteTeacher']==NULL){
        header("Location:memberList.php");
    }else{
        $deleteTeacher = $_GET['deleteTeacher'];
        $query = "SELECT * FROM tbl_teacher WHERE id='$deleteTeacher'";
        $result = $db->select($query);
        if($result){
        	while($delimg = $result->fetch_assoc()){
        		$dellink = $delimg['image'];
        		unlink($dellink);
        	}
        }
        $delquery = "DELETE FROM tbl_teacher WHERE id='$deleteTeacher'";
        $deldata = $db->delete($delquery);
        if($deldata){
        	echo "<script>alert('Data is deleted successfully !!');</script>";
            header("Location:teacherList.php");
        }else{
        	echo "<script>alert('Data is not deleted !!');</script>";
        	header("Location:teacherList.php");
        }
    }
?>