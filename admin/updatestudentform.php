<?php
$sid = base64_decode($_GET['sid']);
include_once("../dbcon.php");
$qry = "select * from student where id='$sid'";
$res =mysqli_query($con,$qry);
$data= mysqli_fetch_assoc($res);
?>
<a href="admindash.php" style="float:left;">Admin Dashboard</a>
<a href="logout.php" style="float:right;">LogOut</a><br/>
<h2>Add Student Information</h2>
<form action="updatestudentdata.php" method="POST" enctype="multipart/form-data">
    Rollno<input type="text" name="rollno" value="<?php echo $data['rollno'];?>" required /><br/><br/>
    Name<input type="text" name="name" value="<?php echo $data['name'];?>" required /><br/><br/>
    DOB<input type="date" name="dob" value="<?php echo $data['dob'];?>" required /><br/><br/>
    City<input type="text" name="city" value="<?php echo $data['city'];?>" required/><br/><br/>
    Parent Contact<input type="text" name="pcont" value="<?php echo $data['pcont'];?>" required/><br/><br/>
    Standard<input type="text" name="standard" value="<?php echo $data['standard'];?>" required/><br/><br/>
    <input type="hidden" name="id" value="<?php echo $data['id'];?>"/>
    Upload Image<input type="file" name="image"/><br/><br/>
    <input type="submit" value="Update" name="submit"/>
</form>