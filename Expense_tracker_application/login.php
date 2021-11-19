<?php
session_start(); 
if(isset($_GET["login"]))
{

$email = $_GET["email"];
$pass = $_GET["pass"];

if (($email == "") || ($pass == "")) 
{
  echo "pl enter email and PassWord";
} 

else 
{

  $conn = mysqli_connect("localhost", "root", "","expense_tracker");
  
  if($conn == false)
  {
    die("ERROR: Could not connect. " . mysqli_connect_error());
  }
  
  //echo "Connect Successfully";

  $qry = "SELECT * FROM users WHERE email = '$email' and password = '$pass'";
 // $qry1 = "SELECT * from users where email = '$email' and password = '$pass' and id_admin = 1 ";
  
  //echo $qry;
 
  $result = mysqli_query($conn,$qry);
  $count = mysqli_num_rows($result);

  if ($count > 0) 
  {
    
    $row = mysqli_fetch_array($result);
    echo $row1["id_admin"];
    $id_admin = $row["id_admin"];
    $Name = $row["full_name"];
    $_SESSION['Name']=$Name;
    $username = $row["username"];
    $_SESSION['username']=$username;
   if ($id_admin == 1) 
   {
    
    $admin=1;
    $_SESSION['admin']=$admin;
   
   } 
   else
   {
    $admin=0;
    $_SESSION['admin']=$admin;
   }
   
   header("location:homepage.php");
 
  } 
  else 
  {
    echo "Invalid User";
  }
  
  
}
}
?>

<html>
<head>

<title> Login </title>
<link rel="icon" href="https://www.kindpng.com/picc/m/152-1522521_indian-rupee-symbol-1-indian-rupee-symbol-png.png" type="image/icon type">
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

input[type=password], select {
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
  background-image: url('https://static.standard.co.uk/s3fs-public/thumbnails/image/2017/11/16/13/moneyjarshutterstock.jpg?w968');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

.button {
  background-color: #A8A8A8;
  border: none;
  padding: 15px 32px;
  text-decoration: none;
  font-size: 16px;
  color: white;
}

</style>

<br>
<center>
<font size="10%" color="#585858">LOGIN FORM</font>
</center>
<br><br><br>

<center>
<div class = "div1">
<form action="" method="get"> 
<label>Email</label><br>
<input type="text" name="email" placeholder="Enter your Email"><br> 
<label>Password</label><br> 
<input type="password" name="pass" placeholder="Enter your Password">
<input type="submit" name="login" value="Login">    
</form> 
</div>
</center>
<br><br>

<center>
<div class = "div1">
<font size="5%" color="#585858">New User ?</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button class="button">Signup</button> 
</div>
</center>

</body>
</html>