<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>COMMENT POSTED</title>
</head>

<body>

<?php

	$a = $_POST['name'];
	$b = $_POST['post'];
	$c = $_POST['post_id'];
	
	$con = mysql_connect("localhost","root","1234");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db("sust_blog", $con);
	
	$result = mysql_query("INSERT INTO comment (name,comment,post_id) VALUES ('$a','$b','$c')");
	
	if($result)
		echo "Your comment was Successful posted ";
		
	else
	
		echo "Error";


?>


</body>
</html>
