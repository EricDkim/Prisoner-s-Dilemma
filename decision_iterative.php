<?php
    require_once('connection.php');
    require_once('session.php');
    $id = $_POST['id'];
    $de = $_POST['de'];
    $initialDE = $de;


    $sql = "SELECT * FROM games_iterative WHERE id='$id'";
    $query = $dbc->query($sql);
    $fetch = $query->fetch_assoc();
    $p1 = $fetch['player1'];
    $actual = $fetch['status'] + 1;
    $round = $fetch['round'.$actual];
    $de = ($p1 == $login_id) ? substr_replace($round,$de,0,1) : substr_replace($round,$de,2,1);
    $time = time()+60;
    
    //used to keep the game loop going
    $sql = "UPDATE games_iterative SET round$actual='$de',time='$time' WHERE id='$id'";
    $dbc->query($sql);
	

    //storing results
    
    //Get ROUND # and player #
    $choice = "Nothing";
    switch($initialDE)
    {
        case "2":
            $choice = "Defect";
            break;
        case "1":
            $choice = "Cooperate";
            break;
    }    

    $player = ($p1 == $login_id) ? "1" : "2";
    $round = "round$actual" . "_p" .$player;
    date_default_timezone_set('US/Eastern');
    $lastupdate = date("Y-m-d G:i:s");

    $sql2 = "UPDATE games_iterative SET $round='$choice',LastUpdateDate='$lastupdate' WHERE id='$id'";
    $dbc->query($sql2);



	mysqli_query($dbc, "COMMIT");
	//3. ALWAYS CLOSE A DATABASE AFTER USING IT.
	mysqli_close($dbc); //dbc is for connection.php
?>