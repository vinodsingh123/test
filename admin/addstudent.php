<?php
session_start();
if(isset($_SESSION['uid'])){
//if(isset($_COOKIE['uid'])){
?>
<a href="admindash.php" style="float:left;">Admin Dashboard</a>
<a href="logout.php" style="float:right;">LogOut</a><br/>
<h2>Add Student Information</h2>
<form action="addstudent.php" method="POST" enctype="multipart/form-data">
    Rollno<input type="text" name="rollno" required /><br/><br/>
    Name<input type="text" name="name" required /><br/><br/>
    DOB<input type="date" name="dob" required /><br/><br/>
    City<input type="text" name="city" required/><br/><br/>
    Parent Contact<input type="text" name="pcont" required/><br/><br/>
    Standard<input type="text" name="standard" required/><br/><br/>
    Upload Image<input type="file" name="image" required/><br/><br/>
    <input type="submit" value="Add" name="submit"/>
</form>
<?php
if(isset($_POST['submit'])){
    extract($_POST);
    include_once("../dbcon.php");
    if($con){
        $imgname =$_FILES['image']['name'];
        $temp_imgname =$_FILES['image']['tmp_name'];
        move_uploaded_file($temp_imgname,"../dataimg/$imgname");
        $qry ="insert into student(rollno,name,dob,city,pcont,standard,image) values('$rollno','$name','$dob','$city','$pcont','$standard','$imgname')";
        $rs= mysqli_query($con,$qry);
        if($rs){
            header("location:viewdata.php");
        }else{
            echo "Not Inserted";
        }
    }else{
        echo "Connection Error";
    }
}
?>

<?php
}else{
    header('location:../login.php');
}
?>