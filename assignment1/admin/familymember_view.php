<?php include('../assets/constants/config.php');
   ?>
 <?php include('include/header.php');
   ?>
      <style>
         table {
         border-collapse: collapse;
         width: 100%;
         font-family: "Times New Roman", Times, serif;
         }
         th, td ,h3{
         padding: 8px;
         text-align: left;
         border-bottom: 1px solid #ddd;
         font-family: "Times New Roman", Times, serif;
         }
         .button {
         background-color: #4CAF50;
         border: solid;
         color: white;
         padding-right: 10px 22px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 15px;
         margin: 2px 2px;
         cursor: pointer;
         }
         .btn{
         margin-left: 500px;
         font-family: "Times New Roman", Times, serif;
         }
         .card {
         margin-top: 20px;
         }
      </style>
 
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
         <center>
            <h3>Details</h3>
         </center>
           <button type="button" value="Go back!" onclick="history.back()">BACK</button>
         <div class="card">
            <div class="card-header" style="font-family: Times New Roman, Times, serif;">Family Member Details <a href="headmember_view.php" > <button class="btn btn-outline-primary" >Add New Member</button></a></div>
            <div class="card-body">
               <table class=".table-striped">
                  <tr>
                     <th>ID</th>
                     <th>Family Head</th>
                     <th>Relation</th>
                     <th>First Name</th>
                     <th>Education</th>
                     <!--  <th>Email</th> -->
                     <th>Action</th>
                  </tr>
                  <tbody>
                     <?php
                        $sql = "SELECT * FROM `member` WHERE `delete_status`=0";
                        //print_r($sql);exit;
                        $count=0;
                           $result = $conn->query($sql);
                           foreach ($result as $key) 
                             {?>
                     <tr>
                        <td><?php echo ++$count;?></td>
                        <td> <?php
                           $sql2 = "SELECT * FROM `family` WHERE `delete_status`=0 AND id='".$key['head_id']."'";
                           //print_r($sql);exit;
                           
                              $result2 = $conn->query($sql2);
                              foreach ($result2 as $key2) 
                                {?>
                           <?php echo $key2['fname'] ." ".$key2['lname'];?>
                           <?php }?>
                        </td>
                        <td><?php echo $key['relation'];?></td>
                        <td><?php echo $key['fname'] ." ".$key['lname'];?></td>
                        <td><?php echo $key['education'];?></td>
                        <td ><a href="familymember_edit.php?id=<?php echo $key['id'];?>"><i class="fa fa-edit" style="font-size:15px; color: blue;"></i></a>
                           <a class="delete_button" href="app/membercrud.php?id=<?php echo $key['id'];?>"><i class="fa fa-trash-o" style="font-size:15px; color: red;"></i></a>
                        </td>
                        <?php }?>
                     </tr>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </body>
</html>
<script type="text/javascript">
    $('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this user?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>
