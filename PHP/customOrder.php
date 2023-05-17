<?php

session_start();

include_once "db.php";

$cid=$_SESSION["cid"];

if(isset($_SESSION["name"]))
{


    $bname = "";
    $pname = "";
    $name = "";
    $mobile = "";
    $address = "";

    $image="";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/variable.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/order.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Custom Order</title>
</head>
<body>

<?php

if(isset($_POST["submit"]))
{

   
        $bname = $_POST["bname"];
        $pname = $_POST["pname"];
        $name = $_POST["name"];
        $mobile = $_POST["mobile"];
        $address = $_POST["address"];
        
        
        $image=$_FILES['image']['tmp_name'];
        //$name=$_FILES['image']['name'];

        if(!$bname)
        {
            echo "<script>swal('OOPS!','Enter Brand Name','error')</script>";
        }
        else if(!$pname)
        {
            echo "<script>swal('OOPS!','Enter Product Name','error')</script>";
        }
        else if(!$name)
        {
            echo "<script>swal('OOPS!','Enter Your Name','error')</script>";
        }
        else if(strlen($mobile)<10 || strlen($mobile)>10)
        
        {
            echo "<script>swal('OOPS!','Enter a valid mobile number','error')</script>";
        }
        else if(!$address)
        {
            echo "<script>swal('OOPS!','Enter your address','error')</script>";
        }
        else if(!$image)
        {
            echo "<script>swal('OOPS!','Select an image','error')</script>";
        }
        else{

        $image=file_get_contents($image);
        $image=base64_encode($image);

        

      
        //$sql="INSERT INTO img (NAME,IMAGE) VALUES('$name','$image')";
        $sql="INSERT INTO custom_orders(cid,bname,pname,name,mobile,address,img) VALUES($cid,'$bname','$pname','$name','$mobile','$address','$image') ";

        if($conn->query($sql)){

            echo "<script>swal('Congrats!','Order Successfully Placed ','success')
            setTimeout(()=>{
                window.location.href='../product.php'
            },2000)</script>";
        }
        else{
            echo "<script>swal('OOPS!','Order Not Placed ','error')</script>";
        }
    
    }


   
    }

?>

<div class="right-section">

<h4>CONFIRM ORDER</h4>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="input-group">
            <input type="text" id="bname" name="bname" value="<?php echo $bname; ?>" required>
            <label for="bname">Brand Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="pname" name="pname" value="<?php echo $pname; ?>" required>
            <label for="pname">Product Name</label>
        </div>
        
        <div class="input-group">
            <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>
            <label for="name">Name</label>
        </div>
        <div class="input-group">
            <input type="text" id="mobile" name="mobile" value="<?php echo $mobile; ?>" required>
            <label for="mobile">Mobile Number</label>
        </div>
        <div class="input-group">
        <textarea id="address" name="address" rows="4" cols="50"  placeholder="Address" required></textarea>
        
        </div>
        <div class="input-group">
        <input type="file" name="image" accept="image/*"  required>
        </div>

        <div class="submit-section">
            <input type="submit" id="btn" name="submit" class="submit-button" value="PLACE ORDER"/>
        </div>

    </form>
</div>

<?php 

}
else{
    header("location:../login.html");
}

?>
</body>
</hmtl>