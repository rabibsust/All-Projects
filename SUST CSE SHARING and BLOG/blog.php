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
							<a href="login.php">Login</a>
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
							Recent Posts
						</h3>
						<div class="dateList">
							<ul class="linkedList dateList">
								<li class="first">
									
								</li>
								<li>
									<span class="date">Jul 18</span> <a href="#">Turpis dolor risus</a>
								</li>
								<li>
									<span class="date">Jul 7</span> <a href="#">Nunc venenatis iaculis</a>
								</li>
								<li>
									<span class="date">Jul 2</span> <a href="#">Lorem ipsum etiam</a>
								</li>
								<li>
									<span class="date">Jun 28</span> <a href="#">Sed phaslleus dolor</a>
								</li>
								<li class="last">
									<span class="date">Jun 24</span> <a href="#">Arcu phasellus</a>
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
<?php
include('database_connection');

$result = mysql_query("SELECT * FROM post");
	
	while ($row = mysql_fetch_array($result)){
	
	echo $row['title'];
	//echo "<br/>";
	
	echo $row['details'];
	echo "<br/>";
	echo " <b/>admin</b> ";
	
	?>
	
<script type="text/javascript">

document.write(Date());

</script>
     
	<?php /*?>
	<?php
	$post_id = $row['id'];
	echo "$_post_id";
			
	echo "<br/>";
	echo "<br/>";
		
	$result1 = mysql_query("SELECT * FROM comment WHERE verify='1' AND post_id='$post_id'");
	
	while ($row1 = mysql_fetch_array($result1)){
	
		echo $row1['name']. "<br />". $row1['comment'];
	
	} 
	
	?>
		<?php */?>
<!--
		<form action="="action-comment.php" method="post">
	
		<input type="hidden" name="post_id" value="</div><?php  echo $row['id']; ?>" />
		Name: <input type="text" name="name" />
		<br />
		Post: <textarea name="post"></textarea>
		<input type="submit" value="Send" />
		
		
	</form> 
		
	
	<?php
	
	}
	
	?>-->	
	</blockquote>

					</div>
					<div class="box">
						<h3>
						</h3>

					</div><br class="clear" />
				</div><br class="clear" />
			</div>
		</div>
		<div id="copyright">
			&copy; 2013 www.sustsharing.com. Design by <a href="contact.php">Rabib Ahmad</a>.
		</div>
	</body>
</html>