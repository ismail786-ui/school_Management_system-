<?php
include './conn.php';

if(isset($_GET['delete'])){

    $id = $_GET['delete']; 
    $sql = "delete from student_admission where stu_id = '$id'";

if(mysqli_query($conn,$sql)){
header('location:app_vform.php');
}


}

?>