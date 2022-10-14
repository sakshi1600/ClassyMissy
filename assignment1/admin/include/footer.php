<!-- *****************Birthdate above 21***************** -->
<script>
function getAge() {
var dateString = document.getElementById("date").value;
if(dateString !="")
{
    var today = new Date();
    var birthDate = new Date(dateString);
    var age = today.getFullYear() - birthDate.getFullYear();
    var m = today.getMonth() - birthDate.getMonth();
    var da = today.getDate() - birthDate.getDate();
    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
        age--;
    }
    if(m<0){
        m +=12;
    }
    if(da<0){
        da +=30;
    }
    
  if(age < 21 || age > 80)
{
alert("Age "+age+" is Restrict");

} else {

alert("Age "+age+" is Allowed");
}
} else {
alert("please provide your date of birth");
}
}


</script>

<!-- *****************Birthdate above 21 END***************** -->

<!-- ************************SCRIPT FOR DEPENDENT USING AJAX*********** -->
<script>
$(document).ready(function() {

$('#state-dropdown').on('change', function() {
var state_id = this.value;
$.ajax({
url: "cities-by-state.php",
type: "POST",
data: {
state_id: state_id
},
cache: false,
success: function(result){
$("#city-dropdown").html(result);
}
});
});
});
</script>
<!-- ************************SCRIPT FOR DEPENDENT USING AJAX END********** -->

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


<!-- *****************Marrieds status ***************** -->
<script >
   $('#purpose2').on('change', function () {
    if (this.value == '1') {
        $("#busines").show();
    } else {
        $("#busines").hide();
    }

});
</script>

<!-- *****************Marrieds status END***************** -->
