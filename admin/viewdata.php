<?php
require_once("../dbcon.php");
if($con){
    $qry ="select * from student";
    $res = mysqli_query($con,$qry);
    ?>
    <a href="admindash.php" style="float:left;">Admin Dashboard</a>
    <a href="logout.php" style="float:right;">LogOut</a><br/>
                <table border="1px" width="600px" cellspacing="0px">
                    <tr>
                        <th>Roll No.</th>
                        <th>Standard</th>
                        <th>Name</th>
                        <th>DOB</th>
                        <th>Image</th>
                        <th>Image Name</th>
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
                        <td><?php echo $data['rollno'];?></td>
                        <td><?php echo $data['standard'];?></td>
                        <td><?php echo $data['name'];?></td>
                        <td><?php echo date("d-m-Y",strtotime($data['dob']));?></td>
                        <td><img src="../dataimg/<?php echo $data['image'];?>" style="max-width:50px"/></td>
                        <td><?php echo $data['image'];?></td>
                        <td><?php echo $data['city'];?></td>
                        <td><?php echo $data['pcont'];?></td>
                    </tr>
                    <?php
                }}?>
                  </table>
                <?php
}


?>