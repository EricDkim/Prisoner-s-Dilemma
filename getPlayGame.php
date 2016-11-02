<?php 
include('session.php');

    $result=mysqli_query($dbc, 
    "SELECT 	users.id,
            course.isIterative
    FROM 	users
            INNER JOIN 
            course
            ON users.course = course.course_and_number
            and users.section = course.section
    WHERE   users.id = '$login_id'
    ");
            
	$rows = mysqli_num_rows($result);
	if ($rows == 1) {			
        $iterative = $result->fetch_assoc();
        $isIterative = $iterative['isIterative'];
    }

    if ($isIterative == 'Yes') 
	{
		echo "<li><a href='playgame_iterative.php'>Play Game</a></li>";
	}
	else 
	{
        echo "<li><a href='playgame_live.php'>Play Game</a></li>";
	}			
	

	mysqli_query($dbc, "COMMIT");
	//3. ALWAYS CLOSE A DATABASE AFTER USING IT.
	mysqli_close($dbc); //dbc is for connection.php
?>