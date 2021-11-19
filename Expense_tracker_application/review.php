<?php

$conn = mysqli_connect("localhost", "root", "","expense_tracker");
$qry = "SELECT * from expenses";
$result = mysqli_query($conn,$qry);
$result1 = mysqli_query($conn,$qry);
$result2 = mysqli_query($conn,$qry);
$result3 = mysqli_query($conn,$qry);
$result4 = mysqli_query($conn,$qry);
$result5 = mysqli_query($conn,$qry);
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Review</title>

<style>

body {
  background-image: url('https://www.teahub.io/photos/full/2-23472_currency-wallpapers-q13h252-high-resolution-money-hd.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: 100% 100%;
}

#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
  opacity: 90%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers td:nth-child(even){background-color: #f2f2f2;}
#customers td:nth-child(odd){background-color: #E0E0E0;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: center;
  background-color: #4CAF50;
  color: white;
}
</style>

</head>

<body>

<br><br><br><br><br><br><br><br><br>


<table id="customers">

   <tr>
    <th>Name</th>
    <th>Category</th>
     <th>Sub-Categoty</th>
    <th>Date_Time</th>
     <th>Expense</th>
    <th>Reason</th>
    </tr>
    
    <tr>
    <td>
      
    <?php
    while($row = mysqli_fetch_array($result))
    {
    $user = $row["user_id"];
    $qry7 = "select * from users WHERE user_id = '$user'";
    $result7 = mysqli_query($conn,$qry7);
    $row7 = mysqli_fetch_array($result7);
    echo $row7["full_name"];
    echo "<br>";
    }
    ?>

    </td>
    <td>
      
   <?php
    while($row1 = mysqli_fetch_array($result1))
    {
    $cat = $row1["cat_id"];
    $qry6 = "select * from category WHERE cat_id = '$cat'";
    $result6 = mysqli_query($conn,$qry6);
    $row6 = mysqli_fetch_array($result6);
    echo $row6["cat_name"];
    echo "<br>";
    }
    ?>

    </td>
    <td>
      
   <?php
    while($row2 = mysqli_fetch_array($result2))
    {
    $sub = $row2["sub_id"];
    $qry7 = "select * from sub_category WHERE sub_id = '$sub'";
    $result7 = mysqli_query($conn,$qry7);
    $row7 = mysqli_fetch_array($result7);
    echo $row7["sub_name"];
    echo "<br>";
    }
    ?>

    </td>
    <td>
      
   <?php
    while($row3 = mysqli_fetch_array($result3))
    {
    echo $row3["date_time"];
    echo "<br>";
    }
    ?>

    </td>
    <td>
      
   <?php
    while($row4 = mysqli_fetch_array($result4))
    {
    $Color = "red"; 
    $qry8 = "select * from monthly_budget";
    $result8 = mysqli_query($conn,$qry8);
    $row8 = mysqli_fetch_array($result8);
    $budget = $row8["budget"];
    $expense = $row4["expense"];

    if ($expense >= $budget) 
    {
      echo "<span style=\"color:red\">$expense</span>";
    } 
    else 
    {
      echo $expense;
    }
    

    echo "<br>";
    }
    ?>

    </td>
    <td>
      
   <?php
    while($row5 = mysqli_fetch_array($result5))
    {
    echo $row5["reason"];
    echo "<br>";
    }
    ?>

    </td>
    </tr>

</table>

</body>
</html>