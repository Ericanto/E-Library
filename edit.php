
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
		
		$sql = "SELECT * FROM user WHERE username='$_SESSION[login_user]'";
		$result = mysqli_query($db,$sql) or die (mysqli_connect_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$first=$row['first'];
			$last=$row['last'];
			$username=$row['username'];
			$password=$row['password'];
			$email=$row['email'];
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
			<td><b>First Name </b></td>
		<td>
		<input type="text" name="first" value="<?php echo $first; ?>"></td>
	</tr>
<tr>
	<td>	<b>Last Name</b></td>
	<td>
		<input type="text" name="last" value="<?php echo $last; ?>"></td>
</tr>
<tr>
	<td>
		<b>Username</b></td>
		<td>
		<input type="text" name="username" value="<?php echo $username; ?>"></td>
	</tr>
<tr>
	<td>
		<b>Password</b></td>
		<td>
		<input type="text" name="password" value="<?php echo $password; ?>"></td>
	</tr>

<tr>
	<td>
		<b>Email</b></td>
		<td>
		<input type="text" name="email" value="<?php echo $email; ?>"></td>
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
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			$first=$_POST['first'];
			$last=$_POST['last'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
			$contact=$_POST['contact'];

			$sql1= "UPDATE user SET first='$first', last='$last', username='$username', password='$password', email='$email', contact='$contact' WHERE username='".$_SESSION['login_user']."';";

			if(mysqli_query($db,$sql1))
			{
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
		}
 	?>

 </section>
</body>
</html>

