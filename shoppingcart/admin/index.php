<?php

session_start();
include_once '../connect.php';
if(!isset($_SESSION['username']))
{
   header("Location:../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>

a{
    color:white;
    margin : 50px;
    width:50%;
    background-color:#4CAF50;
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
    <h1>Shopping Cart(Admin)</h3><hr/>
    <a href="displayCategory.php">Category</a>
    <a href="displayProduct.php" >Product</a>
    <a href="../logout.php" >Logout</a>
</center>
</body>
</html>