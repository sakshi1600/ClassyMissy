<?php include('../assets/constants/config.php');
   ?>
   <?php include('include/header.php');
   ?>
<?php
   $sql ="SELECT * FROM `member` WHERE id='".$_GET['id']."'";
   
   
   
   // print_r($sql);exit;
     $result = $conn->query($sql);
     //print_r($result);exit;
     foreach ($result as $key) 
   
    
       {
        ?>
 
      <style>
         .btn {
         margin-top: 20px;
         font-family: "Times New Roman", Times, serif;
         }
         .card {
         margin-top: 20px;
         /*background-color: #DCDCDC;*/
         }
         .p1 {
         font-family: "Times New Roman", Times, serif;
         margin-top: 5px;
         }
         .p2{
         width: 100%;
         }
         input, textarea,h3,select,option{
         font-family: "Times New Roman", Times, serif;
         }
      </style>
     <body>
      <?php include('include/sidebar.php');
         ?>
      <div style="margin-left:25%">
      <div class="w3-container w3-teal">
         <h1>My Page</h1>
      </div>
      <!-- <img src="img_car.jpg" alt="Car" style="width:100%"> -->
      <center>
         <h3> Add Details</h3>
      </center>
        
      <div class="container">
         <button type="button" value="Go back!" onclick="history.back()">BACK</button>
         <div class="card" >
            <div class="card-header" style="font-family: Times New Roman, Times, serif;">
               <h4>Add Family Head</h4>
            </div>
            <div class="card-body">
               <form  name="myForm" action="app/membercrud.php" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id"value="<?php echo $key['id'];?>">
                  <div class="row">
                     <div class="col-md-6 ">
                        <label for="relation" class="p1" >Relation:</label><br>
                        <input type="text" id="relation" name="relation"  placeholder="relation"  class="p2" value="<?php echo $key['relation'];?>" required >
                     </div>
                     <div class="col-md-6 ">
                        <label for="fname" class="p1" >First name:</label><br>
                        <input type="text" id="fname" name="fname"  placeholder="First Name"  value="<?php echo $key['fname'];?>"class="p2"required >
                     </div>
                     <div class="col-md-6 ">
                        <label for="lname" class="p1" >Last name:</label><br>
                        <input type="text" id="lname" name="lname" value="<?php echo $key['lname'];?>" placeholder="Last Name" class="p2" required>
                     </div>
                     <div class="col-md-6 ">
                        <label class="p1" >Birthdate:</label>
                        <br>
                        <input class="p2" id="b_date" name="b_date" value="<?php echo $key['b_date'];?> " >
                     </div>
                     <div class="col-md-6 ">
                        <label for="education" class="p1" >Education:</label><br>
                        <input type="text" id="education" name="education"  value="<?php echo $key['education'];?>"  placeholder="education" class="p2" required>
                     </div>
                     <div class="col-md-6">
                        <label class="p1">Select Image:</label><br>
                        <input class="form-control" type="file" name="file" value="" />
                        <img src="../assets/images/<?php echo $key['file'];?>" style="height: 50px;width: 50px;"><span name="old" id = "old"><?php echo $key['file'];?></span>
                        <input type="hidden" name="image_name" value="<?php echo $key['file'];?>" />
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label class="p1">Marital status</label><br>
                           <select class="form-control p2" id="purpose" name="status">
                             <?php
                                 if ($key["status"]==1) {?>
                              <option value="<?php echo $key["status"]==1;?>" >Married</option>
                               <option value="0">Un-married</option>
                              <?php }
                                 else{?>
                              <option value="<?php echo $key["status"]==0;?>" >Unmarried</option>
                              
                           <option value="1">Married</option>
                              <?php }?>
                           </select>
                        </div>
                     </div>
                     <div style='display:none;' id='business' class="p2">Marriage Date
                     <br/>&nbsp;
                     <br/>&nbsp;
                      <?php
                                 if ($key["status"]==1) {?>
                  <input type='date' class='p1' name='w_date' value="<?php echo $key["w_date"];?>" />
                    <?php  }
                     if ($key["status"]==0){?>
                           <input type='date' class='p1' name='w_date' value="0" />
                 <?php   }?>
                     <br/>
                  </div>
                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-success" name="update" value="update">Update</button>
                     </div>
                  </div>
                  <!--    <button type="submit" name="submit" value="submit"></button>
                     -->
               </form>
               <?php }?>
            </div>
         </div>
      </div>
   </body>
</html>
<?php include('include/footer.php');
   ?>
<!-- *****************Marrieds status***************** -->
<script >
   $('#purpose').on('change', function () {
    if (this.value == '1') {
        $("#business").show();
    } else {
        $("#business").hide();
    }
   
   });
</script>
<!-- *****************Marrieds status END***************** -->

<!-- **************************************FORM VALIDATION********************** -->
<script type="text/javascript">
function validateForm() {
   let a = document.forms["myForm"]["relation"].value;
  if (a == "") {
    alert("Relation  must be filled out");
    return false;
  }
  let x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }

  let y = document.forms["myForm"]["lname"].value;
  if (y == "") {
    alert("Last Name must be filled out");
    return false;
  }

  let z = document.forms["myForm"]["b_date"].value;
  if (z == "") {
    alert("date must be filled out");
    return false;
  }

  let r= document.forms["myForm"]["education"].value;
  if (r == "") {
    alert("education must be filled out");
    return false;
  }
 
  
}
</script>
<!-- **************************************FORM VALIDATION END ********************* -->