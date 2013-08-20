<?php 
	session_start(); //start or resume the sessions

	if(isset($_SESSION['login_user'])){ //if the session was never logged out... 
		if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'logout'){ //...check if there was a logout request...
			logout(); 
		}else{
			header('Location:tubes.html');	///...otherwise return to log page immediately!
		}
	}else{ //no session existed & not known to have ever logged in
		login(); //try logging in       
	
	}
	
	function login(){
		$validUsername = "admin"; //this is the valid username
		$validPassword = "admin"; //this is the valid password
		$loginError = "Invalid username/password combination!"; //login error message

		if(isset($_REQUEST['ch']) && $_REQUEST['ch'] == 'login'){ //check if there was a login request						
			if((strcmp($_REQUEST['user'], $validUsername) == 0) && (strcmp($_REQUEST['pw'], $validPassword) == 0)){ //check if login info was correct
				$_SESSION['login_user'] = 1; //start a new session with id 1
		
				if(isset($_SESSION['login_user'])){ //if the session was set properly...
					header('Location:tubes.html'); 	//...go to index/log page
				}
			}else{ //invalid login info entered
				unset($_POST); //clear the POST array
				$_SESSION['login_error'] = $loginError; //set the error message		
			}
		}
	}
			
	function logout(){
		unset($_SESSION['login_user']); //unset the user session
		header('Location:login.php'); //go back to the login screen
	}
?>

<!doctype html>
<html>

<head>
<meta charset='UTF-8'>
<title>Color Flush</title>
<link href='style_login.css' rel='stylesheet' />

</head>

<body>


<div id='table'>
<table>
    <form action='login.php' method='post'> <!-- Form should be sent using post to not display password! -->
    <tr>
    	<th></th>
    	<td id='caption'> Login </td>
    </tr>
	<tr>
    	<th> User </th>
       <td> <input type='text' name='user'/> </td>
    </tr>
    <tr>
        <th> Password </th>
        <td> <input type='password' name='pw'/> </td> <!--password type prevents password from being displayed while typed -->
    </tr>
    <tr>
    	<td colspan="2" class='error'>
	<?php 

		if(isset($_SESSION['login_error'])){ 	//if an error message was logged...
			echo $_SESSION['login_error'];		//...print the error message...
			unset($_SESSION['login_error']); }	//...then erase the message and keep printing the html
	?>    

		</td>
    </tr>
    <tr>
    	<th></th>
       	<td>  <input type='submit' name='Login' value='Login' onClick=''/>   </td>
    	<td>  <input type="hidden" name="ch" value="login"> </td> 
    </tr>
    </form>
</table>


</div>
    
</body>

</html>