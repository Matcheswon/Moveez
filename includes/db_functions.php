<?php
if($_POST)
{
	$title = $_POST['title'];
	$rating = $_POST['rating'];

    //mysql_connect(host, username, password);
	$con = mysql_connect("localhost", "root", "") or die(mysql_error() );
	
	//connect to database
	mysql_select_db("moveez") or die( mysql_error() );
    
    //insert title and rating into database
    mysql_query( "INSERT INTO movies (title, rating) VALUES ('$title', '$rating')" ) or die( mysql_error() );

    $result = mysql_query( "SELECT * FROM movies" ) or die( mysql_error() );

    $rows = array();
    
    while($r = mysql_fetch_assoc($result) )
    {
    	$rows[] = $r;
    }

    echo json_encode($rows);

    mysql_close($con);
}