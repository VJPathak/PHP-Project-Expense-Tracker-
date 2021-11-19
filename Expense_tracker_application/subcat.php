<?php

$conn = mysqli_connect("localhost", "root", "","expense_tracker");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET["submit"]))
{
$subcat = $_GET["subcat"];
$cat_name = $_GET["cat_name"];

$qry = "SELECT * FROM category WHERE cat_name = '$cat_name'";
$result = mysqli_query($conn,$qry);
$row = mysqli_fetch_array($result);
$cat_id = $row["cat_id"];

$qryy = "Insert into sub_category VALUES (NULL,'". $cat_id ."','". $subcat ."')";
if(mysqli_query($conn, $qryy))
{
    echo "ok";
     header("location:budget.php");
} 
else
{
    echo "1ERROR: Could not able to execute $qry " . mysqli_error($conn);
}

mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sub-Category</title>

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
  <label>Enter Sub-Categoey</label><br>
<input type="text" name="subcat" placeholder="Enter Sub-Category"><br> 
  <input type="submit" name="submit" value="Submit"> 
</form>
</div>
</center>

</body>
</html>