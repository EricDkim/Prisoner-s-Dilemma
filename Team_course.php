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
	
	<script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
	<script src="js/zsparks.js"></script>

	<style>
		#formbox 
		{
			width: 50%;
			margin: 2% 5%;
		}
		
		#title
		{
			width: 50%;
			margin: 2% 2%;
		}
	</style>
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

    
      <div>			
			<?php
                $id = $_GET['id'];
                $course = $_GET['course'];
                $section = $_GET['section'];
                $isValid = '-1';
                if ( isset($_GET['isValid']))
                {
                    $isValid = $_GET['isValid'];
                }
                
                if ($isValid == 1)
                {
                    $msg = "New Team added sucessfully";
                    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                }
                if ($isValid == 0)
                {
                    $msg = "There are currently no more users under this Course to be added";
                    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
                }
          
				echo "<table align='center' border=1 cellspace='3' cellpadding='3' width='75%'>
				<h3><span style=\"width: 50%; margin: 0% 12.5%\" class=\"label label-success\">". $course. " - ". $section. "</span></h3>
				<tr>
					<th align='left'><b>Team ID</b></th>
					<th align='left'><b>Blue Member</b></th>				
					<th align='left'><b>Yellow Member</b></th>					
					<th align='left'><b>Red Member</b></th>
					<th align='left'><b>Group Member</b></th>										
				</tr>";

				$r = mysqli_query($dbc, 
                                  "SELECT id,
                                  (SELECT tag FROM teamcode WHERE users_id = iterative_teams.member1) as member1,
                                  (SELECT tag FROM teamcode WHERE users_id = iterative_teams.member2) as member2,
                                  (SELECT tag FROM teamcode WHERE users_id = iterative_teams.member3) as member3,
                                  (SELECT tag FROM teamcode WHERE users_id = iterative_teams.member4) as member4 
                                  FROM iterative_teams 
                                  WHERE Course_ID=".$id." 
                                  ORDER by id asc");
				while ($row = mysqli_fetch_array($r))
				{
					echo 
					"<tr>
					<td>".
						$row["id"]
					."</td>
					<td>".
						$row["member1"]
					."</td>
					<td>".
						$row["member2"]
					."</td>
					<td>".
						$row["member3"]
					."</td>
					<td>".
						$row["member4"]
					."</td>
					</tr>";
				}
				echo '</table>';
			?>
	</div>
    
    <div>
        <?php
        
        echo "
            <a href='Team_course_add.php?id=" . $id. "&course=" .$course. "&section=" .$section. "' style='float: right; margin: 20px 150px 0 0'>Add New Team</a>
            ";
        ?>
    </div>
    
    
    <!--
	<h1 id='title'>Make your changes below</h1>
	<?php
		//$id = $_GET['id'];
		
		//echo "<form id='formbox' action='submit_edit_course.php' method='post'>
		//	 <p>ID: <input type='text' name= 'id' size='20' maxlength='3' readonly value='".$_GET['id']."'/></p>
		//	 <p>Course: <input type='text' name= 'course' size='10' maxlength='50' value='".$_GET['course']."'/></p>	
		//	 <p>Section: <input type='text' name= 'section' size='2' maxlength='50' value='".$_GET['section']."'/></p>
		//	
		//	 <p><input type='submit' name='Apply Changes' value='Submit' /></p>	   
		//	 </form>";
	?>	
    -->
</body>
</html>
