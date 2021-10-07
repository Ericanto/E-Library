
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

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
<body style="color: white;">
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; box-shadow: 3px 5px 5px;margin-left: 60px; font-size: 30px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>

</div>
<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<div class="container">


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
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))
		{
			
			$q=mysqli_query($db,"SELECT * from issue_book where username='$_SESSION[login_user]' and approve='';");

			if(mysqli_num_rows($q)==0)
			{
?>
<center><br><br><br><br><br><br>
          <div class="alert alert-danger" style="width: 800px;height: 80px;font-size: 30px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>There is no pending request</strong>
          </div>    
        </center>
        <?php
			}
			else
			{
				echo "<div class='box'>";
		echo "<table class='table table-bordered ' >";
			echo "<tr style='color:yellow;'>";
				//Table header
				
				echo "<th style='text-align:center; '>"; echo "Book-ID";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "APPROVE STATUS";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "ISSUE DATE";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "RETURN DATE";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr style='color:white;'>";
				echo "<td>"; echo $row['bid']; echo "</td>";
				echo "<td>"; echo $row['approve']; echo "</td>";
				echo "<td>"; echo $row['issue']; echo "</td>";
				echo "<td>"; echo $row['return']; echo "</td>";
				
				echo "</tr>";
			}
		echo "</table>";
		echo "</div>";
			}
		}
		else
		{
			?>
			<center><br><br><br><br><br><br>
          <div class="alert alert-danger" style="width: 800px;height: 80px;font-size: 30px;opacity: 0.9; text-align: center; background-color: black; color: white;">
            <strong>Please login first to see the request information</strong>
          </div>    
        </center>
	<?php
		}
		?>
	</div>
</div>
</body>
</html>