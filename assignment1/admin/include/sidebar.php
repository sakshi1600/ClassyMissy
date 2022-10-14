<style >
  .fa{

    margin-right: 5px;

  }
  .dropdown-container {
  display: none;
  background-color: #262626;
  padding-left: 8px;
}
</style>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
   <a href="home.php" class="w3-bar-item w3-button"><i class="fa fa-dashboard"></i>Dashboard</a>
<!-- <a href="country.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>Add Country Name</a> -->
  <a href="head_member.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>Add Family Head</a>
   <a href="headmember_view.php" class="w3-bar-item w3-button"><i class="fa fa-user"></i>Add Family Member</a>
    <a href="familymember_view.php" class="w3-bar-item w3-button"><i class="fa fa-list"></i>View All Family Member</a>
  <!--  <a href="logout.php" class="w3-bar-item w3-button"><i class="fa fa-circle-o-notch"></i>Logout</a> -->
 
</div>
<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var dropdownContent = this.nextElementSibling;
    if (dropdownContent.style.display === "block") {
      dropdownContent.style.display = "none";
    } else {
      dropdownContent.style.display = "block";
    }
  });
}
</script>