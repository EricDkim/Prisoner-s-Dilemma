<?php
/*PURPOSE:
	This file handles the initial login.
	If the user doesn't exist in the db an error is sent to the user
*/
error_reporting(-1);
//session_start(); // Starting Session //BETTER TO START SESSION AT THE START OF EVERY PAGE
$error=''; // Variable To Store Error Message    


if (isset($_POST['submit'])) {           
	if (empty($_POST['username']) || empty($_POST['password'])) {
		$error = "Username and Password are required fields*";
	}
	else
	{       
		// Define $username and $password
		$username=$_POST['username'];
		$password=$_POST['password'];

		// To protect MySQL injection for Security purpose
		$username = stripslashes($username);
		$password = stripslashes($password);
		$username = mysqli_real_escape_string($dbc, $username);
		$password = mysqli_real_escape_string($dbc, $password);
        
		$result=mysqli_query($dbc, "select id,course from users where pw='$password' AND usernames='$username'"); //THE REPLACEMENT FOR mysql_query
		$rows = mysqli_num_rows($result);
		if ($rows == 1) {
			$_SESSION['login_user']=$username; // Initializing Session
            //retrieves the row
            $courses = $result->fetch_assoc();
            $user_id = $courses['id'];
            $_SESSION['$user_id'] = $user_id;

            // store online session
            $sqlProcess = "DELETE FROM login_history WHERE id = '$user_id'";            
            $dbc->query($sqlProcess);
            $sqlInsert = "INSERT INTO login_history (id,log_in,isAdmin) VALUES ('$user_id', NOW(), 0)";
            $dbc->query($sqlInsert);			
			 
            // Retrieves admin course info
			$admincourse = $courses['course'];
			$_SESSION['admin_course'] = $admincourse;  
            
		} else {                   
			$error = "Username or Password is invalid";
		}
	}
}

	mysqli_query($dbc, "COMMIT");
	//3. ALWAYS CLOSE A DATABASE AFTER USING IT.
	mysqli_close($dbc); //dbc is for connection.php
?>