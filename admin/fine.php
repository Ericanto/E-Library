
<!DOCTYPE html>
<html>
<head>
	<title>Fine Calculation </title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<style type="text/css">
		.srch
		{
			padding-left: 1230px;

		}
		  
input[type="text"], input[type="password"]
{
border: 0;
	background: black;
	
	text-align: center;
	border: 2px solid #3498db;

	width: 200px;
	outline: none;
	color: white;
	border-radius: 24px;
	transition: 0.25s;
}

input[type="submit"]
{
	border: 0;
	background: black;
height: 35px;
	width: 100px;
	text-align: center;
	border: 2px solid #2ecc71;

	outline: none;
	color: white;
	border-radius: 24px;
	transition: 0.25s;
	cursor: pointer;
}
		   .box
{
  

  text-align: center;
  background-color: black;
  margin: 70px auto;
  box-shadow: 8px 8px 15px;
  color: black;
  background-image: url("images/design11-01_generated.jpg");
}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 30px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
 
  overflow-x: hidden;
  transition: 0.4s;
  padding-top: 50px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: white;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: black;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>
	<?php
  include "connection.php";
  include "navbar.php";
?>
</head>
<body>

<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 30px;">

               <?php
                if(isset($_SESSION['login_user']))

                { 	
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div>
<br><br>
  <div class="h"><a href="request.php">Book Request</a></div>
  <div class="h"><a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;color: white; cursor:pointer" onclick="openNav()">&#9776;</span>


<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
  document.getElementById("main").style.marginLeft = "250px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>

	<!--__________________________search bar________________________-->
	<div class="srch">
		<form   method="post" name="form1">
<input class="" type="text" name="name" placeholder="Username" ><br><br>
<input class="" type="text" name="bid" placeholder="BID" ><br><br>
<input style="width: 80px;height: 27px ;margin-left: 120px;" type="submit" name="submit1" value="Paid">
				
								</form>
									</div>
<center>
	<h2 style="color: white;">LIST OF STUDENTS</h2></center>
	<?php
		if (isset($_POST['submit1'])) 
    {
     $s=mysqli_query($db,"UPDATE fine SET status='paid' where username='$_POST[name]' and bid='$_POST[bid]' ");

				$res=mysqli_query($db,"SELECT * FROM `fine` where status='not paid';");

		echo "<table style='color:black; box-shadow: 8px 8px 15px; background-image: url(images/design11-01_generated.jpg);' class='table table-bordered ' >>";
			echo "<tr style='color: yellow;'>";
				//Table header
				echo "<th style='text-align:center; '>"; echo " USERNAME ";	echo "</th>";
				echo "<th style='text-align:center; '>"; echo " BOOK_ID ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " RETURNED ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " DAYS ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " FINES IN Rs.";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " STATUS ";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='color: white;'>";
				
				echo "<td style='text-align:center; '>"; echo $row['username']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['bid']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['returned']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['day']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['fine']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}

			/*if button is not pressed.*/
		else
		{
	$res=mysqli_query($db,"SELECT * FROM `fine`;");

		echo "<table style='color:black; box-shadow: 8px 8px 15px; background-image: url(images/design11-01_generated.jpg);' class='table table-bordered ' >>";
			echo "<tr style='color: yellow;'>";
				//Table header
				echo "<th style='text-align:center; '>"; echo " USERNAME ";	echo "</th>";
				echo "<th style='text-align:center; '>"; echo " BOOK_ID ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " RETURNED ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " DAYS ";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " FINES IN Rs.";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo " STATUS ";  echo "</th>";
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='color: white;'>";
				
				echo "<td style='text-align:center; '>"; echo $row['username']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['bid']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['returned']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['day']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['fine']; echo "</td>";
				echo "<td style='text-align:center; '>"; echo $row['status']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

	?>
</div>
</body>
</html>