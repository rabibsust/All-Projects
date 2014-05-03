<?php/*

 session_start();
*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Post_action</title>
</head>
<body>

 <?php
 
 	$a = $_POST['name'];
	
	$b = $_POST['password'];
	
	$con = mysql_connect("localhost","root","");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}

	mysql_select_db("project300", $con);
	
	$result = mysql_query("SELECT * FROM user
				WHERE name='$a' AND password = '$b' ");


	$row = mysql_fetch_array($result);
	
	
	if($row)
	{
		echo "<center><h1>Login Successfull!</h1> 
		
		 <br />
		 <br /></center>";		
	
		

?>
<?php /*?>
<form action="Database/action-post.php" method="post">

<center>	Post Tytle: <input type="text" name="<b>tytle</b>" /> <br />
	        Details: <textarea name="details"></textarea> <br />
	        <input type="submit" value="Send" />
</center>
</form>
<?php */?>
<?php
	}
	
	else echo "<b>Login failed.<br/>";
	echo "<br />";
 ?>
	
</body>
</html>
