<?php
			$username = "root";
			$password = "1234";
			$host = "localhost";
			$database = "sust_blog";
			$link = mysql_connect($host, $username, $password);
			if (!$link) 
			{
    			die('Could not connect: ' . mysql_error());
				header('location: index.php');
			}
			mysql_select_db ($database);
?>