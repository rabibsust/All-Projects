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
<title>Admin Panel</title>
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

	<div id="colTwo"> <h2>Return Book</h2>
    <p>
    <form action="return.php" method="post">
                Book Id: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <input type="text" name="title" /> <br/><br/>
                Registration no: <input type="text" name="reg" />
                <input type="hidden" name="returnformsubmitted" value="TRUE" />
                <input type="submit" align="right" value="Return" />
                
      </form>
      
    </p>
    
     <p>
     <?php 
		include ('database_connection.php');                  
		if (isset($_POST['returnformsubmitted']))
		{
			$t=$_POST['title'];
			$r=$_POST['reg'];
			
            $parsed_d=  date("d.m.y", $return_d); 
			print "Delete from borrower where Title=$t and Reg=$r";
			
			
			$query_insert_borrower = "Delete from borrower where Title=$t and Reg=$r";
//			print "Delete from borrower where Title='\$t' and Reg='\$r'";
            $result_insert_borrower = mysqli_query($dbc, $query_insert_borrower);
			
			
			if (!$result_insert_borrower) {
                echo 'Query for deleting from borrower Failed ';
            }
			
			if (mysqli_affected_rows($dbc) == 1) 
			{
				
			$query_update_books = "UPDATE books set Available=Available+1 where Title=$t";
            $result_update_books = mysqli_query($dbc, $query_update_books);
            
			if (!$result_update_books) {
                echo 'Query for update Books Failed ';
            }
			
			if (mysqli_affected_rows($dbc) == 1) 
			{
				echo "Book is successfully Returned.";
				}
			
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
