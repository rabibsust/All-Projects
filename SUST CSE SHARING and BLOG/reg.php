<?php
if (isset($_POST['formsubmitted'])) {
session_start();
if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='') 
 {
    
	 echo '<div class="errormsgbox">';
        {
           echo  '<strong>Incorrect verification code.</strong>';
        }
        echo '</div>';

} 
else {
     include ('database_connection.php');


    $error = array();//Declare An Array to store any error message  
    if (empty($_POST['name'])) {//if no name has been supplied 
        $error[] = 'Please Enter your Registration number ';//add to array "error"
    } else {
        $name = $_POST['name'];//else assign it a variable
    }

    if (empty($_POST['e-mail'])) {
        $error[] = 'Please Enter your Email ';
    } else {


        if (preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['e-mail'])) {
           //regular expression for email validation
            $Email = $_POST['e-mail'];
        } else {
             $error[] = 'Your Email Address is invalid  ';
        }


    }


    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }


    if (empty($error)) //send to Database if there's no error '

    { // If everything's OK...

        // Make sure the email address is available:
        $query_verify_email = "SELECT * FROM members  WHERE Email ='$Email'";
        $result_verify_email = mysqli_query($dbc, $query_verify_email);
        if (!$result_verify_email) {//if the Query Failed ,similar to if($result_verify_email==false)
            echo ' Database Error Occured ';
        }

        if (mysqli_num_rows($result_verify_email) == 0) { // IF no previous user is using this email .


            // Create a unique  activation code:
            $activation = md5(uniqid(rand(), true));


            $query_insert_user = "INSERT INTO `members` ( `Reg`, `Email`, `Password`, `Activation`) VALUES ( '$name', '$Email', '$Password', '$activation')";


            $result_insert_user = mysqli_query($dbc, $query_insert_user);
            if (!$result_insert_user) {
                echo 'Query Failed ';
            }

            if (mysqli_affected_rows($dbc) == 1) { //If the Insert Query was successfull.


                // Send the email:
                $message = " To activate your account, please click on this link:\n\n";
                $message .= WEBSITE_URL . '/activate.php?email=' . urlencode($Email) . "&key=$activation";
                mail($Email, 'Registration Confirmation[Please do not reply]', $message, 'From: tofael.raju@gmail.com');

                // Flush the buffered output.


                // Finish the page:
                echo '<div class="success">Thank you for
registering! A confirmation email
has been sent to '.$Email.' Please click on the Activation Link to Activate your account </div>';


            } else { // If it did not run OK.
                echo '<div class="errormsgbox">You could not be registered due to a system
error. We apologize for any
inconvenience.</div>';
            }

        } else { // The email address is not available.
            echo '<div class="errormsgbox" >That email
address has already been registered.
</div>';
        }

    } else {//If the "error" array contains error msg , display them
        
        

echo '<div class="errormsgbox"> <ol>';
        foreach ($error as $key => $values) {
            
            echo '	<li>'.$values.'</li>';


       
        }
        echo '</ol></div>';

    }
  
    mysqli_close($dbc);//Close the DB Connection

} // End of the main Submit conditional.
     
};
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
        
<script type="text/javascript">
       function Check()
                           {
                              var x=document.forms["myForm"]["name"].value;
                              if (x==null || x=="")
                            {
                                 alert("Please Enter your Registration No");
                                 return false;
                            }
							
							 var y=document.forms["myForm"]["e-mail"].value;
                              if (y==null || y=="")
                            {
                                 alert("Please Enter your Email Id");
                                 return false;
                            }
							
							 var a=document.forms["myForm"]["Password"].value;
                              if (a==null || a=="")
                            {
                                 alert("Please Give a password");
                                 return false;
                            }
							
							var length = a.length;
							var l=parseInt(length)
;							
							if(length<7)
							{
								alert("PLease provide a password with more then 6 Charecters");
								return false;
								
								}
							
								 var b=document.forms["myForm"]["RePassword"].value;
                              if (b==null || b=="")
                            {
                                 alert("Please ReType your password");
                                 return false;
                            }
							
							if(a!=b)
							{
								alert("Please ReType Your password correctly");
								return false;
							}
							
							
							
							
                        }
      </script>
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
							<input class="text" name="search" value="search" size="32" maxlength="64" />
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
					</ul><br class="clear" />
				</div>
			</div>
			<div id="banner">
				<div class="captions">
					<h2></h2>
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
        <form action="reg.php" method="post" class="registration_form" name="myForm" onSubmit="return Check()">
  <fieldset>
    <legend>Registration Form </legend>

    
    
    <div class="elements">
      <label for="name">Reg no :</label> 
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="text" id="name" name="name" size="25" /></br></br>
    </div>
    <div class="elements">
      <label for="e-mail">E-mail :</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input type="text" id="e-mail" name="e-mail" size="25" /></br></br>
    </div>
    <div class="elements">
      <p>
        <label for="Password">Password:</label>  
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="password" id="Password" name="Password" size="25" /></br></br>
        
        
      </p>
      <p><label for="Password">Retype Password:</label>  
        &nbsp;&nbsp;&nbsp;
        <input type="password" id="RePassword" name="RePassword" size="25" /></br></br></p>
    </div>
    <div class="submit">
     Enter Code <img src="captcha.php"> &nbsp; &nbsp;<input type="text" size="8" name="vercode" /> 
     <input type="hidden" name="formsubmitted" value="TRUE" />
      <input type="submit" value="Register" />
      <input type="reset"/>
    </div>
  </fieldset>
</form>
						</p>
						<ul class="linkedList">
							<li class="first">
							<br/>
                        			Not Yet registered?<br/>
                        			
							</li>
							<li>
								<a href="#">Registration</a>
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