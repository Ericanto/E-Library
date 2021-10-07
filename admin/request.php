
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
	<center>
	<h2 style="color: white;">REQUEST OF BOOKS</h2></center><br>
		<?php
if(isset($_SESSION['login_user']))
{
	?>

		<div class="srch">
		<form method="post" name="form1">
				<input class="form-control" type="text" name="username" placeholder="Username"><br>
				<input class="form-control" type="text" name="bid" placeholder="Book ID"><br>
				<input style="width: 125px;" type="submit" name="submit" value="Submit">
		</form>
		</div>
	
<?php
	$sql="SELECT user.username,id,books.bid,book_title,author_name,publisher FROM user INNER JOIN issue_book ON user.username=issue_book.username inner join books on issue_book.bid=books.bid where issue_book.approve=''";
	$res=mysqli_query($db,$sql);
	if(mysqli_num_rows($res)==0)
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
		echo "<table background='images/design11-01_generated.jpg' class='table table-bordered ' >";
			echo "<tr style='color:yellow;'>";
				//Table header
				
				echo "<th style='text-align:center; '>"; echo "USERNAME";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "USER ID";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "BOOK ID";  echo "</th>";
				echo "<th style='text-align:center; '>"; echo "BOOK NAME";  echo "</th>";
								echo "<th style='text-align:center; '>"; echo "AUTHOR NAME";  echo "</th>";
									echo "<th style='text-align:center; '>"; echo "PUBLISHER";  echo "</th>";


				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr style='color:white;'>";
				echo "<td>"; echo $row['username']; echo "</td>";
								echo "<td>"; echo $row['id']; echo "</td>";

				echo "<td>"; echo $row['bid']; echo "</td>";

				echo "<td>"; echo $row['book_title']; echo "</td>";

				echo "<td>"; echo $row['author_name']; echo "</td>";

				echo "<td>"; echo $row['publisher']; echo "</td>";

				
				echo "</tr>";
			}
		echo "</table>";
		echo "</div>";

      }
			{
				
			}
}
else
{

	?>
			<center>	<div class="alert alert-danger" style="width: 800px;height: 80px;font-size: 30px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>You must login to see the requests</strong>	</center>
				<?php
}
if(isset($_POST['submit']))
	{
$_SESSION['name']=$_POST['username'];
$_SESSION['bid']=$_POST['bid'];
?>
<script type="text/javascript">
	window.location="approve.php";
</script>

<?php
	}
		?>
	</div>
</div>
</body>
</html>