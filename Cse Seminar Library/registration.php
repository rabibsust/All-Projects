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
<?php




?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">



<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cse Seminar Library</title>
<meta name="Keywords" content="library" />
<meta name="Description" content="Books for CSE" />
<link href="default.css" rel="stylesheet" type="text/css" />
<style type="text/css">

/* Box Style */


 .success, .warning, .errormsgbox, .validation {
	border: 1px solid;
	margin: 0 auto;
	padding:10px 5px 10px 50px;
	background-repeat: no-repeat;
	background-position: 10px center;
     font-weight:bold;
     width:450px;
     
}

.success {
   
	color: #4F8A10;
	background-color: #DFF2BF;
	background-image:url('images/success.png');
}
.warning {

	color: #9F6000;
	background-color: #FEEFB3;
	background-image: url('images/warning.png');
}
.errormsgbox {
 
	color: #D8000C;
	background-color: #FFBABA;
	background-image: url('images/error.png');
	
}
.validation {
 
	color: #D63301;
	background-color: #FFCCBA;
	background-image: url('images/error.png');
}



</style>

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
		<h2>Registration</h2>
		<p>
        <form action="registration.php" method="post" class="registration_form" name="myForm" onSubmit="return Check()">
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
	</div>
	<div style="clear: both;">&nbsp;</div>
</div>
<div id="footer">
	<p>Copyright &copy; 2012 www.seminarlibrary.com. Developed by <strong>A. K. M. Nazmul Hassan</strong></p>
</div>
</body>
</html>
