
<!DOCTYPE html>
<html>
<head>
	<title>Book Request</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

		.srch
		{
			padding-left: 70%;

		}
		.form-control
		{
			width: 300px;
			height: 40px;
			background-color: black;
			color: white;
		}
		
	 body {
      
  background-image: url("images/alfons-morales-YLSwjSy7stw-unsplash.jpg");
  font-family: "Lato", sans-serif;
  
}
#submit2:hover
{
  background: #2ecc71;
}
#submit3:hover
{
  background: red;
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
  padding-left: 15px;
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
 .box
{
  
  height: 530px;
  width: 1400px;
  text-align: center;
  background-image: url("images/design11-01_generated.jpg");
  margin: 70px auto;
  box-shadow: 8px 8px 15px;
  color: black;
}
.scroll
{
  width: 100%;
  height: 400px;
  overflow: auto;
}
th,td
{
  width: 10%;
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

  		<div style="color: white;box-shadow: 3px 5px 5px; margin-left: 60px;color: white; font-size: 30px;">

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
  
  <span style="color: white; font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>


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
    
    <?php
      if(isset($_SESSION['login_user']))
      {
        ?>

      <div style="float: left; padding-left:  5px; padding-top: 20px;">
      <form method="post" action="">
          <input id="submit2" name="submit2" type="submit" class="btn btn-default" style=" color: yellow;" value="RETURNED">
                      &nbsp&nbsp
          <input id="submit3" name="submit3" type="submit" class="btn btn-default" style=" color: yellow;border: 2px solid red;" value="EXPIRED">
      </form>
      </div>
      <div style="float: right;padding-top: 10px;">
        
        <?php 
        $var=0;
          $result=mysqli_query($db,"SELECT * FROM `fine` where username='$_SESSION[login_user]' and status='not paid' ;");
          while($r=mysqli_fetch_assoc($result))
          {
            $var=$var+$r['fine'];
          }
          $var2=$var+$_SESSION['fine'];

         ?>
        <h3 style="color: white;">Your fine is: 
          <?php
            echo "Rs. ".$var2;
          ?>
        </h3>
      </div>
<br><br><br><br>
        <?php

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' and issue_book.username ='$_SESSION[login_user]'  ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes'  and issue_book.username ='$_SESSION[login_user]' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table style='color:black; background-image: url(images/design11-01_generated.jpg);' class='table table-bordered '>";
        //Table header
        
        echo "<tr style='color: yellow;'>";
        echo "<th style='text-align:center; '>"; echo "USERNAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "ID";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "BOOK_ID";  echo "</th>";
        echo "<th>"; echo "BOOK NAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "AUTHOR NAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "PUBLISHER";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "STATUS";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "ISSUE DATE";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "RETURN DATE";  echo "</th>";

      echo "</tr>"; 
     while($row=mysqli_fetch_assoc($res))
      {
        echo "<tr style='color: white;'>";
          echo "<td style='text-align:center; '>"; echo $row['username']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['id']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['bid']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['book_title']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['author_name']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['publisher']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['approve']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['issue']; echo "</td>";
          echo "<td style='text-align:center; '>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
  }
    else
{
  ?>
           <br> <center>  <div class="alert alert-danger" style="width: 800px;height: 70px;font-size: 30px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>Login to see information of Expired List</strong> </center>
        <?php
}
    ?>
  </div>
</div>
</body>
</html>