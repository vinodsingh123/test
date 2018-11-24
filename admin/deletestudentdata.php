<?php
if(isset($_GET['sid'])){
    require_once("../dbcon.php");
    if($con){
        $id = base64_decode($_GET['sid']);
        $sqry = "select image from student where id='$id'";
        $resultset = mysqli_query($con,$sqry);
        $data = mysqli_fetch_assoc($resultset);
        $delRes = unlink("../dataimg/".$data['image']);
        if($delRes){
            $qry = "delete from student where id='$id'";
            $res = mysqli_query($con,$qry);
            if($res){
                header("location:viewdata.php");
            }
        }
    }
}



?>