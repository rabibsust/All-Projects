<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['Id'])){
         header("Location: admin.php");
    }
	include ('database_connection.php');
    
    
?>
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
							<a href="logout.php">Login</a>
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
							Recent Posts
						</h3>
						<div class="dateList">
							<ul class="linkedList dateList">
								<li class="first">
									
								</li>
								<li>
									<span class="date">Jul 18</span> <a href="#">Turpis dolor risus</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<h2>
							Welcome to SUST BLOG
						</h2>
						
                    
                    </div>
					<div class="box">
					<form action="action-post.php" method="post">

					<center> 
                    <b>Post Title: <input type="<b>text</b>" name="tytle " /> <br />
	        		
                    Details: <textarea name="details"></textarea> </b><br />
	        		
                    <input type="submit" value="Send" />
					</center>
					</form>
	
                    </div><br class="clear" />
				</div><br class="clear" />
			</div>
		</div>
		<div id="copyright">
			&copy; 2013 www.sustsharing.com. Design by <a href="contact.php">Rabib Ahmad</a>.		</div>
	</body>
</html>