
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cse Seminar Library</title>
<meta name="Keywords" content="library" />
<meta name="Description" content="Books for CSE" />
<link href="default.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header">
	<h1>CSE SEMINAR LIBRARY</h1>
	<h2>By <a href="http://www.sust.edu/department/cse/">Dpt of CSE</a></h2>
</div>
<div id="content">
	
	<div id="colOne">
		<div id="menu1">
			<ul>
				<li id="menu-01"><a href="index.html">Home</a></li>
				<li id="menu-02"><a href="registration.php">Registration</a></li>
				<li id="menu-03"><a href="user.php">Log in</a></li>
				<li id="menu-04"><a href="search.php">Search Books</a></li>
				<li id="menu-05"><a href="contact.html">Contact </a></li>
			</ul>
		</div>
		<div class="margin-news">
			<h2>Notice </h2>
			<p>Books can be borrowed from 10 AM to 2 PM in working days</p>
			
		</div>
	</div>

	<div id="colTwo">
		<h2>Search Books</h2>
        
        <p>Search By Name :<form action="search.php" method="post">
                                    <input type="text" id="title" name="title" size="25" value="Enter Title"/> 
                                   <input type="hidden" name="nameformsubmitted" value="TRUE" />
                                   <input type="submit" value="Go" /> 
                 </form> 
        </p>          
        
		<p>Serach By Category :   <form action="search.php" method="post">     
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
				 
				 
		     else 
			 {
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
         </p>
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
	<p>Copyright &copy; 2012 www.seminarlibrary.com. Developed by <strong>A. K. M. Nazmul Hassan</strong></p>
</div>
</body>
</html>
