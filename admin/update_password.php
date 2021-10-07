
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

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
input[type="text"]:focus,input[type="password"]:focus
{
  width: 280px;
  border-color: #2ecc71;
}
input[type="submit"]:hover
{
  background: #2ecc71;
}
    .box
{
  
  height: 400px;
  width: 450px;
  text-align: center;
  background-color: black;
  margin: 70px auto;
box-shadow: 8px 8px 15px;
  color: black;
   
background-image: url("images/design11-01_generated.jpg");
}
		</style>
		<?php 
	include "connection.php";
	include "navbar.php";
?>
</head>
<body ><section>
	<div class="box">
		<div style="text-align: center;color:white;"><br>
			<h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;">Change Your Password</h1><br><br>
		</div>
		<div>
		<form action="" method="post" >
			<center>
			<br><input type="text" name="username" class="form-control" placeholder="Username" required=""><br>
			<input type="text" name="email" class="form-control" placeholder="Email" required=""><br>
			<input type="password" name="password" class="form-control" placeholder="New Password" required=""><br>
			<input class="btn btn-default" type="submit" name="submit" value="Update" style="color: white;"> <br></center>
		</form>

	</div>
	</section>
	<?php

		if(isset($_POST['submit']))
		{
			$count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && email='$_POST[email]';");

      $row= mysqli_fetch_assoc($res);

      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
<center>
          <div class="alert alert-danger" style="width: 450px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>The username and email doesn't match</strong>
          </div>    
        </center>
        <?php
      }
      else
      {
				mysqli_query($db,"UPDATE admin SET password='$_POST[password]' WHERE username='$_POST[username]'
			AND email='$_POST[email]' ;");
			{
				?>
					<script type="text/javascript">
                alert("The Password Updated Successfully.");
                window.location="admin_login.php";
              </script> 

				<?php
			}
		}
	}
		?>
</div>
</body>
</html>