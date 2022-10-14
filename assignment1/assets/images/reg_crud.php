
<?php
include('../../assets/constants/config.php');
session_start();
?>

<?php
$conn = mysqli_connect("$host_name", "$username", "$password", "$database");
?>

<?php


if (isset($_POST['submit'])) {
    
   
   extract($_FILES);
    extract($_POST);
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder   = "./image/" . $filename;

       
    
     $pass=md5($password);
     $passw=md5($cpassword);

     if ($pass==$passw) {
        
    $sql = "INSERT INTO `register`(`name`, `email`, `address`, `mob`, `password`, `cpassword`, `file`) values('$name','$email','$address','$mob','$pass','$passw','".$filename."')";
    //print_r($sql);exit;
    if (mysqli_query($conn, $sql)) {
        
        echo "success";
        header('location:../login.php');
    }
     
     }
     else{
        echo '<script>alert("Please Match The Both Password You Entered")</script>';
     }
    
}


?>

<?php
if (isset($_POST['update'])) {
    
    extract($_FILES);
    // $filename = $_FILES["file"]["name"];
    // $filename2 = $_FILES["file2"]["tmp_name"].$filename;
    // $folder = "../../assets/images/" . $filename;
    
    // $file_name = $_FILES['file']['name'];
    // $tmp_name  = $_FILES['file']['tmp_name'];
    
    // // update image from folder
    // //include_once("update_image.php");
    // //for image upload
    // move_uploaded_file($tmp_name, "../../assets/images/" . $file_name);
    
    // extract($_POST);
    $sql = "UPDATE `register` SET `name`='" . $_POST['name'] . "',`email`='" . $_POST['email'] . "',`address`='" . $_POST['address'] . "',`mob`='" . $_POST['mob'] . "',`password`='" . $_POST['password'] . "' WHERE id='" . $_GET['id'] . "' ";
   // print_r($sql); exit;
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        
        header('location:../profile.php');
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>

