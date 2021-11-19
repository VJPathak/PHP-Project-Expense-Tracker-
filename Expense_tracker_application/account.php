<!DOCTYPE html>
<html>
<head>
	<title>
		
	</title>
</head>
<body>

</body>
<script type="text/javascript">
	
	function updateTextInput(val) 
	{
      document.getElementById('textInput').value=val; 
    }

</script>
</html>

<?php 
 session_start();
 
 echo "Your account is connected";
 echo "<br>";
 echo "<br>";
 
 if ($_SESSION['admin'] == 1) 
 {
  
  echo "Your are Admin";	
  <input type="range" name="rangeInput" min="0" max="100" onchange="updateTextInput(this.value);">
  <input type="text" id="textInput" value="">
   
 } 
 else 
 {
  echo "Your are Member";
 }
 


 ?>