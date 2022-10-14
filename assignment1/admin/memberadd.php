<?php include('../assets/config.php');
   ?>
<?php 
   // print_r($_GET);
   
   $head_id = $_GET['id'];
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
                  <h4>Add Family Member</h4>
               </div>
               <div class="card-body">
                  <form  name="myForm" action="app/membercrud.php" onsubmit="return validateForm()" method="POST" enctype="multipart/form-data">
                     <input type="hidden" name="head_id" value="<?php echo $head_id; ?>">
                     <div class="row">
                        <div class="col-md-6 ">
                           <label for="relation" class="p1" >Relation:</label><br>
                           <input type="text" id="relation" name="relation"  placeholder="relation"  class="p2" required>
                        </div>
                        <div class="col-md-6 ">
                           <label for="fname" class="p1" >First name:</label><br>
                           <input type="text" id="fname" name="fname"  placeholder="First Name"  class="p2" required>
                        </div>
                        <div class="col-md-6 ">
                           <label for="lname" class="p1" >Last name:</label><br>
                           <input type="text" id="lname" name="lname"  placeholder="Last Name" class="p2" required>
                        </div>
                        <div class="col-md-6 mt-2px">
                           <label class="p1" >Birthdate:</label>
                           <br>
                           <input type="date" placeholder="Birthdate" name="b_date" id="b_date" class="p2" required>
                        </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label class="p1">Marital status</label><br>
                              <select id='purpose' class="p2" name="status"required>
                                 <option value="">Select</option>
                                 <option value="0">Un-married</option>
                                 <option value="1">Married</option>
                              </select>
                           </div>
                        </div>
                        <div style='display:none;' id='business' class="p2">Marriage Date
                           <br/>&nbsp;
                           <br/>&nbsp;
                           <input type='date' class='p1' name='wdate' />
                           <br/>
                        </div>
                        <div class="col-md-6 ">
                           <label for="education" class="p1" >Education:</label><br>
                           <input type="text" id="education" name="education"  placeholder="education" class="p2" required>
                        </div>
                        <div class="col-md-6">
                           <label class="p1">Select Image:</label><br>
                           <input class="form-control" type="file" name="file" value="" required/>
                        </div>
                        <!--         <div class="col-md-6">
                           <div class="form-group change">
                               <label for="">&nbsp;</label><br/>
                               <a class=" add-more" ><button type="submit" onclick="register()">Add More</button></a>
                           </div>
                           </div> -->
                     </div>
                     <div class="row">
                        <div class="col-md-6">
                           <button type="submit" class="btn btn-success" name="submit" value="submit">Submit</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
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
  let s= document.forms["myForm"]["status"].value;
  if (s == "") {
    alert("status must be filled out");
    return false;
  }
  le
   let q = document.forms["myForm"]["file"].value;
  if (q == "") {
    alert("file must be filled out");
    return false;
  }
  
  
}
</script>
<!-- **************************************FORM VALIDATION END ********************* -->