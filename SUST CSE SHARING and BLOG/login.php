<?php



include ('database_connection.php');
if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['reg'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your Registration No ';
    } else {
		 $Reg = $_POST['reg'];


    }


    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM members WHERE (Reg='$Reg' AND password='$Password') AND Activation IS NULL";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
            header("Location: user.php");
          

        }else
        { 
            
            $msg_error= 'Either Your Account is inactive or Email address /Password is Incorrect';
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
							<a href="about.php">About</a>
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
					<h2</h2>
				</div>
				<img src="images/banner.jpg" alt="" />
			</div>
			<div id="main">
				
				</div>
				<div id="content">
					<div class="box">
						<h2>
							Welcome to SUST Sharing
						</h2>
						<!--<img src="images/pic01.jpg" width="150" height="150" alt="" class="left" />-->
						<p>
						</p>
					</div>
					<div class="box">
						<h3>
							Please Enter Your name And Password 
						</h3>
						<p>
                        <form action="login.php" method="post" class="registration_form">
  							<fieldset>
    						<legend>Login Form  </legend>
						
      					<label for="name">Registration No :</label>
      					<input type="text" id="reg" name="reg" size="25" /></br></br>
    					
    					<label for="Password">Password:</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      					<input type="password" id="Password" name="Password" size="25" /></br></br>
    					
                        <input type="hidden" name="formsubmitted" value="TRUE" />
      					<input type="submit" value="Login" />
    					</fieldset>
						</form>

						</p>
						<ul class="linkedList">
							<li class="first">
							<br/>
                        			Not Yet registered?<br/>
                        			
							</li>
							<li>
								<a href="reg.php">Registration</a>
							</li>

						</ul>
					</div><br class="clear" />
				</div><br class="clear" />
			</div>
           
		</div>
		<div id="copyright">
			&copy; 2013 www.sustsharing.com. Design by <a href="contact.php">Rabib Ahmad</a>.
		</div>
	</body>
</html>