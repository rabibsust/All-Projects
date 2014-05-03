<?php



include ('database_connection.php');
if (isset($_POST['formsubmitted'])) {
    // Initialize a session:
session_start();
    $error = array();//this aaray will store all error messages
  

    if (empty($_POST['id'])) {//if the email supplied is empty 
        $error[] = 'You forgot to enter  your ID ';
    } else {

             $Id = $_POST['id'];
            }


    if (empty($_POST['Password'])) {
        $error[] = 'Please Enter Your Password ';
    } else {
        $Password = $_POST['Password'];
    }


       if (empty($error))//if the array is empty , it means no error found
    { 

       

        $query_check_credentials = "SELECT * FROM admin WHERE (Id='$Id' AND password='$Password')
		";
   
        

        $result_check_credentials = mysqli_query($dbc, $query_check_credentials);
        if(!$result_check_credentials){//If the QUery Failed 
            echo 'Query Failed ';
        }

        if (@mysqli_num_rows($result_check_credentials) == 1)//if Query is successfull 
        { // A match was made.

           


            $_SESSION = mysqli_fetch_array($result_check_credentials, MYSQLI_ASSOC);//Assign the result of this query to SESSION Global Variable
           
            header("Location: admin.php");
          

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
				
			</ul>
		</div>
		<div class="margin-news">
			<h2>Notice </h2>
			<p>Books can be borrowed from 10 AM to 2 PM in working days</p>
			
		</div>
	</div>

	<div id="colTwo">
		<h2>Admin Log in</h2>
		<p>
        <form action="admin_login.php" method="post" class="registration_form">
  <fieldset>
    <legend>Admin Login  </legend>

    <p>Enter Your username and Password Below  </p>
    
    <div class="elements">
      <label for="name">Username :</label>
      <input type="text" id="id" name="id" size="25" /></br></br>
    </div>
  
    <div class="elements">
      <label for="Password">Password :&nbsp;</label>
      <input type="password" id="Password" name="Password" size="25" /></br></br>
    </div>
    <div class="submit">
     <input type="hidden" name="formsubmitted" value="TRUE" />
      <input type="submit" value="Login" />
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