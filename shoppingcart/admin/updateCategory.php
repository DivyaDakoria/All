<?php

session_start();
include_once '../connect.php';
if(!isset($_SESSION['username']))
{
    header("Location:../index.php");
}
    if(isset($_POST['submit']))
    {
    $cid=$_GET['cid'];
    $cname=$_POST['cname'];
    $query = "update category set cname ='".$cname."' where cid=".$cid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "Update Category Successfully!!!!";
            header("Location:displayCategory.php");
        }
        else{
            echo "Error occur while Update category!!!!";
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
        width: 30%;
        background-color: #4CAF50;
        color: white;
        padding: 5px;
        margin: 10px 80px 0px 80px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        }

        input[type=submit]:hover {
        background-color: #45a049;
        }
        a{
            color:#4CAF50;
            margin : 50px;
        }
        h3{
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
    <h3>Update Category</h3>
    <div>
    <form method="post" id="category">
        <table>
            <tr>
                <td><label>Category Name :<label></td>
                <td><input type="text" name="cname" value="<?php echo $_GET['cname']; ?>"/></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="submit" value="Update"/>
            </tr>
        </table>
    </form>
    </div>
</center>
    
</body>
</html>