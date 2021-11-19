<?php

$conn = mysqli_connect("localhost", "root", "","expense_tracker");
if($conn == false)
{
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

if(isset($_GET["submit"]))
{
$cat = $_GET["cat"];

$qry = "Insert into category VALUES (NULL,'". $cat ."')";

if(mysqli_query($conn, $qry))
{
    header("location:subcat.php");
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
<title> Category </title>


<link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">


<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
  <script> 
    //Call the method on pageload
    $(window).load(function(){
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


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">
                                            <center>
                                            <font size="5%">
                                              How To Get Started<br>
                                            </font>
                                            </center>
                                            </h4>
                                        </div>
                                    <div class="modal-body">
                                      <img src="instruction.png" height="500px" width="100%">
                                  </div>
</div>
</div>
</div> 


<br><br><br><br><br><br><br><br><br>
<center>
<div class = "div1">
<form action="" method="get"> 
<label>Category</label><br>
<input type="text" name="cat" placeholder="Enter Category (If not Exists)"><br> 
<input type="submit" name="submit" value="Submit">    
</form> 
</div>
</center>

</body>
</html>