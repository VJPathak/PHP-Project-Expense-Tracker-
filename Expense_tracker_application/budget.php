<?php

$conn = mysqli_connect("localhost", "root", "","expense_tracker");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
//echo "Connect Successfully";

if(isset($_GET["submit"]))
{

$cat_name = $_GET["cat_name"];
$budget = $_GET["budget"];
$month = $_GET["month"];
$year = $_GET["year"];
  

$qry = "SELECT * FROM category WHERE cat_name = '$cat_name'";
$result = mysqli_query($conn,$qry);
$row = mysqli_fetch_array($result);
$cat_id = $row["cat_id"];

$qryy = "Insert into monthly_budget VALUES (NULL,'". $cat_id ."','". $month ."','". $year ."','". $budget ."')";

if(mysqli_query($conn, $qryy))
{
    echo "Records inserted successfully.";
  //$last_id = mysqli_insert_id($conn);
  //echo "Last Inserted id is : " . $last_id;
} 
else
{
    echo "1ERROR: Could not able to execute $qry " . mysqli_error($conn);
}

}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Budget </title>


  <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script> 
    //Call the method on pageload
    $(window).load(function(){
      //Disply the modal popup
        $('#myModal').modal('show');
    });
  </script>

</head>
<style>
 
input[type=text], select {
  width: 50%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 50%;
  background-color: #808080;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #808080;
  color: black;
}

.div1 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  width: 50%;
  opacity: 90%;
}
 
body {
  background-image: url('https://www.teahub.io/photos/full/2-23472_currency-wallpapers-q13h252-high-resolution-money-hd.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

</style>
<body>

<br><br><br><br><br><br><br><br>

<center>
<div class = "div1">
<form action="" method="get"> 

  <label>Category:</label><br>
  <select name="cat_name" id="cat_name">
  <option value=0>-Select Category-</option>
  
  <?php
  $qry = "select * from category";
  $result = mysqli_query($conn,$qry);
  while($row = mysqli_fetch_array($result))
  {
     echo "<option name='".$row["cat_id"]."'>" . $row["cat_name"] .  "</option>";
  }
  ?>
  
  </select><br>

<label>Budget</label><br> 
<input type="text" name="budget" placeholder="Enter Budget"><br>
<label>Month</label><br> 
<input type="text" name="month" placeholder="Enter Month"><br>
<label>Year</label><br> 
<input type="text" name="year" placeholder="Enter Year">
<input type="submit" name="submit" value="Login">    
</form> 
</div>
</center>

</body>
</html>