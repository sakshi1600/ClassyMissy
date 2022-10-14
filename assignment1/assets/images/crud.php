
<?php
include('../../assets/constants/config.php');
session_start();
?>

<?php
$conn = mysqli_connect("$host_name", "$username", "$password", "$database");
?>

<?php


if (isset($_POST['submit'])) {
    
    
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder   = "./image/" . $filename;
    
    
    
    extract($_POST);
    $sql = "INSERT INTO `user`(`fname`, `lname`, `email`, `b_date`, `address`, `gender`, `mob_no`, `file`)values('$fname','$lname','$email','$b_date','$address','$gender','$mob_no','" . $filename . "')";
    //print_r($sql);exit;
    if (mysqli_query($conn, $sql)) {
        
        echo "success";
        header('location:../view.php');
    }
    
    
}


?>

<?php
if (isset($_POST['update'])) {
    
    extract($_FILES);
    // $filename = $_FILES["file"]["name"];
    // $filename2 = $_FILES["file2"]["tmp_name"].$filename;
    // $folder = "../../assets/images/" . $filename;
    
    $file_name = $_FILES['file']['name'];
    $tmp_name  = $_FILES['file']['tmp_name'];
    
    // update image from folder
    //include_once("update_image.php");
    //for image upload
    move_uploaded_file($tmp_name, "../../assets/images/" . $file_name);
    
    // extract($_POST);
    $sql = "UPDATE `user` SET `fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`email`='" . $_POST['email'] . "',`b_date`='" . $_POST['b_date'] . "',`address`='" . $_POST['address'] . "',`gender`='" . $_POST['gender'] . "',`mob_no`='" . $_POST['mob_no'] . "',`file`='" . $file_name . "'  WHERE id='" . $_POST['id'] . "' ";
    //print_r($sql); exit;
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        
        header('location:../view.php');
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>

<?php
if (isset($_GET['id'])) {
    
    // extract($_POST);
    $sql = "UPDATE `form` SET `delete_status`=1 WHERE id='" . $_GET['id'] . "' ";
    //print_r($sql); exit;
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        
        header('location:../view.php');
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>