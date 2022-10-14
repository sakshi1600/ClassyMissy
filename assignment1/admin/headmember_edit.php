<?php include('../assets/constants/config.php');
   ?>
<?php
   $sql ="SELECT * FROM `family` WHERE id='".$_GET['id']."'";
   
   
  
     $result = $conn->query($sql);
     
     foreach ($result as $key) 
    
       {
         $h=$key['hobbies'];
         
          $hobby=explode(',',$h);
          $c=count($hobby);
   //print_r($hobby);exit;

   ?>
 <?php include('include/header.php');
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
   </head>
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
            <form  name="myForm" action="app/headmember_crud.php" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
               <input type="hidden" name="id"value="<?php echo $key['id'];?>">
               <div class="row">
                  <div class="col-md-6 ">
                     <label for="fname" class="p1" >First name:</label><br>
                     <input type="text" id="fname" name="fname"  placeholder="First Name"  value="<?php echo $key['fname'];?>"class="p2" required>
                  </div>
                  <div class="col-md-6 ">
                     <label for="lname" class="p1" >Last name:</label><br>
                     <input type="text" id="lname" name="lname" value="<?php echo $key['lname'];?>" placeholder="Last Name" class="p2" required>
                  </div>
                  <div class="col-md-6 ">
                     <label class="p1" >Birthdate:</label>
                     <br>
                     <input class="p2" type="Y-m-d" id="birthdate" name="date" value="<?php echo $key['date'];?>" placeholder="Above 21 allowed only" required>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Mobile Number:</label>
                     <br>
                     <input type="text" placeholder="Enter Contact Number"  name="mob_no" id="mob_no" class="p2"  pattern="[6789][0-9]{9}" minlength="10" maxlength="10" value="<?php echo $key['mob_no'];?>" title="Please enter valid phone number" required>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Select Image:</label><br>
                     <input class="form-control" type="file" name="file" value="" />
                     <img src="../assets/images/<?php echo $key['file'];?>" style="height: 50px;width: 50px;"><span name="old" id = "old"><?php echo $key['file'];?></span>
                     <input type="hidden" name="image_name" value="<?php echo $key['mob_no'];?>" />
                  </div>
                  <div class="col-md-6">
                     <p class="p1">Gender</p>
                     <?php
                        if ($key['gender'] == "Male") {
                            echo ' 
                                    <input type="radio" id="Male" name="gender" value="Male" checked>
                                    <label for="Male"class="p1">Male</label>
                                     <input type="radio" id="Female" name="gender" value="Female" >
                                     <label for="Male"class="p1">Female</label>
                                      <input type="radio" id="Female" name="gender" value="Other" >
                                      <label for="Male"class="p1">Other</label>
                                    
                                    
                                     ';
                        } elseif ($key['gender'] == "Female") {
                            echo '
                                    <input type="radio" id="Male" name="gender" value="male" >
                                    <label for="Male"class="p1">Male</label>
                                     <input type="radio" id="Female" name="gender" value="Female" checked >
                                     <label for="Male"class="p1">Female</label>
                                      <input type="radio" id="Female" name="gender" value="Other" >
                                      <label for="Male"class="p1">Other</label>';
                        } elseif ($key['gender'] == "Other") {
                            
                            echo '<input type="radio" id="Male" name="gender" value="male" >
                                    <label for="Male"class="p1">Male</label>
                                     <input type="radio" id="Female" name="gender" value="Female" checked >
                                     <label for="Male"class="p1">Female</label>
                                      <input type="radio" id="Female" name="gender" value="Other" >
                                      <label for="Male"class="p1">Other</label>';
                            
                        }
                        ?>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="p1">Marital status</label><br>
                        <!--  <select id='purpose' class="p2" name="status">
                           <option value="0">Un-married</option>
                           <option value="1">Married</option>
                           </select> -->
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
                  <div class="col-md-6">
                     <label class="p1">Address:</label><br>
                     <input type="text" placeholder="Enter Address" name="address" id="address" class="p2" value="<?php echo $key["address"];?>" required>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Pincode:</label><br>
                     <input type="text" placeholder="Enter pin" name="pin" id="pin" value="<?php echo $key["pin"];?>" class="p2" minlength="6" maxlength="6" size="6" regex = "^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$" required>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="p1">State</label>
                        <select class="form-control" name="state_id" id="state-dropdown" required>
                           <?php
                              $sql1 ="SELECT * FROM `state` WHERE id='".$key['state_id']."'";
                              
                              
                              
                              //print_r($sql);exit;
                                $result1 = $conn->query($sql1);
                                
                                foreach ($result1 as $key1)
                               
                                  {?>
                           <option value="<?php echo $key['state_id'];?>"><?php echo $key1["state"];?></option>
                           <?php
                              }
                              ?>
                           <?php
                              require_once "../assets/constants/config.php";
                              $result = mysqli_query($conn,"SELECT * FROM `state`");
                              while($row = mysqli_fetch_array($result)) {
                              ?>
                           <option value="<?php echo $row['id'];?>"><?php echo $row["state"];?></option>
                           <?php
                              }
                              ?>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="city" class="p1">City</label>
                        <select class="form-control" id="city-dropdown" name="city_id" required>
                           <?php
                              $sql2 ="SELECT * FROM `city` WHERE id='".$key['city_id']."'";
                              
                              
                              
                              //print_r($sql);exit;
                                $result2 = $conn->query($sql2);
                                
                                foreach ($result2 as $key2)
                               
                                  {?>
                           <option value="<?php echo $key['city_id'];?>"><?php echo $key2["city"];?></option>
                           <?php
                              }
                              ?>
                        </select>
                     </div>
                  </div>


                  <div class="col-md-6 ">
                    
                        <label for="hobbies" class="p1 p2" >Hobbies:</label><br>
 <div id="tab_logic" class="after-add-more">
                        <?php
                        foreach($hobby as $key=> $row) { 
                           echo ' <input type="text" id="hobbies" name="hobbies[]"  placeholder="hobbies" onkeydown="return /[a-z]/i.test(event.key)"  class="p2" value="'.$row.'"  required >';
                        }
                        ?>
                       
                     </div>
                           <div class="appendme "></div>
                           <a class="btn btn-success appendbtn">+ Add More</a>
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

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script
  src="https://code.jquery.com/jquery-2.2.3.min.js"
  integrity="sha256-a23g1Nt4dtEYOj7bR+vTu7+T8VP13humZFBJNIYoEJo="
  crossorigin="anonymous"></script>
  <script>
     $(".appendbtn").click(function () {
   $(".appendme").append('<div class="appendme"><input type="text" id="hobbies" name="hobbies[]"  placeholder="hobbies"  class="p2" onkeydown="return /[a-z]/i.test(event.key)"></div>');
});
  </script>
<!-- *****************Marrieds status***************** -->
<script >
   $('#purpose').on('change', function () {
    if (this.value == '1') {
        $("#business").show();
    } else {
      value=='0'
        $("#business").hide();
    }
   
   });
</script>
<!-- *****************Marrieds status END***************** -->
<!-- *****************ADD MORE HOBBIES*********************** -->
<script>
 

$(document).ready(function() {
    $(".add-more").click(function(){ 
        var html = $("#tab_logic").html();
        $(".more-feilds").append(html);        
    });

    $("body").on("click",".remove",function(){ 
        $(this).parents("#tab_logic").remove();
    });
});
</script>
<!-- *****************ADD MORE HOBBIES END*********************** -->

<!-- **************************************FORM VALIDATION********************** -->
<script type="text/javascript">
function validateForm() {
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

  let z = document.forms["myForm"]["date"].value;
  if (z == "") {
    alert("date must be filled out");
    return false;
  }
  let p = document.forms["myForm"]["mob_no"].value;
  if (p == "") {
    alert("mob_no must be filled out");
    return false;
  }
  
 
  let r= document.forms["myForm"]["gender"].value;
  if (r == "") {
    alert("gender must be filled out");
    return false;
  }
  let t= document.forms["myForm"]["address"].value;
  if (t == "") {
    alert("address must be filled out");
    return false;
  }
   let u= document.forms["myForm"]["pin"].value;
  if (u == "") {
    alert("pin must be filled out");
    return false;
  }
  let v = document.forms["myForm"]["state_id"].value;
  if (v == "") {
    alert("State Name must be filled out");
    return false;
  }
    let w = document.forms["myForm"]["city_id"].value;
  if (w == "") {
    alert("City Name must be filled out");
    return false;
  }
    
}
</script>
<!-- **************************************FORM VALIDATION END ********************* -->

<!-- **************************************BIRTHDATE*************************** -->
<script type="text/javascript">
   $("#birthdate").on("change",function(){
        var birthdate_selected = $(this).val();
        
       var today = new Date();
       var birthDate = new Date(birthdate_selected);
       
       var age = today.getFullYear() - birthDate.getFullYear();
       var m = today.getMonth() - birthDate.getMonth();
       if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
           age--;
       }
        if(age >= 21)
        {
         

        }
        else
        {
          swal("Your age should be 21 Years!","","error")
          .then((value) => {
                     if(value)
                     {
                     window.location.reload();
 
                     }
                     else
                     {
                       //window.location.reload();
                     }
                });
         }

       });
</script>
<!-- *******************BIRTHDATE END*************************** -->