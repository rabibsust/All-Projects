<?php
	ob_start();
    session_start();
    if(!isset($_SESSION['Reg'])){
         header("Location: login.php");
    }
	include ('database_connection.php');
    
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="default.css" rel="stylesheet" type="text/css" />
<title>Member Area </title>
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
<div class="success">Welcome , <?php echo $_SESSION['Reg'];?> &nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></div>

<div id="header">
	<h1>CSE SEMINAR LIBRARY</h1>
	<h2>By <a href="http://www.sust.edu/department/cse/">Dpt of CSE</a></h2>
</div>
<div id="content">
	
	<div id="colOne">
         
         <div class="margin-news">
			<h2>Profile </h2>
			<p><?php
              $con = mysql_connect("localhost","root","");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("library", $con);
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
			<h2>Pending Books  </h2>
			<p>
			    <?php 
		                  
		
		$con = mysql_connect("localhost","root","");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("library", $con);
             $r=$_SESSION['Reg'];
			
             $result = mysql_query("SELECT Title,Return_date FROM borrower where Reg='$r'");
			 $num_results = mysql_num_rows($result);
			 if(!$num_results)
			 {
				 echo "You have no Books pending.";
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
			 
			 
		  ?> 
        </p>
			
      </div>
		
		<div class="margin-news">
			<h2>Notice </h2>
			<p>Books can be borrowed from 10 AM to 2 PM in working days</p>
			
		</div>
	</div>

	<div id="colTwo"> <h2>Search Books</h2>
    <p>
      Search By Name :<form action="user.php" method="post">
                                    <input type="text" id="title" name="title" size="25" value="Enter Title"/> 
                                   <input type="hidden" name="nameformsubmitted" value="TRUE" />
                                   <input type="submit" value="Go" /> 
                 </form>
    
    </p>
    <p>
    Serach By Category :   <form action="user.php" method="post">     
                                  <select name="category">
                                      <option value="Algo">Algorithm and Data Structures</option>
                                      <option value="AI">Artificial Intelligence</option>
                                      <option value="Commu">Communications and security</option>
                                      <option value="Archi">Computer Architecture</option>
                                      <option value="Graphics">Computer Graphics</option>
                                      <option value="Dist">Concurrent,parallel,distributed System</option>
                                      <option value="Database">Databases</option>
                                      <option value="Math">Mathematical foundations</option>
                                      <option value="Language">Programming languages and Compilers</option>
                                      <option value="Scien">Scientific computing</option>
                                      <option value="Software">Software Engineering</option>
                                      <option value="TC">Theory of computation</option>
                                </select>
                                
                                      <input type="hidden" name="formsubmitted" value="TRUE" />
                                      <input type="submit" value="Go" />
                                </form>  
		</p>
        
        <p>
        <?php 
		if (isset($_POST['formsubmitted'])) 
		{
			 echo "Search Results : "; echo "<br/>";
		$con = mysql_connect("localhost","root","");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("library", $con);
             $c=$_POST['category'];
			
             $result = mysql_query("SELECT Title,Available FROM books where Category='$c'");
			 $num_results = mysql_num_rows($result);
			 if(!$num_results)
			 {
				 echo "Sorry!No Book is found for this category.";
				 }
				 
		     else {		 
			
			 echo "<table border='1'>
                           <tr>
                                 <th>Title</th>
                                 <th>Available Copy</th>
                           </tr>";
             
              while($row = mysql_fetch_array($result))
                   {
                          echo "<tr>";
                                  echo "<td>" . $row['Title'] . "</td>";
                                  echo "<td>" . $row['Available'] . "</td>";
                          echo "</tr>";
                   }
              echo "</table>";
			 
			 }
			 
			 
		}
		?> 
        
        <?php 
		if (isset($_POST['nameformsubmitted'])) 
		{
			echo "Search Results : "; echo "<br/>";
		$con = mysql_connect("localhost","root","");
              if (!$con)
              {
                 die('Could not connect: ' . mysql_error());
              }

              mysql_select_db("library", $con);
             $t=$_POST['title'];
			
             $result = mysql_query("SELECT Title,Available FROM books where Title='$t'");
			 $num_results = mysql_num_rows($result);
             if(!$num_results)
			 {
				 echo "Sorry!No Book is found with this title.";
				 }
		     
			 else {		 
			
             echo "<table border='1'>
                           <tr>
                                 <th>Title</th>
                                 <th>Available Copy</th>
                           </tr>";
            
			 
			 
              while($row = mysql_fetch_array($result))
                   {
                          echo "<tr>";
                                  echo "<td>" . $row['Title'] . "</td>";
                                  echo "<td>" . $row['Available'] . "</td>";
                          echo "</tr>";
                   }
              echo "</table>";
			 
			 }
			 
		}
		?> 
        
  </div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
	<p>Copyright &copy; 2012 www.seminarlibrary.com. Developed by <strong>A. K. M. Nazmul Hassan</strong></p>
</div>
</body>
</html>
