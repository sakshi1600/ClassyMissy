
<!-- 
*******************************DATE PICKER WITH VALIDATION*********************************** -->

         <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="stylesheet" type="text/css"/>  
   <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>  
   <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script> 
    <script type="text/javascript">
    $(function() {
  $("#datepicker").datepicker(
    {
       maxDate: '-21Y',
      dateFormat: 'yy-mm-dd',
      changeMonth: true,
      changeYear: true,
      yearRange: '90:-21'
    }
  );                    
});
   </script>