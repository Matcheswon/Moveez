<?php


	
    header("Content-type: application/json");
    //mysql_connect(host, username, password);
	$con = mysql_connect("localhost", "root", "") or die(mysql_error() );
	
	//connect to database
	mysql_select_db("moveez") or die( mysql_error() );
    
    if(isset($_POST['create']) && $_POST['create'])
    {    
    $title = $_POST['title'];
    $rating = $_POST['rating'];
    //insert title and rating into database
    mysql_query( "INSERT INTO movies (title, rating) VALUES ('$title', '$rating')" ) or die( mysql_error() );
    }
    
    if(isset($_POST['delete']) && $_POST['delete'])
    {
        $id = $_POST['id'];
        mysql_query("DELETE FROM movies WHERE id='$id'") or die(msql_error());
    }

    $result = mysql_query( "SELECT id, title, rating FROM movies" ) or die( mysql_error() );

    $rows = array();
    
    while($r = mysql_fetch_assoc($result) )
    {
    	$rows[] = $r;
    }

    echo json_encode($rows);

    mysql_close($con);
