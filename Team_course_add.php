<?php
error_reporting(-1);
include('connection.php');
$error=''; // Variable To Store Error Message       

$courseid = $_GET['id'];
$course = $_GET['course'];
$section = $_GET['section']; 
        

// get blue member
$blue=mysqli_query($dbc, 
"SELECT users.id 
FROM 	users
		INNER JOIN 
        course
        	on users.course = course.course_and_number
            	and users.section = course.section
        INNER JOIN 
        teamcode
        	on users.id = teamcode.users_id
             	and teamcode.user_group = 'blue'		
WHERE  course.isIterative = 'yes'
	   AND users.course <> 'admin'
       AND course.id = '$courseid' 
       AND  
       users.id
       NOT IN (SELECT DISTINCT member1 FROM iterative_teams WHERE Course_ID = '$courseid')
ORDER BY rand() LIMIT 1");

$rows = mysqli_num_rows($blue);
	if ($rows == 1) {			
        //retrieves the row
        $result = $blue->fetch_assoc();
        $blueID = $result['id'];        
    }

// get yellow member
$yellow=mysqli_query($dbc, 
"SELECT users.id 
FROM 	users
		INNER JOIN 
        course
        	on users.course = course.course_and_number
            	and users.section = course.section
        INNER JOIN 
        teamcode
        	on users.id = teamcode.users_id
             	and teamcode.user_group = 'yellow'		
WHERE  course.isIterative = 'yes'
	   AND users.course <> 'admin'
       AND course.id = '$courseid' 
       AND  
       users.id
       NOT IN (SELECT DISTINCT member2 FROM iterative_teams WHERE Course_ID = '$courseid')
ORDER BY rand() LIMIT 1");

$rows = mysqli_num_rows($yellow);
	if ($rows == 1) {			
        //retrieves the row
        $result = $yellow->fetch_assoc();
        $yellowID = $result['id'];        
    }

// get red member
$red=mysqli_query($dbc, 
"SELECT users.id 
FROM 	users
		INNER JOIN 
        course
        	on users.course = course.course_and_number
            	and users.section = course.section
        INNER JOIN 
        teamcode
        	on users.id = teamcode.users_id
             	and teamcode.user_group = 'red'		
WHERE  course.isIterative = 'yes'
	   AND users.course <> 'admin'
       AND course.id = '$courseid' 
       AND  
       users.id
       NOT IN (SELECT DISTINCT member3 FROM iterative_teams WHERE Course_ID = '$courseid')
ORDER BY rand() LIMIT 1");

$rows = mysqli_num_rows($red);
	if ($rows == 1) {			
        //retrieves the row
        $result = $red->fetch_assoc();
        $redID = $result['id'];        
    }

// get 4th member



if (isset($blueID) || isset($yellowID) || isset($redID) )
{
    //insert members to iterative teams
    $sqlInsert = 
        "INSERT INTO iterative_teams (Course_ID,member1,member2,member3,member4) VALUES ('$courseid','$blueID','$yellowID','$redID',NULL)";
    $dbc->query($sqlInsert);			
    $valid = 1;
}
else
{
     $valid = 0;
     //$msg = "There are currently no more users under this Course to be added.";
     //echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

$url = "Location: Team_course.php?id=" . $courseid ."&course=" . $course . "&section=" . $section . "&isValid=" . $valid ;            
header($url); // Redirecting 
		
mysqli_query($dbc, "COMMIT");
mysqli_close($dbc); //dbc is for connection.php	

?>