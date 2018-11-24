<?php
extract($_POST);
if(isset($submit)){
    require_once("../dbcon.php");
    if($con){
        if(isset($_FILES['image'])){
            $img_name = $_FILES['image']['name'];
            //echo "name ".$img_name;
            $img_tmp_name = $_FILES['image']['tmp_name'];
            //echo "tmp name ".$img_tmp_name;
            if($img_name == null){
                $sqry = "select image from student where id='$id'";
                $resltset = mysqli_query($con,$sqry);
                $data = mysqli_fetch_assoc($resltset);
                $image = $data['image'];
                $qry = "update student set rollno='$rollno',name='$name',dob='$dob',city='$city',pcont='$pcont',standard='$standard',image='$image' where id='$id'";
                $res = mysqli_query($con,$qry);
                if($res){
                    header("location:viewdata.php");
                }
            }
            else{
                if(move_uploaded_file($img_tmp_name,"../dataimg/".$img_name)){
                    $sqry = "select image from student where id='$id'";
                    $resltset = mysqli_query($con,$sqry);
                    $data = mysqli_fetch_assoc($resltset);
                    $image = $data['image'];
                    if(unlink("../dataimg/".$image)){
                        $qry = "update student set rollno='$rollno',name='$name',dob='$dob',city='$city',pcont='$pcont',standard='$standard',image='$img_name' where id='$id'";
                        echo $qry;
                        $res = mysqli_query($con,$qry);
                        if($res){
                            header("location:viewdata.php");
                        }
                    }
                }     
            }        
        }
    }
}
?>