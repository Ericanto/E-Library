<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
E-LIBRARY	</title>
	
<style type="text/css">
body
{
  color: white;
  background-image: url("images/alfons-morales-YLSwjSy7stw-unsplash.jpg");
}
.box
{
	background-image: url("images/design11-01_generated.jpg");
	height: 300px;
	width: 450px;
	text-align: center;
	background-color: black;
	margin: 70px auto;
outline: solid;  
outline-color: black;
outline-width: 7px;
	color: white;
}
.logo img 
{
	padding-left: 80px;
}
header
{
	outline: solid;
	outline-color: white;
	outline-width: 4;
	height: 140px;
	width: 1500px;
	background-color: black;
	padding: 5px;
	

}
section
{
	height: 500px;

	width: 1500px;
	
}

h1, h2, h3, h4, h5, h6
{
	margin:0;
padding:0;

font-size:120%;
vertical-align:baseline;
background:transparent;
}
footer
{
	
	width: 1550px;
	
}
.logo
{
	float :left;
	padding-left: 20px;

}
li a
{

	color: white;
	text-decoration: none;
}
	nav
	{
		float: right;
		word-spacing: 30px;
		padding: 20px;
	}
	nav li 
	{
		display: inline-block;
		line-height: 80px;
	}
</style>
</head>


<body>
		<header>
		<div class="logo">
			<img src="images/9.png">
			<h1 style="color: white;margin-left: 107px;">E-LIBRARY</h1>
		</div>

		<?php
		if(isset($_SESSION['login_user']))
		{
			?>
				<nav>
					<ul style="font-size: 17px;">
						<li><a href="index.php">HOME</a></li>
						<li><a href="books.php">BOOKS</a></li>
						<li><a href="logout.php">LOGOUT</a></li>
						
				</nav>
			<?php
		}
		else
		{
			?>
						<nav>
							<ul>
								<li><a href="index.php">HOME</a></li>
								<li><a href="books.php">BOOKS</a></li>
								<li><a href="admin_login.php">LOGIN</a></li>
				
							
							</ul>
						</nav>
		<?php
		}
			
		?>

			
		</header>
		<section>
		<div class="sec">
			<br><br><br>
			<div class="box">
				<br><br><br><br>
				<h1 style="text-align: center; font-size: 35px;">Welcome to library</h1><br><br>
				<h1 style="text-align: center;font-size: 25px;">Opens at: 09:00 </h1><br>
				<h1 style="text-align: center;font-size: 25px;">Closes at: 16:00 </h1><br>
			</div>
		</div>
		</section>
	<?php  
include "footer.php";
	?>
</body>
</html>