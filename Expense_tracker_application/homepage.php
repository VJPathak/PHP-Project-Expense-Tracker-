<?php  
session_start();
if(isset($_GET["logout"]))
{
session_destroy();
$_SESSION["Name"]=NULL;
header("location:login.php");
}
?>



<!DOCTYPE html>
<html>
                                          
<head>
  	
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
	<title>
		  Expense Tracker - Your Personal Financing Assistant
	</title>

<style>


.vertical { 
            border-left: 3px solid green; 
            height: 95px; 
        } 


.button {
  border: none;
  color: black;
  padding: 15px 32px;
  text-align: center;
  font-size: 16px;
  margin: 4px 2px;
  background-color: white;
}

#a { 
            text-decoration: none; 
            color: #808080;
        } 

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #FFFFFF;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

.myDiv {
  border: 5px outset white;
  background-color: #F8F8F8;    
  text-align: center;
}

input[type=submit] {
  width: 40%;
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
  color: white;
}

</style>

</head>


<body style="background-color:#F8F8F8;">
 
<br>

<center>
	<table width='100%' border="0">
     <tr bgcolor="#F8F8F8">
   <td width="20%">
   <?php   
   if (isset($_SESSION['Name'])){
    echo "<span style='font-size:30px;cursor:pointer' onclick='openNav()'>&#9776; </span>";
   }
   ?>
   </td>
   <td width="8%">
    <img src="https://www.kindpng.com/picc/m/152-1522521_indian-rupee-symbol-1-indian-rupee-symbol-png.png" height="10" width="80%50
  
   <td width="1%">
   	<div class="vertical"><font size="4px" color="#F8F8F8">.</font></div>
   </td>

   </td> 
   <td>
   	<font size="100%" color="#3CB371">Expense Tracker</font>
    </td>
    <td align="right">
    <img src="https://www.jpsemedialimited.co.uk/wp-content/uploads/2016/05/square_icon-facebook.png" height="40" width="40">
     &nbsp;
    <img src="https://cdn4.iconfinder.com/data/icons/social-messaging-ui-color-shapes-2-free/128/social-instagram-new-square1-512.png" height="40" width="40">
     &nbsp;
    <img src="https://freepngimg.com/thumb/whatsapp/77220-scalable-vector-graphics-logo-whatsapp-icon-thumb.png" height="40" width="40">
   </td> 
     </tr>
    </table>
</center>


 
<center>
<table width='100%' border="0">    
  <tr>
  <td width="80%">
  </td>
  <td align="right" width="20%">

<?php 

if (isset($_SESSION['Name'])) 
{
//echo "Welcome " .$_SESSION['Name'];
echo "<font size='5%' color='#3CB371'>Welcome  </font>" .$_SESSION['Name'];
echo"<form action='' method='get'>
<input type='submit' name='logout' value='LOGOUT'>
</form>";
}

else
{
//echo "<form action='' method='get'>";
echo"<button class='button'><a id = 'a' href = 'signup.php'><b>Signup</b></a></button>"; 
//echo "<input type='submit' name='signup' value='SignUp'>"; 
//echo "<input type='submit' name='login' value='LogIn'>";
echo"<button class='button'><a id = 'a' href = 'login.php'><b>LogIn</b></a></button>"; 
//echo "</form>";
}
?>

  </td>
  </tr>
</table>
</center>
<?php  

if (isset($_SESSION['Name'])) {
echo "<div id='mySidenav' class='sidenav'>
  <a href='javascript:void(0)' class='closebtn' onclick='closeNav()'>&times;</a>
  <br><br>
  <a href='category.php'>Budget</a>
  <a href='expense.php'>Expenses</a>
  <a href='review.php'>Review</a>
  <a href='#'>About Us</a>
</div>";
}

?>

<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "270px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<div class="myDiv">
  <br>
  <center>
<div class="w3-content w3-section" style="max-width:95%">
  <img class="mySlides" src="https://vietnaminsider.vn/wp-content/uploads/2017/12/15-things-to-know-personal-finance.jpg" style="width:100%" height="600px">
  <img class="mySlides" src="https://imagesvc.meredithcorp.io/v3/mm/image?url=https%3A%2F%2Fstatic.onecms.io%2Fwp-content%2Fuploads%2Fsites%2F23%2F2020%2F10%2F08%2Fhow-to-save-money-during-the-holidays-tips-2000.jpg" style="width:100%" height="600px">
  <img class="mySlides" src="https://static.standard.co.uk/s3fs-public/thumbnails/image/2017/11/16/13/moneyjarshutterstock.jpg?w968" style="width:100%" height="600px">
</div>
</center>
</div>

<script>
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>

<footer>
<font face="Times New Roman" size="+1"
color="#7e7e7e">
<center>&copy; Copyright 2020 Expense Tracker</center>
</font>
</footer>

</body>

</html>

