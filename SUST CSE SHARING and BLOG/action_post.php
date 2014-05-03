	<?php
	//connect to mysql database
	$con = mysql_connect("localhost","root","1234");
	if (!$con)
  	{
  		die('Could not connect: ' . mysql_error());
  	}
	//insert data into table
	mysql_select_db("", $con);
	$sql="INSERT INTO submit_post (post_name,description)
	VALUES
	('$_POST[post_name]','$_POST[description]')";
	//execute query
	if (!mysql_query($sql,$con))
 	{
  		die('Error: ' . mysql_error());
  	}
	echo "1 record added";
	//close database connection
	mysql_close($con)
	?>