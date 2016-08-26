<?php
    include('connection.php');
    include('session.php');

    $avg = (($gplayed!=0) AND ($score!=0)) ? $score/$gplayed : 0;
    $avg = round($avg,2);
    function switch_de($num){
        switch ($num){
            case 0:
                $ad = "Nothing";
                break;
            case 1:
                $ad = "Cooperate";
                break;
            case 2:
                $ad = "Defect";
                break;
        }
        return $ad;
    }
    function switch_class($num){
        switch ($num){
            case 0:
                $ad = "warning";
                break;
            case 1:
                $ad = "success";
                break;
            case 2:
                $ad = "danger";
                break;
        }
        return $ad;
    }
    function sum_score($num){
        $cs = 0;
        $os = 0;
        $nums = explode(';', $num);
        foreach ($nums as $n){
            switch ($n){
                case 11:
                    $cs += 3;
                    $os += 3;
                    break;
                case 22:
                    $cs += 1;
                    $os += 1;
                    break;
                case 12:
                    $cs += 0;
                    $os += 5;
                    break;
                case 21:
                    $cs += 5;
                    $os += 0;
                    break;
                case 01:
                case 02:
                    $cs -= 10;
                    $os += 10;
                    break;
                case 10:
                case 20:
                    $cs += 10;
                    $os -= 10;
                    break;
            }
        }
        return $cs.";".$os.";".$num;
    }
    function show_game($id){
    	include('connection.php');
    	include('session.php');        
    	$sql = "SELECT *, (select round_limit from games_rounds) as round_limit FROM games_iterative WHERE id='$id'";                   	
        $query = $dbc->query($sql);
    	$fetch = $query->fetch_assoc();
    	$id = $fetch['id'];
    	$p1 = $fetch['player1'];
    	$p2 = $fetch['player2'];
        $r_limit = $fetch['round_limit'];
        $status = $fetch['status'];
        $actual = $status+1;
        $actual = ($actual > $r_limit) ? $r_limit : $actual;
        $ra = $fetch['round'.$actual];
    	$ti = $fetch['time'];
    	$cp = ($p1 == $login_id) ? $p1 : $p2;
    	$op = ($p1 != $login_id) ? $p1 : $p2;
		if($actual > 1){
            $check = $actual-1;
            $sql = "SELECT round$check FROM games_iterative WHERE id='$id'";
            $query = $dbc->query($sql);
            $fetch = $query->fetch_assoc();
            if($fetch['round'.$check]=="0-0"){
                $sql = "UPDATE games_iterative SET status=status-1 WHERE id='$id'";
                $dbc->query($sql);
            }
        }
        $cpd = ($p1 == $login_id) ? substr($ra,0,1) : substr($ra,2,1);
        $opd = ($p1 != $login_id) ? substr($ra,0,1) : substr($ra,2,1);
        if(($ra == "0-0") AND ($cpd) AND ($opd)){
            $sql = "UPDATE games_iterative SET status=status-1 WHERE id='$id'";
            $dbc->query($sql);
        }
        switch ($cpd){
            case 0:
                $ad = "Nothing";
                break;
            case 1:
                $ad = "Cooperate";
                break;
            case 2:
                $ad = "Defect";
                break;
        }
		//get user color and tag
    	$query = "SELECT * FROM teamcode WHERE users_id='$cp'";
    	$result = $dbc->query($query);
    	$user = $result->fetch_assoc();
    	$tag = $user['tag'];
		$user_piece = explode("-", $tag);
        $user_group = $user['user_group'];
		//get user color and tag
    	$query = "SELECT * FROM teamcode WHERE users_id='$op'";
    	$result = $dbc->query($query);
    	$opponent = $result->fetch_assoc();
    	$tag = $opponent['tag'];
		$opponent_piece = explode("-", $tag);
        $opponent_group = $opponent['user_group'];

        ////  ***** WHAT HAPPENS WHEN TIME RUNS OUT??   //////
    	$t2 = time();
    	$tr = $ti-$t2;
    	if($tr <= 0){            
    	    $sql = "UPDATE games_iterative SET status='$r_limit WHERE id='$id'";
    	    $dbc->query($sql);
            if($cpd == 0){              
                $sql = "UPDATE users SET score=score-10 WHERE id='$cp'";
                $query = $dbc->query($sql);
                $sql = "UPDATE users SET score=score+10 WHERE id='$op'";
                $query = $dbc->query($sql);
                //$sql = "UPDATE users SET busy=1 WHERE id='$cp'";
                $query = "UPDATE login_history SET busy = 1 WHERE id = '$cp'";
                $dbc->query($sql);
            } 
            if($opd == 0){
                $sql = "UPDATE users SET score=score-10 WHERE id='$op'";
                $query = $dbc->query($sql);
                $sql = "UPDATE users SET score=score+10 WHERE id='$cp'";
                $query = $dbc->query($sql);
                //$sql = "UPDATE users SET busy=1 WHERE id='$op'";
                $query = "UPDATE login_history SET busy = 1 WHERE id = '$op'";
                $dbc->query($sql);
            }
            echo "<script>
                $('document').ready(function(){
                    ion.sound.play('door_bump');
                });
            </script>";
    	}
        elseif( ($opd!=0) AND ($cpd!=0) ){
            $sql = "SELECT status, (select round_limit from games_rounds) as round_limit FROM games_iterative WHERE id='$id'";
            $query = $dbc->query($sql);
            $fetch = $query->fetch_assoc();
            $st = $fetch['status']+1;
            $r_limit = $fetch['round_limit'];
            if($st != $r_limit){
                $rr = $cpd.$opd;
                switch ($rr){
                    case 11:
                        $sql1= "UPDATE users SET score=score+3 WHERE id='$cp'";
                        $sql2= "UPDATE users SET score=score+3 WHERE id='$op'";                        
                        $sql3= "UPDATE games_iterative SET round$st" . "score_p1=3, round$st"."score_p2=3 WHERE id='$id' ";          
                        
                        $sound = "glass";
                        break;
                    case 22:
                        $sql1= "UPDATE users SET score=score+1 WHERE id='$cp'";
                        $sql2= "UPDATE users SET score=score+1 WHERE id='$op'";
                        $sql3= "UPDATE games_iterative SET round$st" . "score_p1=1, round$st"."score_p2=1 WHERE id='$id' ";                                                                    
                        $sound = "light_bulb_breaking";
                        break;
                    case 12:
                        $sql1= "UPDATE users SET score=score+0 WHERE id='$cp'";
                        $sql2= "UPDATE users SET score=score+5 WHERE id='$op'";
                        $sql3= "UPDATE games_iterative SET round$st" . "score_p1=0, round$st"."score_p2=5 WHERE id='$id' ";                                                                      
                        $sound = "light_bulb_breaking";
                        break;
                    case 21:
                        $sql1= "UPDATE users SET score=score+5 WHERE id='$cp'";
                        $sql2= "UPDATE users SET score=score+0 WHERE id='$op'";
                        $sql3= "UPDATE games_iterative SET round$st" . "score_p1=5, round$st"."score_p2=0 WHERE id='$id' ";           

                        $sound = "bell_ring";
                        break;
                }
                echo "<script>
                    $('document').ready(function(){
                        ion.sound.play('$sound');
                    });
                </script>";
                $dbc->query($sql1);
                $dbc->query($sql2);
                $dbc->query($sql3);
            }
            $sql = "UPDATE games_iterative SET status=status+1 WHERE id='$id'";
            $dbc->query($sql);
        } 
		else 
		{						
			// Assigned Group to current players
            switch(strtolower($user_group))
            {
                case 'red':
                    $cpp = "<span style='color:white;background-color:red;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."R-".$cp."</span>";
                    break;
                case 'yellow':
                    $cpp = "<span style='color:white;background-color:yellow;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."Y-".$cp."</span>";
                    break;
                case 'blue':
                    $cpp = "<span style='color:white;background-color:blue;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."B-".$cp."</span>";
                    break;
            }
            // Assigned Group to Opponent
            switch(strtolower($opponent_group))
            {
                case 'red':
                    $opp = "<span style='color:white;background-color:red;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."R-".$op."</span>";
                    break;
                case 'yellow':
                    $opp = "<span style='color:white;background-color:yellow;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."Y-".$op."</span>";
                    break;
                case 'blue':
                    $opp = "<span style='color:white;background-color:blue;border-radius: 5px;padding:0% 1%;'>"."PLAYER "."B-".$op."</span>";
                    break;
            }
				
				//Display Who's Versus Who when Both players are available to play
				echo "<h3 class='text-center'>".$cpp."<br>"."<div style='margin:5px'>"." VS "."</div>".$opp."<small>"."	<br>"."(Round ".$actual." )"."</small>"."</h3>";
		
		   
				if($cpd == 0){
					echo "<div class='buttons col-xs-12 col-md-8 col-md-offset-2'>
							<div class='btn-group btn-group-justified' role='group' aria-label='decision'>
								<a id='cooperate' class='btn_co btn btn-success'>Cooperate</a>
								<a id='defect' class='btn_de btn btn-warning'>Defect</a>
								<input type='hidden' id='game_id' value='$id'>
							</div>
					</div>";
				}
				echo "<div class='decision col-xs-12 col-md-8 col-md-offset-2'>
						<h4 class='text-center'>Your decision: $ad</h4>
				</div>";
				echo "<div class='timer col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-4'>
					<span class='glyphicon glyphicon-time'></span> $tr
				</div>";
				echo "<script>
					$('document').ready(function(){
						ion.sound.play('door_bell');";
						?>
						setTimeout('ion.sound.destroy("door_bell")',3000);
						<?php
				echo "
					});
				</script>";
        }
        $sql = "SELECT *, (select round_limit from games_rounds) as round_limit FROM games_iterative WHERE id='$id'";
        $query = $dbc->query($sql);
        $fetch = $query->fetch_assoc();
        $r_limit = $fetch['round_limit'];
        
        /* ROUND 1 */        
        $ra1 = $fetch['round1'];
        $cpd1 = ($p1 == $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
        $opd1 = ($p1 != $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
        /* ROUND 2 */
        $ra2 = $fetch['round2'];
        $cpd2 = ($p1 == $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
        $opd2 = ($p1 != $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
        /* ROUND 3 */
        $ra3 = $fetch['round3'];
        $cpd3 = ($p1 == $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
        $opd3 = ($p1 != $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
        /* ROUND 4 */
        $ra4 = $fetch['round4'];
        $cpd4 = ($p1 == $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
        $opd4 = ($p1 != $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
        /* ROUND 5 */
        $ra5 = $fetch['round5'];
        $cpd5 = ($p1 == $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
        $opd5 = ($p1 != $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
        
        /////////////////////////////
        /* ROUND 6 */
        $ra6 = $fetch['round6'];
        $cpd6 = ($p1 == $login_id) ? substr($ra6,0,1) : substr($ra6,2,1);
        $opd6 = ($p1 != $login_id) ? substr($ra6,0,1) : substr($ra6,2,1);
        
        /* ROUND 7 */
        $ra7 = $fetch['round7'];
        $cpd7 = ($p1 == $login_id) ? substr($ra7,0,1) : substr($ra7,2,1);
        $opd7 = ($p1 != $login_id) ? substr($ra7,0,1) : substr($ra7,2,1);
        
        /* ROUND 8 */
        $ra8 = $fetch['round8'];
        $cpd8 = ($p1 == $login_id) ? substr($ra8,0,1) : substr($ra8,2,1);
        $opd8 = ($p1 != $login_id) ? substr($ra8,0,1) : substr($ra8,2,1);
        
        /* ROUND 9 */
        $ra9 = $fetch['round9'];
        $cpd9 = ($p1 == $login_id) ? substr($ra9,0,1) : substr($ra9,2,1);
        $opd9 = ($p1 != $login_id) ? substr($ra9,0,1) : substr($ra9,2,1);
        
        /* ROUND 10 */
        $ra10 = $fetch['round10'];
        $cpd10 = ($p1 == $login_id) ? substr($ra10,0,1) : substr($ra10,2,1);
        $opd10 = ($p1 != $login_id) ? substr($ra10,0,1) : substr($ra10,2,1);
        ///////////
        
        echo "<table class='table table-striped'>
            <tr>
                <th>Round</th>
                <th>Your decision</th>
                <th>Partner decision</th>
            </tr>";
            if($status > 0){
                echo "<tr>
                    <td>One</td>
                    <td class='".switch_class($cpd1)."'>".switch_de($cpd1)."</td>
                    <td class='".switch_class($opd1)."'>".switch_de($opd1)."</td>
                </tr>";
            }
            if($status > 1){
                echo "<tr>
                    <td>Two</td>
                    <td class='".switch_class($cpd2)."'>".switch_de($cpd2)."</td>
                    <td class='".switch_class($opd2)."'>".switch_de($opd2)."</td>
                </tr>";
            }
            if($status > 2){
                echo "<tr>
                    <td>Three</td>
                    <td class='".switch_class($cpd3)."'>".switch_de($cpd3)."</td>
                    <td class='".switch_class($opd3)."'>".switch_de($opd3)."</td>
                </tr>";
            }
            if($status > 3){
                echo "<tr>
                    <td>Four</td>
                    <td class='".switch_class($cpd4)."'>".switch_de($cpd4)."</td>
                    <td class='".switch_class($opd4)."'>".switch_de($opd4)."</td>
                </tr>";
            }
            if($status > 4){
                echo "<tr>
                    <td>Five</td>
                    <td class='".switch_class($cpd5)."'>".switch_de($cpd5)."</td>
                    <td class='".switch_class($opd5)."'>".switch_de($opd5)."</td>
                </tr>";
            }
        
            /////////////
            if($status > 5){
                echo "<tr>
                    <td>One</td>
                    <td class='".switch_class($cpd6)."'>".switch_de($cpd6)."</td>
                    <td class='".switch_class($opd6)."'>".switch_de($opd6)."</td>
                </tr>";
            }
            if($status > 6){
                echo "<tr>
                    <td>Two</td>
                    <td class='".switch_class($cpd7)."'>".switch_de($cpd7)."</td>
                    <td class='".switch_class($opd7)."'>".switch_de($opd7)."</td>
                </tr>";
            }
            if($status > 7){
                echo "<tr>
                    <td>Three</td>
                    <td class='".switch_class($cpd8)."'>".switch_de($cpd8)."</td>
                    <td class='".switch_class($opd8)."'>".switch_de($opd8)."</td>
                </tr>";
            }
            if($status > 8){
                echo "<tr>
                    <td>Four</td>
                    <td class='".switch_class($cpd9)."'>".switch_de($cpd9)."</td>
                    <td class='".switch_class($opd9)."'>".switch_de($opd9)."</td>
                </tr>";
            }
            if($status > 9){
                echo "<tr>
                    <td>Five</td>
                    <td class='".switch_class($cpd10)."'>".switch_de($cpd10)."</td>
                    <td class='".switch_class($opd10)."'>".switch_de($opd10)."</td>
                </tr>";
            }
            ///////
        
        echo "</table>";
        if($status == $r_limit){
            $sql = "UPDATE games_iterative SET status=status+1 WHERE id='$id'";
            $dbc->query($sql);
        }
        $sql = "SELECT *, (select round_limit from games_rounds) as round_limit FROM games_iterative WHERE id='$id'";
        $query = $dbc->query($sql);
        $fetch = $query->fetch_assoc();
        $r_limit = $fetch['round_limit'];        
        $p1 = $fetch['player1'];
        $op = ($p1 != $login_id) ? $p1 : $fetch['player2'];
        
        
        /* ROUND 1 */
        $ra1 = $fetch['round1'];
        $cpd1 = ($p1 == $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
        $opd1 = ($p1 != $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
        /* ROUND 2 */
        $ra2 = $fetch['round2'];
        $cpd2 = ($p1 == $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
        $opd2 = ($p1 != $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
        /* ROUND 3 */
        $ra3 = $fetch['round3'];
        $cpd3 = ($p1 == $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
        $opd3 = ($p1 != $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
        /* ROUND 4 */
        $ra4 = $fetch['round4'];
        $cpd4 = ($p1 == $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
        $opd4 = ($p1 != $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
        /* ROUND 5 */
        $ra5 = $fetch['round5'];
        $cpd5 = ($p1 == $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
        $opd5 = ($p1 != $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
        
        /////////////////////
        /* ROUND 6 */
        $ra6 = $fetch['round6'];
        $cpd6 = ($p1 == $login_id) ? substr($ra6,0,1) : substr($ra6,2,1);
        $opd6 = ($p1 != $login_id) ? substr($ra6,0,1) : substr($ra6,2,1);
        /* ROUND 7 */
        $ra7 = $fetch['round7'];
        $cpd7 = ($p1 == $login_id) ? substr($ra7,0,1) : substr($ra7,2,1);
        $opd7 = ($p1 != $login_id) ? substr($ra7,0,1) : substr($ra7,2,1);
        /* ROUND 8 */
        $ra8 = $fetch['round8'];
        $cpd8 = ($p1 == $login_id) ? substr($ra8,0,1) : substr($ra8,2,1);
        $opd8 = ($p1 != $login_id) ? substr($ra8,0,1) : substr($ra8,2,1);
        /* ROUND 9 */
        $ra9 = $fetch['round9'];
        $cpd9 = ($p1 == $login_id) ? substr($ra9,0,1) : substr($ra9,2,1);
        $opd9 = ($p1 != $login_id) ? substr($ra9,0,1) : substr($ra9,2,1);
        /* ROUND 10 */
        $ra10 = $fetch['round10'];
        $cpd10 = ($p1 == $login_id) ? substr($ra10,0,1) : substr($ra10,2,1);
        $opd10 = ($p1 != $login_id) ? substr($ra10,0,1) : substr($ra10,2,1);
        ///////////////

        $cpd1 = ($opd1 == 0) ? 0 : $cpd1;
        $cpd2 = ($opd2 == 0) ? 0 : $cpd2;
        $cpd3 = ($opd3 == 0) ? 0 : $cpd3;
        $cpd4 = ($opd4 == 0) ? 0 : $cpd4;
        $cpd5 = ($opd5 == 0) ? 0 : $cpd5;

        $opd1 = ($cpd1 == 0) ? 0 : $opd1;
        $opd2 = ($cpd2 == 0) ? 0 : $opd2;
        $opd3 = ($cpd3 == 0) ? 0 : $opd3;
        $opd4 = ($cpd4 == 0) ? 0 : $opd4;
        $opd5 = ($cpd5 == 0) ? 0 : $opd5;

        ////////////////
        $cpd6 = ($opd6 == 0) ? 0 : $cpd6;
        $cpd7 = ($opd7 == 0) ? 0 : $cpd7;
        $cpd8 = ($opd8 == 0) ? 0 : $cpd8;
        $cpd9 = ($opd9 == 0) ? 0 : $cpd9;
        $cpd10 = ($opd10 == 0) ? 0 : $cpd10;

        $opd6 = ($cpd6 == 0) ? 0 : $opd6;
        $opd7 = ($cpd7 == 0) ? 0 : $opd7;
        $opd8 = ($cpd8 == 0) ? 0 : $opd8;
        $opd9 = ($cpd9 == 0) ? 0 : $opd9;
        $opd10 = ($cpd10 == 0) ? 0 : $opd10;
        /////////////////////////////

        $scores =  sum_score($cpd1.$opd1.";".$cpd2.$opd2.";".$cpd3.$opd3.";".$cpd4.$opd4.";".$cpd5.$opd5.";".$cpd6.$opd6.";".$cpd7.$opd7.";".$cpd8.$opd8.";".$cpd9.$opd9.";".$cpd10.$opd10);
        
        $scores = explode(";", $scores);
        $sessionscore = $scores[0];
        $previousscore = $score-$sessionscore;
        echo "<script>
            $('#badge-s').html($score);
            $('#badge-sc').html($sessionscore);
            $('#badge-ps').html($previousscore);
        </script>";
}
//END Of SHOW GAME






// *********  START OF PAGE   ****************************************
    $sql = "SELECT users.id FROM login_history INNER JOIN users ON login_history.id = users.id INNER JOIN ( SELECT member2 as UserID FROM iterative_teams WHERE member1 = '$login_id' UNION SELECT member3 as UserID FROM iterative_teams WHERE member1 = '$login_id' UNION SELECT member4 as UserID FROM iterative_teams WHERE member1 = '$login_id' UNION SELECT member1 as UserID FROM iterative_teams WHERE member2 = '$login_id' UNION SELECT member3 as UserID FROM iterative_teams WHERE member2 = '$login_id' UNION SELECT member4 as UserID FROM iterative_teams WHERE member2 = '$login_id' UNION SELECT member1 as UserID FROM iterative_teams WHERE member3 = '$login_id' UNION SELECT member2 as UserID FROM iterative_teams WHERE member3 = '$login_id' UNION SELECT member4 as UserID FROM iterative_teams WHERE member3 = '$login_id' UNION SELECT member1 as UserID FROM iterative_teams WHERE member4 = '$login_id' UNION SELECT member2 as UserID FROM iterative_teams WHERE member4 = '$login_id' UNION SELECT member3 as UserID FROM iterative_teams WHERE member4 = '$login_id') as t1 ON users.id = t1.UserID WHERE 
TIMESTAMPDIFF(MINUTE, login_history.log_in , NOW()) < 60 and login_history.log_out = '0000-00-00 00:00:00' AND login_history.busy = 0 AND login_history.isAdmin = 0 ORDER BY rand() LIMIT 1";

    $query = $dbc->query($sql);
    if((!$query->num_rows) AND (!$busy)){
        echo "<div class='col-xs-12 text-center'>
    	There are not enough players
        <div class='alert alert-info'>You will be notified with a sound when a round starts</div>
        </div>"; 
        echo "<script>
            $('#badge-s').html($score);
            $('#badge-sc').html(0);
            $('#badge-ps').html($score);
        </script>";
    } 
    elseif(!$busy)
    {
    	$id = $query->fetch_assoc();
    	$id = $id['id'];
        /*if($query->num_rows > 1){
            $sql = "SELECT * FROM games_iterative WHERE player1='$login_id' OR player2='$login_id' ORDER BY id DESC LIMIT 1";
            $query = $dbc->query($sql);
            $fetch = $query->fetch_assoc();
            if( ($fetch['player1'] == $id) OR ($fetch['player2'] == $id)){
                //$sql = "SELECT id FROM users WHERE online_status=1 AND busy=0 AND id!='$login_id' AND id!='$id' ORDER BY rand() LIMIT 1";
                $sql = "SELECT id FROM login_history WHERE TIMESTAMPDIFF(MINUTE, log_in, NOW()) < 60 and log_out = '0000-00-00 00:00:00' AND busy = 0 AND isAdmin = 0 AND id != '$login_id' AND id != '$id' ORDER BY rand() LIMIT 1";
                $query = $dbc->query($sql);
                $fetch = $query->fetch_assoc();
                $id = $fetch['id'];
            }
        }
        */
    	/* Make players busy */
    	//$sql = "UPDATE users SET busy=1 WHERE id='$id' OR id='$login_id'";
        $sql = "UPDATE login_history SET busy = 1 WHERE id='$id' OR id = '$login_id'";
    	$query = $dbc->query($sql);
    	/* Create game */
    	$time = time()+120;
    	$sql = "INSERT INTO games_iterative (player1,player2,time) VALUES ('$id','$login_id','$time')";
    	$query = $dbc->query($sql);
    	/* Get id from game */
    	$sql = "SELECT id FROM games_iterative WHERE (player1='$login_id' OR player2='$login_id') AND (status!= (select round_limit from games_rounds))";
    	$query = $dbc->query($sql);
    	$fetch = $query->fetch_assoc();
    	$id = $fetch['id'];
    	/* Show game */
    	if($query->num_rows){show_game($id);}
    }
    elseif($busy){
    	/* Get game id */
    	$sql = "SELECT * FROM games_iterative WHERE (player1='$login_id' OR player2='$login_id') AND (status!=(select round_limit from games_rounds))";
    	$query = $dbc->query($sql);
    	$fetch = $query->fetch_assoc();
    	$id = $fetch['id'];
    	/* show game */
    	if($query->num_rows){show_game($id);}else{
            echo "<div class='col-xs-12 text-center'>
                Marked as BUSY!
                <button class='btn btn-info btn_unbusy btn-lg btn-block'>Click here if you are ready to play!</button>
            </div>";
            echo "<script>
                $('#badge-s').html($score);
                $('#badge-sc').html(0);
                $('#badge-ps').html($score);
                $('#badge-as').html($avg);
            </script>";
        }
    }
?>
<script>
$('.btn_co').click(function(){
    var gid = $('#game_id').val();
    $.post( "decision_iterative.php", { id: gid, de: 1 } );
    get_data();
});
$('.btn_de').click(function(){
    var gid = $('#game_id').val();
    $.post( "decision_iterative.php", { id: gid, de: 2 } );
    get_data();
});
$('.btn_unbusy').click(function(){
    $.post( "unbusy.php", { busy: 0 } );
});
</script>
    <?php
    $sql = "SELECT * FROM games_iterative WHERE (player1='$login_id' OR player2='$login_id') AND (status=(select round_limit from games_rounds)) ORDER BY id DESC LIMIT 1";
    $query = $dbc->query($sql);
    $fetch = $query->fetch_assoc();
    $p1 = $fetch['player1'];
    $op = ($p1 != $login_id) ? $p1 : $fetch['player2'];
    /* ROUND 1 */
    $ra1 = $fetch['round1'];
    $cpd1 = ($p1 == $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
    $opd1 = ($p1 != $login_id) ? substr($ra1,0,1) : substr($ra1,2,1);
    /* ROUND 2 */
    $ra2 = $fetch['round2'];
    $cpd2 = ($p1 == $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
    $opd2 = ($p1 != $login_id) ? substr($ra2,0,1) : substr($ra2,2,1);
    /* ROUND 3 */
    $ra3 = $fetch['round3'];
    $cpd3 = ($p1 == $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
    $opd3 = ($p1 != $login_id) ? substr($ra3,0,1) : substr($ra3,2,1);
    /* ROUND 4 */
    $ra4 = $fetch['round4'];
    $cpd4 = ($p1 == $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
    $opd4 = ($p1 != $login_id) ? substr($ra4,0,1) : substr($ra4,2,1);
    /* ROUND 5 */
    $ra5 = $fetch['round5'];
    $cpd5 = ($p1 == $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
    $opd5 = ($p1 != $login_id) ? substr($ra5,0,1) : substr($ra5,2,1);
    $scores =  sum_score($cpd1.$opd1.";".$cpd2.$opd2.";".$cpd3.$opd3.";".$cpd4.$opd4.";".$cpd5.$opd5);
    $scores = explode(";", $scores);
    $cs = $scores[0];
    $os = $scores[1];
    $ca = ($cs > $os) ? "won" : "lost";
    $oa = ($os > $cs) ? "won" : "lost";

    echo "
        <div style='margin-top:50px' class='alert alert-info text-center col-xs-12 col-md-6 col-md-offset-3'>
        In your last match you got $cs points, your partner got $os points
        </div>
    ";

    //echo "
    //    <div style='margin-top:50px' class='alert alert-info text-center col-xs-12 col-md-6 col-md-offset-3'>
    //    In your last match you $ca and got $cs points, your partner $oa and got $os points
    //    </div>
    //";
	
	mysqli_query($dbc, "COMMIT");
	//3. ALWAYS CLOSE A DATABASE AFTER USING IT.
	mysqli_close($dbc); //dbc is for connection.php	
    ?>
