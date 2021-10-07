
<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>
	<style type="text/css">
section
    {
      height: 550px;
      margin-top: 50px;
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
.box a:hover
{
  outline: solid;
 cursor: pointer;
background: black;
}

input[type="submit"]:hover
{
  background: #2ecc71;
}
    .box
{
  
  height: 550px;
  width: 450px;
  text-align: center;
  background-color: black;
  margin: 70px auto;
  box-shadow: 8px 8px 15px;
  color: black;
  background-image: url("images/design11-01_generated.jpg");
}
.box1
{
  height: 300px;
  width: 350px;
  text-align: center;
  margin: 70px auto;
}

	</style>
	<?php
	include "navbar.php";
	include "connection.php";
?>
</head>
<body>
		<?php
		
		$sql = "SELECT * FROM admin WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysqli_connect_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$id=$row['id'];
			$full=$row['fullname'];
			$username=$row['username'];
			$email=$row['email'];
			$password=$row['password'];
			$contact=$row['contact'];
		}

	?>
	<section class="box"><br>
	<h1 style="text-align: center; color: white;font-size: 35px;font-family: Lucida Console;">Edit Information
		
		<?php echo $_SESSION['login_user']; ?>
	</h1><center>
<table class="box1" border="2" style="text-align: center;font-size: 15px;color: white;">
		<form action="" method="post" enctype="multipart/form-data">
<tr>
	<td>	<b>Full Name</b></td>
	<td>
		<input type="text" name="full" value="<?php echo $full; ?>"></td>
</tr>
<tr>
	<td>
		<b>Username</b></td>
		<td>
		<input type="text" name="username" value="<?php echo $username; ?>"></td>
	</tr>
	<tr>
	<td>
		<b>Email</b></td>
		<td>
		<input type="text" name="email" value="<?php echo $email; ?>"></td>
	</tr>
<tr>
	<td>
		<b>Password</b></td>
		<td>
		<input type="text" name="password" value="<?php echo $password; ?>"></td>
	</tr>



<tr>
	<td>
		<b>Contact No</b></h4></label></td>
		<td>
		<input type="text" name="contact" value="<?php echo $contact; ?>"></td>
	</tr>

		<tr>
			<td colspan="2">
		<input class="btn btn-default" type="submit" name="submit" value="Save" style="color: white;"> 
		</td>
	</tr>
	</form>

</table>
</center>
	<?php 

		if(isset($_POST['submit']))
		{
			

			$full=$_POST['full'];
			$username=$_POST['username'];
			$email=$_POST['email'];
			$password=$_POST['password'];
			$contact=$_POST['contact'];

			$sql1= "UPDATE admin SET fullname='$full', username='$username', email='$email',password='$password', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="adminprofile.php";
					</script>
				<?php
			}
		}
 	?>

 </section>
</body>
</html>

