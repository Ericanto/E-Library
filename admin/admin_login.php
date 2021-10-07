

<!DOCTYPE html>
<html>
<head>

  <title>Admin Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
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
  
  height: 450px;
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
<body>
<section>
  <div class="box">
   <br>
    <div style="color:white;">
        <h1 style="text-align: center;font-weight: bolder ;font-size: 35px;font-family: Lucida Console;">E-LIBRARY</h1>
        <h1 style="text-align: center; font-size: 25px;">Admin Login Form</h1><br>
      <form  name="login" action="" method="post">
        <center>
        <div class="login">
          <input class="form-control" type="text" name="username" placeholder="Username" required=""><br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color: white;"> 
        </div>
      
      <p style="color: white;text-align: center;">
        <br>
        <a style="color:white; text-decoration: none;font-size: 18px;" href="update_password.php">Forgot password?</a> <br><br>
      </p></center>
    </form>
    </div>
  </div>


  <?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `admin` WHERE username='$_POST[username]' && password='$_POST[password]';");

      $row= mysqli_fetch_assoc($res);

      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              --><center>
          <div class="alert alert-danger" style="width: 450px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>The username and password doesn't match</strong>
          </div>    
        </center>
        <?php
      }
     else
      {
        $_SESSION['login_user'] = $_POST['username'];
        

        ?>
          <script type="text/javascript">
            window.location="adminprofile.php"
          </script>
        <?php
      }
    }

  ?>
</section>
</body>
</html>