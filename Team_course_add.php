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
       NOT IN (
       SELECT DISTINCT member1 FROM iterative_teams WHERE Course_ID = '$courseid'
       UNION
       SELECT DISTINCT member4 FROM iterative_teams WHERE Course_ID = '$courseid'
       )
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
       NOT IN (
       SELECT DISTINCT member2 FROM iterative_teams WHERE Course_ID = '$courseid'
       UNION
       SELECT DISTINCT member4 FROM iterative_teams WHERE Course_ID = '$courseid'
       )
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
       NOT IN (
       SELECT DISTINCT member3 FROM iterative_teams WHERE Course_ID = '$courseid'
       UNION
       SELECT DISTINCT member4 FROM iterative_teams WHERE Course_ID = '$courseid'
       )
ORDER BY rand() LIMIT 1");

$rows = mysqli_num_rows($red);
	if ($rows == 1) {			
        //retrieves the row
        $result = $red->fetch_assoc();
        $redID = $result['id'];        
    }


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


// get 4th member
$random=mysqli_query($dbc, 
"SELECT users.id 
FROM users
INNER JOIN 
course
on users.course = course.course_and_number
and users.section = course.section 
WHERE course.isIterative = 'yes'
AND users.course <> 'admin'
AND course.id = '$courseid'
AND 
users.id
NOT IN (
SELECT DISTINCT member1 FROM iterative_teams WHERE Course_ID = '$courseid' AND member1 IS NOT NULL
UNION 
SELECT DISTINCT member2 FROM iterative_teams WHERE Course_ID = '$courseid' AND member2 IS NOT NULL
UNION
SELECT DISTINCT member3 FROM iterative_teams WHERE Course_ID = '$courseid' AND member3 IS NOT NULL
UNION
SELECT DISTINCT member4 FROM iterative_teams WHERE Course_ID = '$courseid' and member4 IS NOT NULL
)

ORDER BY rand() LIMIT 1 ");

$rows = mysqli_num_rows($random);
	if ($rows == 1) {			
        //retrieves the row
        $result = $random->fetch_assoc();
        $randomID = $result['id'];        
    }

if (isset($randomID))
{
    //insert members to iterative teams
    $sqlUpdate = "UPDATE iterative_teams SET member4 = '$randomID' WHERE Course_ID = '$courseid' AND member1 = '$blueID' And member2 = '$yellowID' AND member3 = '$redID' ";
    $dbc->query($sqlUpdate);			    
}

echo $sqlUpdate;


$url = "Location: Team_course.php?id=" . $courseid ."&course=" . $course . "&section=" . $section . "&isValid=" . $valid ;            
header($url); // Redirecting 
		
mysqli_query($dbc, "COMMIT");
mysqli_close($dbc); //dbc is for connection.php	

?>