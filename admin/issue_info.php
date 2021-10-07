
<!DOCTYPE html>
<html>
<head>
	<title>Issue Information</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">

    .srch
    {
      padding-left: 850px;

    }
    .form-control
    {
      width: 300px;
      height: 40px;
      background-color: black;
      color: white;
    }
    
    body {
      
     
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

.scroll
{
  width: 100%;
  height: 500px;
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
  <div class="h"><a href="expired.php">Expired List</a></div>
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
  <h2 style="color: white;">INFORMATION OF BORROWED BOOKS</h2></center><br>
    <?php
    $c=0;


      if(isset($_SESSION['login_user']))
      {
        $sql="SELECT user.username,id,books.bid,book_title,author_name,publisher,issue,issue_book.return FROM user inner join issue_book ON user.username=issue_book.username inner join books ON issue_book.bid=books.bid WHERE issue_book.approve ='Yes' ORDER BY `issue_book`.`return` ASC";
        $res=mysqli_query($db,$sql);
                $d=date("Y-m-d");
echo "<div style='color: white;'>";
        echo $d."</br>";
        echo "</div>";
        echo "<table background='images/design11-01_generated.jpg' style='box-shadow: 8px 8px 15px;color:black;' class='table table-bordered ' >";
      echo "<tr style='color:yellow;'>";
        //Table header
        
      echo "<th style='text-align:center; '>"; echo "USERNAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "USER_ID";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "BOOK_ID";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "BOOK NAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "AUTHOR NAME";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "PUBLISHER";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "ISSUE DATE";  echo "</th>";
        echo "<th style='text-align:center; '>"; echo "RETURN DATE";  echo "</th>";
      echo "</tr>"; 
 

      while($row=mysqli_fetch_assoc($res))
      {
        $d=date("Y-m-d");
        if($d > $row['return'])
        {
          $c=$c+1;
          $var='<p style="color:yellow; background-color:red;">EXPIRED</p>';

          mysqli_query($db,"UPDATE issue_book SET approve='$var' where `return`='$row[return]' and approve='Yes' limit $c;");
        
        }


        echo "<tr>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['username']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['id']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['bid']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['book_title']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['author_name']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['publisher']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['issue']; echo "</td>";
          echo "<td style='text-align:center; color: white;'>"; echo $row['return']; echo "</td>";
        echo "</tr>";
      }
    echo "</table>";
       
      }
      else
      {
        ?>
            <center>  <div class="alert alert-danger" style="width: 800px;height: 70px;font-size: 30px;opacity: 0.9; text-align: center; background-color: black; color: white">
            <strong>Login to see information of Borrowed Books</strong> </center>
        <?php
      }
    ?>
  </div>
</div>
</body>
</html>