<!DOCTYPE html>
<html>
<head>

  <title>Student Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 

  <style type="text/css">
    section
    {
      margin-top: -20px;
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
  
  height: 600px;
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
  <div style="text-align: center;color:white;">

    <div class="box" ><br>
        <h1 style="text-align: center; font-size: 35px;color:white;font-weight: bolder ;font-family: Lucida Console;">E-LIBRARY</h1>
        <h1 style="text-align: center; font-size: 25px;color:white;">User Registration Form</h1>

      <form name="Registration" action="" method="post">
        <center>
        <div class="login" style="color:white;">
           <input class="form-control" type="text" name="id" placeholder="ID" required=""><br>
          <input class="form-control" type="text" name="first" placeholder="First Name" required=""> <br>
          <input class="form-control" type="text" name="last" placeholder="Last Name" required=""> <br>
          <input class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
         
          <input class="form-control" type="text" name="email" placeholder="Email" required=""><br>
          <input class="form-control" type="text" name="contact" placeholder="Phone No" required=""><br>

          <input class="btn btn-default" type="submit" name="submit" value="Sign Up" style="color: white;"><br> </div>
        </center>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;

        $sql="SELECT username from `user`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `user` VALUES('$_POST[id]','$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[email]','$_POST[password]', '$_POST[contact]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>