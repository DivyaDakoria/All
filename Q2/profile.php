<?php

session_start();
include_once 'connect.php';
if(!isset($_SESSION['username']))
{
   header("Location:index.php");
}
$sql= "SELECT * FROM users";
    $result = $con->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style> 
        table { 
            margin: 0 auto; 
            font-size: large; 
            border: 1px solid #4CAF50; 
        } 
        th, 
        td { 
            font-weight: bold; 
            border: 2px solid #4CAF50; 
            padding: 10px; 
            text-align: center; 
        } 
  
        td { 
            font-weight: lighter; 
        } 
        a{
            color:#4CAF50;
            margin : 5px;
        }
        h3{
            color:#4CAF50;
        }
    </style> 
</head>
<body>
<center>
    <h3>Profile</h3><hr/>
    <a href="logout.php" >Logout</a></br></br>
    <table> 
            <tr> 
                <th>StudentName</th> 
                <th>email</th> 
                <th>contactno</th> 
                <th>ProfileImage</th> 
            </tr>
            <?php
                while($rows=$result->fetch_assoc())
                {
            ?> 
            <tr>
                <td><?php echo $rows['username'];?></td>
                <td><?php echo $rows['email'];?></td>
                <td><?php echo $rows['contactno'];?></td>
                <td><image src="./profilepic/<?php echo $rows['profilepic'];?>" width="100px" height="60px"></td>
            <tr> 
            <?php
                }
            ?>   
        </table> 
</center>
</body>
</html>