<!doctype html>
<html>
<head>
<?php
	error_reporting(-1);
	include('connection.php');
?>
    <meta charset="utf-8">
    <title>Prisoner's Dilemma</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/stylesheet.css" rel="stylesheet">
	<link href="css/custom.css" rel="stylesheet">
	
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/zsparks.js"></script>
</head>
<body>
	<!-- Navigation Bar begin-->
	<header class="navbar navbar-default">
		<div class="container-fluid">
			<!-- Brand/Logo and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.php">Prisoner's Dilemma</a>
			</div>

			<!-- Collect the nav links and other content for toggling -->
			<div class="collapse navbar-collapse" id="collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="editgame.php">Edit Game</a></li>
					<li ><a href="administration.php">Check Scores</a></li>
					<li class="dropdown">
						<a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">My Account <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="profilepage.php">My Profile</a></li>
							<li role="separator" class="divider"></li>
							<li><a href="logout.php">Logout</a></li>
						</ul>
					</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</header><!--  end Navigation Bar -->
	
	
	<div class="page-header">
	  <h1>Welcome Administrator <small>TO THE EDIT GAME MENU</small></h1>	
		<hr/>
                <!--
				<Button type="button" class="btn btn-lg btn-danger" id="dumpSemesterData" style="position:relative; left:40%;" >
					Dump Semester Data
				</button>		
                -->
        <div style="float:right; margin-right:15%">
                <button type="button" class="btn btn-lg btn-warning" aria-haspopup="true" aria-expanded="false" id="addcour">
					Add Course
				</button>	   
                <button type="button" class="btn btn-lg btn-warning" id="SetRoundLimit"  >
                    Set Round Limit
                </button>
        </div>
        
        <br/><br/>
		<!-- COURSES -->
        <div>
			<?php
				echo "<table align='center' border=1 cellspace='3' cellpadding='3' width='75%'>
				<h3><span style=\"width: 50%; margin: 0% 12.5%\" class=\"label label-success\">Edit Courses</span></h3>
				<tr>
					<th align='left'><b>Edit</b></th>
					<th align='left'><b>Delete</b></th>
                    <th align='left'><b>Set Teams</b></th>
					<th align='left'><b>Course and Course Number</b></th>
					<th align='left'><b>Section</b></th>
                    <th align='left'><b>Iterative Mode</b></th>
				</tr>";

				//$r = mysqli_query($dbc, "SELECT * FROM course  ORDER BY course_and_number, section");
                $r = mysqli_query($dbc, "SELECT id, course_and_number, section, isIterative FROM course ORDER BY course_and_number, section");
				while ($row = mysqli_fetch_array($r))
				{
					echo 
					"<tr>					
                        <td style='text-align:center'>
                            <a href='edit_course.php?id=".$row['id']."&course=".$row['course_and_number']."&section=".$row['section']."'>Edit</a>
                        </td>
                        <td style='text-align:center'>
                            <a href='delete_course.php?id=".$row['id']."&course=".$row['course_and_number']."&section=".$row['section']."'>Delete</a>
                        </td>
                        <td style='text-align:center'>"; 
                    
                            if ($row["isIterative"]=='Yes'){
                        
                            echo "
                            <a href='Team_course.php?id=".$row['id']."&course=".$row['course_and_number']."&section=".$row['section']."'>Set Teams</a>
                            ";
                            }
                            else
                            {
                                echo "&nbsp";
                            }
                            
                            echo "
                        </td>
                        <td>".
                            $row["course_and_number"]
                        ."</td>
                        <td style='text-align:center'>".
                            $row["section"]
                        ."</td>
                        <td style='text-align:center'>".
                            $row["isIterative"]
                        ."</td>
					</tr>";
				}
				echo '</table>';
			?>
					<br/>                  
		<br/><br/>
					
				<!--
	            <br/><br/>
                <Button type="button" class="btn btn-lg btn-warning" id="updateIterative" style="position:relative; left:61%;" >
					Refresh Iterative Teams
				</button>
				<br/>
				<button type="button" class="btn btn-lg btn-success" id="updateRandom" style="position:relative; left:61%; margin: 1% 0%">
					Refresh Random Teams 
				</button><br/>
				<div style="width:50%; margin:-1% auto; position:relative; left:35%;">
				(<span style="color:red;">Unchecked</span> classes will play random)	
				</div>		
                -->
        </div>
        
        
        <!-- USERS -->
        <div>
			<?php
				echo "<table align='center' border=1 cellspace='3' cellpadding='3' width='75%'>
				<h3><span style=\"width: 50%; margin: 0% 12.5%\" class=\"label label-success\">Edit Users</span></h3>
				<tr>
					<th align='left'><b>Edit</b></th>
					<th align='left'><b>Delete</b></th>
					<th align='left'><b>User Tag</b></th>
					<th align='left'><b>Full Name</b></th>
					<th align='left'><b>Course</b></th>
					<th align='left'><b>Section</b></th>
				</tr>";

				$r = mysqli_query($dbc, "SELECT * FROM users u JOIN teamcode tc ON u.id = tc.users_id ORDER BY course, section, last_name, first_name");
				while ($row = mysqli_fetch_array($r))
				{
					echo 
					"<tr>
					<td>
						<a href='edit_user.php?id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&course=".$row['course']."&pwd=".$row['pw']."&section=".$row['section']."&group=".$row['user_group']."'>Edit</a>
					</td>
					<td>
						<a href='delete_user.php?id=".$row['id']."&fname=".$row['first_name']."&lname=".$row['last_name']."&course=".$row['course']."&section=".$row['section']."'>Delete</a>
					</td>
					<td>".
						$row["tag"]
					."</td>
					<td>".
						$row["first_name"]." ".$row["last_name"]
					."</td>
					<td>".
						$row["course"]
					."</td>
					<td>".
						$row["section"]
					."</td>
					</tr>";
				}
				echo '</table>';
			?>
		</div>
		
        
		
        <!--  end Navigation Bar -->        
        
		
    </div>		

    
    
    <br/><br/>
    
	<?php
		mysqli_query($dbc, "COMMIT");
		mysqli_close($dbc); //always close the connection for security
	?>
</body>
</html>