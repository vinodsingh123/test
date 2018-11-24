<?php
session_start();
if(isset($_SESSION['uid'])){
//if(isset($_COOKIE['uid'])){
    header('location:admin/admindash.php');
}
?>
<form action="login.php" method="POST">
Username<input type="text" name="username" required/><br/><br/>
Password<input type="text" name="password" required/><br/><br/>
<input type="submit" name="login" value="Login">
</form>

<?php
include_once("dbcon.php");
if(isset($_POST['login'])){
    extract($_POST);
    $qry ="select * from admin where username='$username' and password='$password'";
    $run = mysqli_query($con,$qry) or exit(mysqli_error());
    $rows = mysqli_num_rows($run);
    if($rows < 1){
?><script>alert("UserName  and Pasword is Not Correct");
    window.open("login.php","_self");
    </script>
<?php
    }else{
        $data = mysqli_fetch_assoc($run);
        //$id =$data['id'];
        //setcookie('uid',$id,time()+60);
        $sid =  session_id();
        $_SESSION['uid']=$sid;
        header('location:admin/admindash.php');
    }
}
?>