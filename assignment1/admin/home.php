  

<?php include('../assets/constants/config.php');?>

 <?php include('include/header.php');
   ?>
<style>
body{
   
    background:#FAFAFA;
}
.icon {
 margin-left: 5px;
}



.card {
    border-radius: 6px;
    background-color: hsl(89, 43%, 51%);
   width: 200px;
    border: none;
   
  margin-left: 15px;
    transition: all 0.3s ease-in-out;
}


</style>
</head>
<body>

<!-- Sidebar -->
<?php include('include/sidebar.php');?>

<!-- Page Content -->
<div style="margin-left:25%">

<div class="w3-container w3-teal">
  <h1>My Page</h1>
</div>

<!-- <img src="img_car.jpg" alt="Car" style="width:100%"> -->

<div class="container">
<h2>Dashboard</h2>

 <div class="card">
    <div class="card-body">
      <h4 class="card-title icon">Total User</h4>
      <?php 
       $sql ="SELECT COUNT(id) AS c_id FROM `family` WHERE delete_status=0";
   
   //print_r($sql);
     $result = $conn->query($sql);
     //print_r($result);
     foreach ($result as $key) 
       {?>
      
      <p class="card-text" >   <i class="fa fa-user icon" >Family Head</i>
        <?php echo $key['c_id'];?> 
    
    </p>

    <?php }?>
    </div>
  </div>
    </div>
    </div>  
</body>
</html>
