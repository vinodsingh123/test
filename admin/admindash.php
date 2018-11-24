<?php
session_start();
if(isset($_SESSION['uid'])){
//if(isset($_COOKIE['uid'])){
?>
    <h2>Welcome to Admin Dashboard</h2>
    <a href="logout.php">Logout</a><br><br>
    <a href="viewdata.php">View Student</a><br><br>
    <a href="addstudent.php">Insert Student</a><br><br>
    <a href="updatestudent.php">Update Student</a><br><br>
    <a href="deletestudent.php">Delete Student</a><br><br>
<?php
}else{
    header('location:../login.php');
}

?>