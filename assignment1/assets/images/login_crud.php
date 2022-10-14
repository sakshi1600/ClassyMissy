



<?php
include('../../assets/constants/config.php');

    session_start();

    // if(isset($_SESSION['id'])){

    //     header('location:home.php');
    // }

    if(isset($_POST['submit'])){

        $user = $_POST['email'];
        $pass = md5($_POST['password']) ;

        $sql = "SELECT * FROM `register` where `email` = '$user' and `password` = '$pass'";
        $result = $conn->query($sql);
// print_r($sql);exit;
        if($result-> num_rows > 0){
            while($row= $result->fetch_assoc()){
                $_SESSION['id'] = $row['id'];
                $_SESSION['email'] = $row['email']; 
                 $_SESSION['password'] = $row['password'];   

        
            }
            ?>
            <script> alert('Welcome <?php echo $_SESSION['name']?>'); </script>
            <script>window.location='../home.php';</script>
            <?php

        
            }else{
                echo "<center><p style=color:red;>Invalid username or password</p></center>";

        }
        $conn->close();
    }
?>