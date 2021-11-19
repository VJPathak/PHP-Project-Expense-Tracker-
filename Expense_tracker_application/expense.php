<?php
session_start();
$conn = mysqli_connect("localhost", "root", "","expense_tracker");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


if(isset($_GET["submit"]))
{
$current_date = date("Y-m-d");
$cat_name = $_GET["cat_name"];
$subcat_name = $_GET["subcat_name"];
$reason = $_GET["reason"];
$expense = $_GET["expense"];
$username = $_GET["username"];

//$username = $_SESSION['username'];
$qryyy = "SELECT * FROM users WHERE username = '$username'";
$result = mysqli_query($conn,$qryyy);
$row = mysqli_fetch_array($result);
$user_id = $row["user_id"];


$qry1 = "SELECT * FROM category WHERE cat_name = '$cat_name'";
$result1 = mysqli_query($conn,$qry1);
$row1 = mysqli_fetch_array($result1);
$cat_id = $row1["cat_id"];

$qry2 = "SELECT * FROM sub_category WHERE sub_name = '$subcat_name'";
$result2 = mysqli_query($conn,$qry2);
$row2 = mysqli_fetch_array($result2);
$sub_id = $row2["sub_id"];


$qryy = "Insert into expenses VALUES (NULL,'". $cat_id ."','". $sub_id ."','". $user_id ."','". $current_date ."','". $expense ."','". $reason ."')";
if(mysqli_query($conn, $qryy))
{
    echo "ok";
} 
else
{
    echo "1ERROR: Could not able to execute $qryy " . mysqli_error($conn);
}


}

?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title> Expenses</title>


<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">

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


<br><br><br><br><br><br><br><br><br>
<center>
<div class = "div1">
<form action="" method="get"> 
<label>Enter Name</label><br>
<input type="text" name="username" placeholder="Enter Name"><br> 

<label>Category:</label><br>
<select name="cat_name" id="cat_name">
  <option value=0>-Select Category-</option>
  <?php
  $qry1 = "select * from category";
  $result1 = mysqli_query($conn,$qry1);
  while($row1 = mysqli_fetch_array($result1))
  {
     echo "<option name='".$row1["cat_id"]."'>" . $row1["cat_name"] .  "</option>";
  }
  ?>
</select><br>

<label>Sub-Category:</label><br>
  <select name="subcat_name" id="subcat_name">
  <option value=0>-Select Category-</option>
  
  <?php
  $qry2 = "select * from sub_category";
  $result2 = mysqli_query($conn,$qry2);
  while($row2 = mysqli_fetch_array($result2))
  {
     echo "<option name='".$row2["sub_id"]."'>" . $row2["sub_name"] .  "</option>";
  }
  ?>
</select><br>

<label>Expense</label><br>
<input type="text" name="expense" placeholder="Enter Expense"><br> 

<label>Reason</label><br>
<input type="text" name="reason" placeholder="Enter Reason"><br> 

<input type="submit" name="submit" value="Submit">    
</form> 
</div>
</center>

</body>
</html>