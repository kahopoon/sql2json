<?php

    require(__DIR__ . "/includes/config.php");

    function showUsage() {
        echo "API Usage:";
        echo nl2br("\n\n");
        echo "http://assignment.two.quite.cool/list.php?show=[<i>Parameter 1</i>]&id=[<i>Parameter 2</i>]";
        echo nl2br("\n\n");
        echo "[Parameter 1]:";
        echo nl2br("\n");
        echo "<i>genre</i>:  - Return all available genre in <i>[{id}, {name}]</i>.";
        echo nl2br("\n");
        echo "<i>album</i>:  - Return specific genre of albums with defined [<i>Parameter 2</i>] in <i>[{id}, {name}, {artists}, {release_date}, {genre_id}]</i>.";
        echo nl2br("\n");
        echo "<i>details</i>:  - Return specific album's song list and duration with defined [<i>Parameter 2</i>] in <i>[{song}, {duration}]</i>.";
        echo nl2br("\n\n");
        echo "[Parameter 2]:";
        echo nl2br("\n");
        echo "<i>id</i> of genre  - Use with <i>show=album</i>";
        echo nl2br("\n");
        echo "<i>id</i> of album  - Use with <i>show=details</i>";
        echo nl2br("\n\n\n");
        echo "<i>kaho @2015-12</i>";
        exit;
    }

    if (!empty($_GET["show"]))
    {
        if ($_GET["show"] == "genre")
        {
            $show = "SELECT id, name FROM genre";
        }
        else if ($_GET["show"] == "album")
        {
            if (!empty($_GET["id"]))
            {
                $show = "SELECT id, name, artists, release_date, genre FROM album WHERE genre ='" .$_GET["id"] . "'";
            }
            else {showUsage();}
        }
        else if ($_GET["show"] == "details")
        {
            if (!empty($_GET["id"]))
            {
                $show = "SELECT song, duration FROM details WHERE album_id ='" .$_GET["id"] . "'";
            }
            else {showUsage();}
        }
        else {showUsage();} 
    }
    else {showUsage();} 

    header("Content-type: application/json");
    print(json_encode(query($show), JSON_PRETTY_PRINT));

?>
