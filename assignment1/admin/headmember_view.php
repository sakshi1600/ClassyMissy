<?php include('../assets/constants/config.php');
   ?>
 <?php include('include/header.php');
   ?>
 <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css
">
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
         .fa{
            color: black;
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
         <center>
            <h3>Details</h3>
         </center>
           <button type="button" value="Go back!" onclick="history.back()">BACK</button>
         <div class="card">
            <div class="card-header" style="font-family: Times New Roman, Times, serif;">Family Head Details <a href="head_member.php" > <button class="btn btn-outline-primary" >Add New Head</button></a></div>
            <div class="card-body">
               <table id="example" class=".table-striped">
                  <tr>
                     <th>ID</th>
                     <th>First Name</th>
                     <th>Mobile</th>
                     <th>Family Member</th>
                     <th>Add New Member</th>
                     <th>Action</th>
                  </tr>
                  <tbody>
                     <?php
                        $sql = "SELECT * FROM `family` WHERE `delete_status`=0";
                        //print_r($sql);exit;
                        $count=0;
                           $result = $conn->query($sql);
                           foreach ($result as $key) 
                             {?>
                     <tr>
                        <td><?php echo ++$count;?></td>
                        <td><?php echo $key['fname'] ." ".$key['lname'];?></td>
                        <td><?php echo $key['mob_no'];?></td>
                        <td>
                           <center>
                           <?php 
                              $sql3 ="SELECT COUNT(head_id) AS total FROM `member` Where head_id='".$key['id']."' AND `delete_status`=0";
                              
                              //print_r($sql3);
                              $result3 = $conn->query($sql3);
                              //print_r($result);
                              foreach ($result3 as $key3)
                              {?>
                           <p class="card-text" > <a href="member_view.php?id=<?php echo $key['id'];?>"><i class="fa fa-user">
                              <?php echo $key3['total'];?></i> </a>
                              <?php }?>
                           </p>
                        </center>
                        </td>
                        <td>
                           <center><a href="memberadd.php?id=<?php echo $key['id'];?>"><i class="fa fa-plus">Add </i></a></center></td>
                        <td ><a href="headmember_edit.php?id=<?php echo $key['id'];?>"><i class="fa fa-edit" style="font-size:15px; color: blue;" title="edit"></i></a>
                           <a class="delete_button"  href="app/headmember_crud.php?id=<?php echo $key['id'];?>"><i class="fa fa-trash-o" style="font-size:15px; color: red;" title="delete"></i></a>
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
<script >
$(document).ready(function () {
    $('#example').DataTable();
});
</script>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $('.delete_button').click(function(e){
        var result = confirm("Are you sure you want to delete this user?");
        if(!result) {
            e.preventDefault();
        }
    });
</script>


