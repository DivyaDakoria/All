<?php
    session_start();
    include_once '../connect.php';
    if(!isset($_SESSION['username']))
    {
        header("Location:../index.php");
    }
    include_once '../connect.php';
    if(isset($_POST['submit']))
    {
    $pid=$_GET['pid'];
    $pname=$_POST['pname'];
    $cid=$_POST['cid'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $filename = $_FILES['image']['name'];
    $tempname = $_FILES['image']['tmp_name'];
    $dir = "../products/" . $filename;
    move_uploaded_file($tempname,$dir);
    $query = "update products set pname ='".$pname."',cid='".$cid."',price='".$price."',description='".$description."',image='".$filename."' where pid=".$pid;
    $res = mysqli_query($con,$query);
        if($res){
            echo "Update product Successfully!!!!";
            header("Location:displayProduct.php");
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
        padding: 10px;
        width:40%;
        }
       
    </style> 
</head>
<body>
    <center>
    <h3>Update Product</h3>
    
    <form method="post" enctype="multipart/form-data">
    <table>
            <tr>
                <td><label>Product Name :<label></td>
                <td><input type="text" name="pname" placeholder="Enter Product Name" value="<?php echo $_GET['pname']; ?>"/></td>
            </tr>
            <tr>
                <td><label>Select Category :<label></td>
                <td><select name="cid">
                    <option disabled selected>-- Select Category --</option>
                    <?php
                        $res = mysqli_query($con, "SELECT * From category");  // Use select query here 
                        while($data = mysqli_fetch_assoc($res))
                        {
                            echo "<option  value='". $data['cid'] ."'>" .$data['cname'] ."</option>";  // displaying data in option menu
                        }	
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td><label>Price :<label></td>
            <td><input type="number" name="price" placeholder="Enter Price" value="<?php echo $_GET['price']; ?>"/></td>
        </tr>
        <tr>
            <td><label>Description :<label></td>
            <td><input type="text" name="description" placeholder="Enter Description" value="<?php echo $_GET['description']; ?>"/></td>
        </tr>
        <tr>
            <td><label>Image :<label></td>
            <td><input type="file" id="image" name="image" >
            <input type="hidden" name="oldimg" value="<? echo $_GET['image']; ?>" /> 
            <image src="../products/<?php echo $_GET['image']?>" width="100px" height="60px"/></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" name="submit" value="Update"/> </td>
        </tr>
        </table>
    
    </form>
    
    </center>
</body>
</html>