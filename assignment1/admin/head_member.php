<?php include('../assets/config.php');
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
            <form  name="myForm" onsubmit="return validateForm()" action="app/headmember_crud.php"  method="POST" enctype="multipart/form-data" >
               <div class="row">
                  <div class="col-md-6 ">
                     <label for="fname" class="p1" >First name:</label><br>
                     <input type="text" id="fname" name="fname"  placeholder="First Name"  class="p2"  onkeydown="return /[a-z]/i.test(event.key)" required>
                  </div>
                  <div class="col-md-6 ">
                     <label for="lname" class="p1" >Last name:</label><br>
                     <input type="text" id="lname" name="lname"  placeholder="Last Name" class="p2" onkeydown="return /[a-z]/i.test(event.key)"  >
                  </div>
                  <div class="col-md-6 ">
                     <label class="p1" >Birthdate:</label>
                     <br>
                     <input class="p2" type="date" id="birthdate" name="date"  placeholder="Above 21 allowed only  "required>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Mobile Number:</label>
                     <br>
                     <input type="text" placeholder="Enter Contact Number"  name="mob_no" id="mob_no" class="p2"  pattern="[6789][0-9]{9}" title="Please enter valid phone number" maxlength="10" required>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Select Image:</label><br>
                     <input class="form-control" type="file" name="file" value="" required/>
                  </div>
                  <div class="col-md-6">
                     <p class="p1">Gender</p>
                     <input type="radio" id="html" name="gender" value="Male">
                     <label for="Male"class="p1">Male</label>
                     <input type="radio" id="Female" name="gender" value="Female">
                     <label for="Female"class="p1 ">Female</label>
                     <input type="radio" id="javascript" name="gender" value="Other">
                     <label for="Other"class="p1">Other</label>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label class="p1">Marital status</label><br>
                        <select id='purpose' class="p2" name="status" required>
                           <option value="">Select Status</option>
                           <option value="0">Un-married</option>
                           <option value="1">Married</option>
                        </select>
                     </div>
                  </div>
                  <div style='display:none;' id='business' class="p2">Marriage Date
                     <br/>&nbsp;
                     <br/>&nbsp;
                     <input type='date' class='p1' name='w_date' />
                     <br/>
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Address:</label><br>
                     <textarea type="text" placeholder="Enter Address" name="address" id="address" class="p2" required></textarea> 
                  </div>
                  <div class="col-md-6">
                     <label class="p1">Pincode:</label><br>
                     <input type="text" id="inputField" placeholder="Enter pin" name="pin"  class="p2" minlength="6" maxlength="6" size="6" regex = "^[1-9]{1}[0-9]{2}\\s{0, 1}[0-9]{3}$" required>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                        <label for="state" class="p1">State</label>
                        <select class="form-control" name="state_id" id="state-dropdown"required>
                           <option value="">Select State</option>
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
                        <select class="form-control" id="city-dropdown" name="city_id"required>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-6 ">
                   
                        <label for="hobbies" class="p1 p2" >Hobbies:</label><br>
                          <div id="tab_logic" class="after-add-more">
                        <input type="text" id="hobbies" name="hobbies[]"  placeholder="hobbies"  class="p2" onkeydown="return /[a-z]/i.test(event.key)" required>
                     </div>
                      <div class="more-feilds"></div>
                     <div class="col-md-6">
                        <div class="form-group change">
                           <label for="">&nbsp;</label><br/>
                           <a class="btn btn-success add-more">+ Add More</a>
                        </div>
                     </div>

                  </div>
                  <div class="row">
                     <div class="col-md-6">
                        <button type="submit" class="btn btn-outline-success" name="submit" value="submit">Submit</button>
                     </div>
                  </div>
                  <!--    <button type="submit" name="submit" value="submit"></button>
                     -->
            </form>
            </div>
         </div>
      </div>
   </body>
</html>
<?php include('include/footer.php');
   ?>

   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
  
   let q = document.forms["myForm"]["file"].value;
  if (q == "") {
    alert("file must be filled out");
    return false;
  }
  let r= document.forms["myForm"]["gender"].value;
  if (r == "") {
    alert("gender must be filled out");
    return false;
  }
  let s= document.forms["myForm"]["status"].value;
  if (s == "") {
    alert("status must be filled out");
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
<!-- **************************************BIRTHDATE END*************************** -->

<script type="text/javascript">
   inputField.addEventListener('input', function () {
  if ((inputField.value/inputField.value) !== 1) {
    console.log("Please enter a number");
  }
});
</script>