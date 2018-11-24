<?php
session_start();
if(isset($_SESSION['uid'])){
//if(isset($_COOKIE['uid'])){
?>
<a href="admindash.php" style="float:left;">Admin Dashboard</a>
<a href="logout.php" style="float:right;">LogOut</a><br/>
<form action="updatestudent.php" method="post">
Choose Standard<select name="standard">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select><br/><br/>
    Student Name<input type="text" name="name" required/><br/><br/>
    <input type="submit" value="Show Details" name="submit"/>
</form>
<?php
    extract($_POST);
    if(isset($submit)){
        include_once("../dbcon.php");
        if($con){
            $qry ="select * from student where standard='$standard' and name like '%$name%'";
            $res = mysqli_query($con,$qry);
            // if(mysqli_num_rows($res)< 1){
            //     echo "No Record Found";
            // }else{
                
            // }
            ?><table border="1px" width="600px" cellspacing="0px">
                    <tr>
                        <th>Roll No.</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Image</th>
                        <th>City</th>
                        <th>Parent Contact</th>
                        <th>Standard</th>
                        <th>Modify</th>
                    </tr>
                <?php
                if(mysqli_num_rows($res)< 1){
                    ?><tr><td colspan="7" style="text-align:center">No Records</td></tr><?php
                }else{
                    while($data =mysqli_fetch_assoc($res)){
                    ?>
                    <tr>
                        <td><?php echo $data['rollno'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo date("d-m-Y",strtotime($data['dob']));?></td>
                        <td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width:50px"/></td>
                        <td><?php echo $data['city'];?></td>
                        <td><?php echo $data['pcont'];?></td>
                        <td><?php echo $data['standard'];?></td>
                        <th><a href="updatestudentform.php?sid=<?php echo base64_encode($data['id']);?>"><button>Edit</button></a></th>
                    </tr>
                    <?php
                }}?>
                  </table>
                <?php
        }
    }
}else{
    header("location:../login.php");
}

?>