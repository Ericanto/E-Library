
<!DOCTYPE html>
<html>
<head>
	<title>Expired Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
    .srch
    {
      padding-left: 1230px;

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

#submit2:hover
{
  color: yellow;
background-color: green;
}
#submit3:hover
{
  color: yellow;
background-color: red;
}
       .box
{
  

  text-align: center;
  background-color: black;
  margin: 70px auto;
  box-shadow: 8px 8px 15px;
  color: black;
  background-image: url("images/design11-01_generated.jpg");
}
    
    body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
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

  			<div style="color: white; margin-left: 60px; font-size: 30px;">
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
  
</div>

<div id="main">
  
  <span style="font-size:30px;color: white; cursor:pointer" onclick="openNav()">&#9776;</span>


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
 <center>
  <h2 style="color: white;margin-top: 0px;">EXPIRED LIST</h2></center>
    
    <?php
      if(isset($_SESSION['login_user']))
      {
      if(isset($_SESSION['login_user']))
      {
        ?>

      <div style="float: left; padding: 25px;">
      <form method="post" action="">
          <input id="submit2" type="submit" name="submit2" value="RETURNED">&nbsp&nbsp&nbsp
          <input id="submit3" type="submit" name="submit3" value="EXPIRED">
      </form>
      </div>

          <div class="srch" >
          <br>
          <form method="post" action="" name="form1">
            <input type="text" name="username" class="form-control" placeholder="Username"><br>
            <input type="text" name="bid" class="form-control" placeholder="BID"><br>
            <input type="submit" name="submit" value="Submit"><br><br>
          </form>
        </div>
        <?php

        if(isset($_POST['submit']))
        {

          $res=mysqli_query($db,"SELECT * FROM `issue_book` where username='$_POST[username]' and bid='$_POST[bid]' ;");
      
      while($row=mysqli_fetch_assoc($res))
      {
        $d= strtotime($row['return']);
        $c= strtotime(date("Y-m-d"));
        $diff= $c-$d;

        if($diff>=0)
        {
          $day= floor($diff/(60*60*24)); 
          $fine= $day*.10;
        }
      }
          $x= date("Y-m-d"); 
          mysqli_query($db,"INSERT INTO `fine` VALUES ('$_POST[username]', '$_POST[bid]', '$x', '$day', '$fine','not paid') ;");


          $var1='<p style="color:yellow; background-color:green;">RETURNED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve='$var1' where username='$_POST[username]' and bid='$_POST[bid]' ");

          mysqli_query($db,"UPDATE books SET quantity = quantity+1 where bid='$_POST[bid]' ");
          
        }
      }
    
    $c=0;

      
         $ret='<p style="color:yellow; background-color:green;">RETURNED</p>';
         $exp='<p style="color:yellow; background-color:red;">EXPIRED</p>';
        
        if(isset($_POST['submit2']))
        {
          
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$ret' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);

        }
        else if(isset($_POST['submit3']))
        {
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='$exp' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }
        else
        {
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,approve,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve !='' and issue_book.approve !='Yes' ORDER BY `issue_book`.`return` DESC";
        $res=mysqli_query($db,$sql);
        }

        echo "<table style='color:black; box-shadow: 8px 8px 15px; background-image: url(images/design11-01_generated.jpg);' class='table table-bordered '>";
        //Table header
        
        echo "<tr style='color: yellow;'>";
        echo "<th style='text-align:center; '>"; echo "USERNAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "USER_ID";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "BOOK_ID";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "BOOK NAME";  echo "</th>";
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
        echo "</div>";
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