<?php

    require(__DIR__ . "/includes/config.php");
	
    function showUsage() {
        $tracking = "INSERT INTO access_records (user_agent, user_ip, user_request) VALUES ('" .$_SERVER['HTTP_USER_AGENT'] . "', '" .$_SERVER['REMOTE_ADDR'] . "', 'show usage')";
        query($tracking);
        header("Location: http://assignment.two.quite.cool/");
        die();
    }

    nameorExit("app request");
	
    if (!empty($_GET["show"]))
    {
        if ($_GET["show"] == "genre")
        {
			if (empty($_GET["id"]))
			{
				$show = "SELECT id, name FROM genre";
				$tracking = "INSERT INTO access_records (user_agent, user_ip, user_request) VALUES ('" .$_SERVER['HTTP_USER_AGENT'] . "', '" .$_SERVER['REMOTE_ADDR'] . "', 'app request')";
				query($tracking);
			}
			else {showUsage();}
        }
        else if ($_GET["show"] == "album")
        {
            if (!empty($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $show = "SELECT id, name, artists, release_date, genre FROM album WHERE genre = " .$_GET["id"];
            }
            else {showUsage();}
        }
        else if ($_GET["show"] == "details")
        {
            if (!empty($_GET["id"]) && is_numeric($_GET["id"]))
            {
                $show = "SELECT song, duration FROM details WHERE album_id = " .$_GET["id"];
            }
            else {showUsage();}
        }
        else {showUsage();} 
    }
    else {showUsage();} 

    header("Content-type: application/json");
    print(json_encode(query($show), JSON_PRETTY_PRINT));

?>
