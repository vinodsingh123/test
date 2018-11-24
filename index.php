<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SMS</title>
</head>
<body>
    <a href="login.php">Login</a><br/><br/>

    <form action="index.php" method="POST">
    Standard<select name="standard">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>

    </select><br/><br/>
    Rollno<input type="text" name="rollno" required/><br/><br/>
    <input type="submit" value="Show Details" name="submit"/>

    </form>
</body>
</html>

<?php
extract($_POST);
if(isset($submit)){
    include_once("dbcon.php");
    if($con){
        $qry = "select * from student where standard='$standard' and rollno='$rollno'";
        $res = mysqli_query($con,$qry) or die(mysqli_error());
        ?>
        <table border="1px" width="600px" cellspacing="0px">
                    <tr>
                        <th>Standard</th>
                        <th>Roll No.</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>City</th>
                        <th>Parent Contact</th>
                    </tr>
                <?php
                if(mysqli_num_rows($res)< 1){
                    ?><tr><td colspan="7" style="text-align:center">No Records</td></tr><?php
                }else{
                    while($data =mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                        <td><?php echo $data['standard'];?></td>
                        <td><?php echo $data['rollno'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><img src="./dataimg/<?php echo $data['image'];?>" style="max-width:50px"/></td>
                        <td><?php echo $data['city'];?></td>
                        <td><?php echo $data['pcont'];?></td>
                    </tr>
                    <?php
                }}?>
                  </table>
                  <?php
    }
}

?>