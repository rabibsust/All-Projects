<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['Reg'])){
         header("Location: login.php");
    }
	include ('database_connection.php');
    
    
?>
</html>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>
				sust blog and sharing
		</title>
		<link href="http://fonts.googleapis.com/css?family=Arvo" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="style.css" />
	</head>
	<body>
		<div id="bg1"></div>
		<div id="bg2"></div>
		<div id="outer">
			<div id="header">
				<div id="logo">
					<h1>
						<a href="index.php">SUST SHARING</a>
					</h1>
				</div>
				<div id="search">
					<form action="" method="post">
						<div>
							<input class="text" name="search" size="32" maxlength="64" />
						</div>
					</form>
				</div>
				<div id="nav">
					<ul>
						<li class="first">
							<a href="index.php">Home</a>
						</li>
						<li>
							<a href="logout.php">Log out</a>
						</li>
						<li>
							<a href="service.php">Services</a>
						</li>
						<li>
							<a href="about.php">About</a>
						</li>
						<li>
							<a href="download.php">Downloads</a>
						</li>
						<li>
							<a href="blog.php">Blog</a>
						</li>
						<li>
							<a href="portfolio.php">Portfolio</a>
						</li>
						<li class="last">
							<a href="contact.php">Contact</a>
						</li>
					</ul><br class="clear" />
				</div>
			</div>
			<div id="banner">
				<div class="captions">
					<h2></h2>
				</div>
				<img src="images/banner.jpg" alt="" />
			</div>
			<div id="main">
				<div id="sidebar">
					<div class="box">
						<h3>
						</h3>
						<div class="dateList">
						
						</div>
					</div>
					<div class="box">
						<h3>
                        <?php echo $_SESSION['Reg'];?>
						</h3>
						<p>
						</p>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<h2>
							Welcome to SUST SHARING
						</h2>
					</div>
					<div class="box">
						<h3>
						</h3>
						<p>
                        <?php
              $con = mysql_connect("localhost","root","1234");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("sust_blog", $con);
             $r=$_SESSION['Reg'];
             $result = mysql_query("SELECT * FROM members where Reg=$r");

            while($row = mysql_fetch_array($result))
             {
                echo "Membership Id:".$row['Memberid']; echo "<br />";
				echo "Registration No :".$row['Reg']; echo "<br />";
				echo "Email :".$row['Email']; echo "<br />";
             }

             mysql_close($con);
         ?></p>
			
		</div>
         <div class="margin-news">
			
			<p>
			    <?php 
		                  
		
		$con = mysql_connect("localhost","root","1234");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("sust_blog", $con);
             $r=$_SESSION['Reg'];
			

			 
			 
		  ?> 
						</p>
					</div><br class="clear" />
				</div><br class="clear" />
			</div>
		</div>
		<div id="copyright">
			&copy; 2013 www.sustsharing.com. Design by <a href="contact.php">Rabib Ahmad</a>.
		</div>
	</body>
</html>