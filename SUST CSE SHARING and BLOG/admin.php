<?php



include ('database_connection.php');
if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['id'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your ID ';
    } else {

             $Id = $_POST['Id'];
            }


    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM admin WHERE (Id='$Id' AND Password='$Password')
		";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
            header("Location: admin_panel.php");
          

        }else
        { 
            
            $msg_error= 'Either Your Account is inactive or Id /Password is Incorrect';
        }

    }  else {
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
    
    
    if(isset($msg_error)){
        
        echo '<div class="warning">'.$msg_error.' </div>';
    }
    /// var_dump($error);
    mysqli_close($dbc);

} // End of the main Submit conditional.



?>
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
				</div>
				<img src="images/banner.jpg" alt="" />
			</div>
			<div id="main">
				<div id="sidebar">
					<div class="box">
						<h3>
						</h3>
						<div class="dateList">
							<ul class="linkedList dateList">
								<li class="first">

							</ul>
						</div>
					</div>
				</div>
				<div id="content">
					<div class="box">
						<h2>
							Welcome to SUST BLOG
						</h2>
                        <p>
                        <form action="admin.php" method="post" class="registration_form">
  						<fieldset>
    					<legend>Admin Login  </legend>

    					<h3>Enter Your username and Password Below  </h3>
    
   					   <label for="name">Username :</label>
      				   <input type="text" id="id" name="id" size="25" /></br></br>
    
    				   <label for="Password">Password :&nbsp;</label>
      				   <input type="password" id="Password" name="Password" size="25" /></br></br>
   
   					   <input type="hidden" name="formsubmitted" value="TRUE" />
      				   <input type="submit" value="Login" />
    				   
                       </fieldset>
					   </form>
						</p>
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