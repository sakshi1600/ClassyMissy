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
    
    
    
    
    //$arr=$_POST['hobbies'];
    
    
    
    //print_r($b); exit;
    extract($_POST);
    
    
    $sql = "INSERT INTO `member`(`head_id`,`relation`, `fname`, `lname`, `b_date`, `status`, `wdate`, `education`, `file`) VALUES('$head_id','$relation','$fname','$lname','$b_date','$status','$wdate','$education','" . $filename . "') ";
    
    
    
    // print_r($sql);exit;
    if (mysqli_query($conn, $sql)) {
        
        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="../familymember_view.php"';
        echo '</script>';
        // header('location:../familymember_view.php');
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

    if($_POST['status']==1)
{
    $weddingdate=$_POST['w_date'];
}
else{
    $weddingdate=0;
}

    if ((!($_FILES['file']['name']))) {
        
        // extract($_POST);
        
        // UPDATE `member` SET `id`=[value-1],`head_id`=[value-2],`relation`=[value-3],`fname`=[value-4],`lname`=[value-5],`b_date`=[value-6],`status`=[value-7],`wdate`=[value-8],`education`=[value-9],`file`=[value-10],`delete_status`=[value-11] WHERE 1
        
        $sql = "UPDATE `member` SET `relation`='" . $_POST['relation'] . "',`fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`b_date`='" . $_POST['b_date'] . "',`status`='" . $_POST['status'] . "',`wdate`='" . $weddingdate . "',`education`='" . $_POST['education'] . "' WHERE id='" . $_POST['id'] . "' ";
        // print_r($sql); exit;
    } else /* If file is  Selected*/ {
        
        $sql = "UPDATE `member` SET `relation`='" . $_POST['relation'] . "',`fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`b_date`='" . $_POST['b_date'] . "',`status`='" . $_POST['status'] . "',`wdate`='" . $weddingdate . "',`education`='" . $_POST['education'] . "',`file`='" . $location . "' WHERE id='" . $_POST['id'] . "' ";
        //print_r($sql); exit;
    }
    
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        
        echo '<script language="javascript">';
        echo 'alert("Successfully Updated"); location.href="../familymember_view.php"';
        echo '</script>';
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>

<?php
if (isset($_GET['id'])) {
    
    // extract($_POST);
    $sql = "UPDATE `member` SET `delete_status`=1 WHERE id='" . $_GET['id'] . "' ";
    //print_r($sql); exit;
    if (mysqli_query($conn, $sql)) {
        echo "Record Deleted ";
        
        echo '<script language="javascript">';
        echo 'alert("Record Deleted"); location.href="../familymember_view.php"';
        echo '</script>';
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>