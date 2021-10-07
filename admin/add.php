<!DOCTYPE html>
<html>
<head>
	<title>Books</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 70%;

		}
		
        .box
{
  
  height: 570px;
  width: 500px;
  text-align: center;
  background-color: black;
  margin: 70px auto;
  margin-top: 7px;
box-shadow: 8px 8px 15px;
  color: black;
   
background-image: url("images/design11-01_generated.jpg");
}
		body {
			
  background-image: url("images/alfons-morales-YLSwjSy7stw-unsplash.jpg");
  font-family: "Lato", sans-serif;
  
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
input[type="submit"]:hover
{
  background: #2ecc71;
}
input[type="text"], input[type="password"]
{
border: 0;
	background: black;
	
	text-align: center;
	border: 2px solid #3498db;
margin: 0px auto;
	width: 350px;
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

  			<div style="color: white;box-shadow: 3px 5px 5px; margin-left: 60px; font-size: 30px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

     <div class="h"> <a href="delete.php">Delete Books</a></div>

  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
</div>

<div id="main">
  
  <span style="color: white; font-size:30px;cursor:pointer" onclick="openNav()">&#9776; </span>
<section>
  <div class="box">
    <div style="text-align: center;color:white;"><br>
      <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Add New Book</h1><br>
    </div>
    <form action="" method="post" >
      <center>
      <br><input type="text" name="bid" class="form-control" placeholder="Book ID" required=""><br>
      <input type="text" name="isbn_no" class="form-control" placeholder="ISBN_NO" required=""><br>
      <input type="text" name="booktitle" class="form-control" placeholder="Book Name" required="">
      <br><input type="text" name="authorname" class="form-control" placeholder="Author Name" required=""><br>
      <input type="text" name="quantity" class="form-control" placeholder="Quantity" required=""><br>
      <input type="text" name="price" class="form-control" placeholder="Price" required=""><br>
      <input type="text" name="publisher" class="form-control" placeholder="Publisher" required=""><br>
      <input class="btn btn-default" type="submit" name="submit" value="ADD" style="color: white;"> <br></center>
    </form>

  <?php
if(isset($_POST['submit']))
{
if(isset($_SESSION['login_user']))
{
  mysqli_query($db,"INSERT INTO books VALUES('$_POST[bid]','$_POST[isbn_no]','$_POST[booktitle]','$_POST[authorname]','$_POST[quantity]','$_POST[price]','$_POST[publisher]');");
  ?>
<script type="text/javascript">
  alert("Book Added Successfully.");
  window.location="books.php";
</script>
  <?php
}
else
{
  ?>
  <script type="text/javascript">
    alert("You need to login first");
  </script>
  </section>
<?php
}
}
?>
<script>
function openNav() {
  document.getElementById("mySidenav").style.width = "300px";
  document.getElementById("main").style.marginLeft = "300px";
  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("main").style.marginLeft= "0";
  document.body.style.backgroundColor = "white";
}
</script>
</div>
</body>
</html>