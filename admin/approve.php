
<!DOCTYPE html>
<html>
<head>
	<title>Approve Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

	<style type="text/css">
    .srch
    {
      padding-left: 70%;

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
input[type="text"]:focus,input[type="password"]:focus
{
  width: 280px;
  border-color: #2ecc71;
}
input[type="submit"]:hover
{
  background: #2ecc71;
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

 
  <div class="h"> <a href="books.php">Books</a></div>
  <div class="h"> <a href="request.php">Book Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;color: white;cursor:pointer" onclick="openNav()">&#9776;</span>


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
  <div class="box">
    <center><br>
  <h2 style="color: white;">APPROVE REQUEST</h2></center>
    <CENTER>
    <form class="" action="" method="post"><br>
        <input class="form-control" type="text" name="approve" placeholder="Yes or No" required=""><br>

        <input type="text" name="issue" placeholder="Issue Date yyyy-mm-dd" required="" class="form-control"><br>

        <input type="text" name="return" placeholder="Return Date yyyy-mm-dd" required="" class="form-control"><br>
        <input class="btn btn-default" type="submit" name="submit" value="Approve">
    </form>
  </CENTER>
  </div>
</div>

<?php
  if(isset($_POST['submit']))
  {
    mysqli_query($db,"UPDATE  `issue_book` SET  `approve` =  '$_POST[approve]', `issue` =  '$_POST[issue]', `return` =  '$_POST[return]' WHERE username='$_SESSION[name]' and bid='$_SESSION[bid]';");

    mysqli_query($db,"UPDATE books SET quantity = quantity-1 WHERE bid='$_SESSION[bid]' ;");

    $res=mysqli_query($db,"SELECT quantity from books where bid='$_SESSION[bid];");

   
 ?>
      <script type="text/javascript">
        alert("Updated successfully.");
        window.location="request.php";
      </script>
    <?php
     
    while($row=mysqli_fetch_assoc($res))
    {
      if($row['quantity']==0)
      {
        ?>
        <script type="text/javascript">
        alert("Book sold out.");
        window.location="request.php";
      </script>
      <?php
    }
    }
   
  }
?>
</body>
</html>