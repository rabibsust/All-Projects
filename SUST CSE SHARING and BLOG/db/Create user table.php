<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Createtable</title>
</head>

<body>
<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

// Create table
mysql_select_db("project300", $con);
$sql = "CREATE TABLE user_info
(
  `Memberid` int(100) NOT NULL AUTO_INCREMENT,
  `Reg` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(20) NOT NULL,
  `Activation` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`Memberid`)
)";
// Execute query
mysql_query($sql,$con);
mysql_close($con);
echo "table created";
?>


</body>
</html>
