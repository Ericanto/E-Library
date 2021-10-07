
 <!DOCTYPE html>
 <html>
 <head>
 	<title>My Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			font-size: 17px;
 			width: 350px;

 			margin: 0 auto;
 			color: white;
 		}
 		    .box
{
  
  height: 500px;
  width: 470px;
  text-align: center;
  background-image: url("images/design11-01_generated.jpg");
  margin: 70px auto;
  box-shadow: 8px 8px 15px;
  color: black;
}
 	</style>
 	<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 </head>
 <body><br>
 	<div class="box">
 		
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM admin where username='$_SESSION[login_user]' ;");
 			?>
 			<br>
 			<h2 style="text-align: center;font-size: 35px;"><b>My Profile</b></h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);
 			?>
 			<div style="text-align: center;font-size: 30px;">Welcome
	 			<h4 style="font-size: 25px;">
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 			<?php
 					echo "<b>";
 				echo "<table class='table table-bordered'>";
	 				echo "<tr>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo "<b> Full Name: </b>";
	 							echo "</center>";
	 					echo "</td>";

	 					echo "<td>";
	 					echo "<center>";
	 						echo $row['fullname'];
	 						echo "</center>";
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo "<b> Username: </b>";
	 						echo "</center>";
	 					echo "</td>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo $row['username'];
	 						echo "</center>";
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo "<b> Email: </b>";
	 						echo "</center>";
	 					echo "</td>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo $row['email'];
	 						echo "</center>";
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo "<b> Password: </b>";
	 						echo "</center>";
	 					echo "</td>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo $row['password'];
	 						echo "</center>";
	 					echo "</td>";
	 				echo "</tr>";

	 				echo "<tr>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo "<b> Contact: </b>";
	 						echo "</center>";
	 					echo "</td>";
	 					echo "<td>";
	 					echo "<center>";
	 						echo $row['contact'];
	 						echo "</center>";
	 					echo "</td>";
	 				echo "</tr>";
 				echo "</table>";
 				echo "</b>";
 			?>
 		</div>
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right;margin-right: 60px;box-shadow: 5px 5px 15px;color: black;font-size: 17px; width: 70px;" name="submit1">Edit</button>
 		</form>
 	</div>
 </body>
 </html>