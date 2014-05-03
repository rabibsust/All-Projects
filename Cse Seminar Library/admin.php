<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['Id'])){
         header("Location: admin_login.php");
    }
	include ('database_connection.php');
    
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Admin Panel </title>
<style type="text/css">
 .success {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 60px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
     
}



</style>
</head>

<body>
<div class="success">Welcome , <?php echo $_SESSION['Id'];?> &nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></div>

<div id="header">
	<h1>CSE SEMINAR LIBRARY</h1>
	<h2>By <a href="http://www.sust.edu/department/cse/">Dpt of CSE</a></h2>
</div>
<div id="content">
	
	<div id="colOne">
      <div id="menu1">
			<ul>
				<li id="menu-01"><a href="admin.php">Check Status</a></li>
				<li id="menu-02"><a href="grant.php">Grant</a></li>
				<li id="menu-03"><a href="return.php">Return</a></li>
				
			</ul>
		</div>
         
         
		
		<div class="margin-news">
			<h2>Notice </h2>
			<p>Books can be borrowed from 10 AM to 2 PM in working days</p>
			
		</div>
	</div>

	<div id="colTwo"> <h2>Check Status</h2>
    <p>
      
      <form action="admin.php" method="post">
                Registartion no: <input type="text" name="reg" />
                <input type="hidden" name="formsubmitted" value="TRUE" />
                <input type="submit" value="Go" />
                
      </form>
    </p>
    
        
      <p>
      <?php 
		                  
		if (isset($_POST['formsubmitted']))
		{
		$con = mysql_connect("localhost","root","");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("library", $con);
             $r=$_POST['reg'];
			
             $result = mysql_query("SELECT Title,Return_date FROM borrower where Reg='$r'");
			 $num_results = mysql_num_rows($result);
			 if(!$num_results)
			 {
				 echo "$r has no Book pending.";
				 }
		
             else {			 
			 echo "<table border='1'>
                           <tr>
                                 <th>Title</th>
                                 <th>Returning Date</th>
                           </tr>";
             
              while($row = mysql_fetch_array($result))
                   {
                          echo "<tr>";
                                  echo "<td>" . $row['Title'] . "</td>";
                                  echo "<td>" . $row['Return_date'] . "</td>";
                          echo "</tr>";
                   }
              echo "</table>";
			 
			 }
			 
		}
		  ?> 
      
      
      </p> 
        
        
       
        
    </div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
	<p>Copyright &copy; 2012 www.seminarlibrary.com. Developed by <strong>A. K. M. Nazmul Hassan</strong></p>
</div>
</body>
</html>
