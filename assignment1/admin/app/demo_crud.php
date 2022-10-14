
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
    $folder   = "/image/" . $filename;
    
     extract($_POST);

    $a= implode(" ,", $hobbies);
    //print_r($a);
   // die();
  
    $sql = "INSERT INTO `family`(`fname`, `lname`, `date`, `mob_no`, `file`, `gender`, `status`, `w_date`, `address`, `pin`, `state_id`, `city_id`, `hobbies`)

    values('$fname','$lname','$date','$mob_no','" . $filename . "','$gender','$status','$w_date','$address','$pin','$state_id','$city_id','$a')";
   //print_r($sql);exit;
    if (mysqli_query($conn, $sql)) {
        
        //echo "success";
        header('location:../demo_view.php');
    }
    
    
}


?>

<?php
if (isset($_POST['update'])) {

  
    extract($_FILES);
    $file       = $_FILES['file']['tmp_name'];
   // $image      = addslashes(file_get_contents($_FILES['file']['tmp_name']));
    $image_name = addslashes($_FILES['file']['name']);
    move_uploaded_file($_FILES["file"]["tmp_name"], $_FILES["file"]["name"]);
    $location = $_FILES["file"]["name"];
    if ((!($_FILES['file']['name']))) 
    {
    
    // extract($_POST);
    $sql = "UPDATE `user` SET `fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`email`='" . $_POST['email'] . "',`b_date`='" . $_POST['b_date'] . "',`address`='" . $_POST['address'] . "',`gender`='" . $_POST['gender'] . "',`mob_no`='" . $_POST['mob_no'] . "',`country_id`='".$_POST['country_id']."',`state_id`='".$_POST['state_id']."',`city_id`='".$_POST['city_id']."' WHERE id='" . $_POST['id'] . "' ";
    //print_r($sql); exit;
}
else /* If file is  Selected*/ {
    $sql = "UPDATE `user` SET `fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`email`='" . $_POST['email'] . "',`b_date`='" . $_POST['b_date'] . "',`address`='" . $_POST['address'] . "',`gender`='" . $_POST['gender'] . "',`mob_no`='" . $_POST['mob_no'] . "',`file`='".$location."' ,`country_id`='".$_POST['country_id']."',`state_id`='".$_POST['state_id']."',`city_id`='".$_POST['city_id']."' WHERE id='" . $_POST['id'] . "' ";
       // print_r($sql); exit;
    }

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