<?php
if ($_GET['key']!="hey") {
    die("Access denied");
}

$mysqli = new mysqli("localhost", "breimern_sbxusr", "Sandbox@)!&", "breimern_sandbox");

$sql = "CREATE TABLE mattjoshtable (
                username VARCHAR(64) NOT NULL,
                password VARCHAR(64) NOT NULL,
                usertype VARCHAR(64) NOT NULL DEFAULT 'normal',
                games INT NOT NULL DEFAULT '0',
                points FLOAT NOT NULL DEFAULT '0.0',
                PRIMARY KEY (username)
        )";

    $mysqli->query($sql);
    $mysqli->close();
    ?>