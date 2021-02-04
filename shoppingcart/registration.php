<?php
    include_once 'connect.php';
    if(isset($_POST['submit']))
    {
        
        $query = "insert into users (username,email,password,role,contactno) values ('".$_POST['username']."','".$_POST['email']."','".$_POST['password']."','user','".$_POST['contactno']."')";
        $res = mysqli_query($con,$query);
        if($res){
            echo "Registered Successfully!!!!";
            header("Location:index.php");
        }
        else{
            echo "Error occur while inserting category!!!!";
        echo mysqli_error($con);
        }
        
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping</title>
    <style>


input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 5px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
a{
    color:#4CAF50;
    margin : 90px;
}
h1{
    color:#4CAF50;
}
div {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width:30%;
}
    </style>
</head>
<body>
    <center>
    <h1 class="text-primary text-uppercase">Registration</h1>
    <div>
    <form method="post" enctype="multipart/form-data" id="login">
<table>
    <tr>
        <td><label>User Name :<label></td>
        <td><input type="text" name="username" placeholder="Enter User Name"/></td>
    </tr>
    <tr>
        <td><label>Email:<label></td>
        <td><input type="email" name="email" placeholder="Enter Email"/></td>
    </tr>
    <tr>
        <td><label>Password:<label></td>
        <td><input type="password" name="password" placeholder="Enter Password"/></td>
    </tr>
    <tr>
        <td><label>Contact No:<label></td>
        <td><input type="number" name="contactno" placeholder="Enter Contact No"/></td>
    </tr>
    <tr>
        <td colspan=2><input type="submit" name="submit" value="Add"/></br>
        <a href="index.php">Login!!! </a></td>
    </tr>
</table>

        
    </form>
    </div>
    </center>
</body>
</html>