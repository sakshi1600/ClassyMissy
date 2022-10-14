
<?php
include('../../assets/constants/config.php');
session_start();
 
$conn = mysqli_connect("$host_name", "$username", "$password", "$database");
 


if (isset($_POST['submit'])) {
    
    
    $filename = $_FILES["file"]["name"];
    $tempname = $_FILES["file"]["tmp_name"];
    $folder   = "/image/" . $filename;


    extract($_POST);
    
    $a = implode(" ,", $hobbies);
    //print_r($a);
    // die();
    $agedate = date("Y-m-d", strtotime("-21 years"));

//print_r($date); exit;
    if($date<=$agedate)
    {

    
    $sql = "INSERT INTO `family`(`fname`, `lname`, `date`, `mob_no`, `file`, `gender`, `status`, `w_date`, `address`, `pin`, `state_id`, `city_id`, `hobbies`)

    values('$fname','$lname','$date','$mob_no','" . $filename . "','$gender','$status','$w_date','$address','$pin','$state_id','$city_id','$a')";
   //print_r($sql);exit;
    if (mysqli_query($conn, $sql)) {
        
        echo '<script language="javascript">';
        echo 'alert("Successfully Registered"); location.href="../headmember_view.php"';
        echo '</script>';
        // header('location:../headmember_view.php');
    }
    
    
}
else{
     echo '<script language="javascript">';
    echo 'alert("Age is not valid. Please Enter age above 21years"); location.href="../head_member.php"';
      echo '</script>';
}

}
 
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



      $agedate = date("Y-m-d", strtotime("-21 years"));

//print_r($date); exit;
    if($_POST['date'] <= $agedate)
    {
    if ((!($_FILES['file']['name']))) {
        
        // extract($_POST);
        
        
        
        $a = implode(" ,", $_POST['hobbies']);
        
        $sql = "UPDATE `family` SET `fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`date`='" . $_POST['date'] . "',`address`='" . $_POST['address'] . "',`gender`='" . $_POST['gender'] . "',`mob_no`='" . $_POST['mob_no'] . "',`status`='" . $_POST['status'] . "',`w_date`='" . $weddingdate . "',`pin`='" . $_POST['pin'] . "',`state_id`='" . $_POST['state_id'] . "',`city_id`='" . $_POST['city_id'] . "' , `hobbies`='" . $a . "' WHERE id='" . $_POST['id'] . "' ";
         //print_r($sql); exit;
    } else /* If file is  Selected*/ {
        $a   = implode(" ,", $_POST['hobbies']);
        $sql = "UPDATE `family` SET `fname`='" . $_POST['fname'] . "',`lname`='" . $_POST['lname'] . "',`date`='" . $_POST['date'] . "',`address`='" . $_POST['address'] . "',`gender`='" . $_POST['gender'] . "',`mob_no`='" . $_POST['mob_no'] . "',`status`='" . $_POST['status'] . "',`w_date`='" . $weddingdate . "',`pin`='" . $_POST['pin'] . "',`state_id`='" . $_POST['state_id'] . "',`city_id`='" . $_POST['city_id'] . "' , `hobbies`='" . $a . "' ,`file`='" . $location . "' WHERE id='" . $_POST['id'] . "' ";
        //print_r($sql); exit;
    }
    
    if (mysqli_query($conn, $sql)) {
        echo '<script language="javascript">';
        echo 'alert("Successfully Updated"); location.href="../headmember_view.php"';
        echo '</script>';
        
        
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}

else{
     echo '<script language="javascript">';
    echo 'alert("Age is not valid. Please Enter age above 21years");  <button type="button" value="Go back!" onclick="history.back()">BACK</button>';
      echo '</script>';
}
}
 
if (isset($_GET['id'])) {
    
    // extract($_POST);
    $sql = "UPDATE `family` SET `delete_status`=1 WHERE id='" . $_GET['id'] . "' ";
    //print_r($sql); exit;
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        
        header('location:../headmember_view.php');
        
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }
    
}


?>