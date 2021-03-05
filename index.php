<?php
    require('vendor/autoload.php');
    // include "index/index.php";
    echo "Hi" . PHP_EOL;
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"], $db["port"], $db["user"], $db["pass"],
        ltrim($db["path"], "/")
    ));
    $query = "CREATE TABLE week (
                quest_id SERIAL,
                quest text,
                answer text,
                point text,
                grade smallint,
                match_code smallint,
                notice text,
                math boolean,
                physics boolean,
                chemistry boolean,
                biology boolean,
                literature boolean,
                history boolean,
                geography boolean,
                english boolean,
                other boolean,
                calculating boolean,
                video boolean
                )";
    if ($pdo->query($query) != false) {
        echo "Success";
    } else echo "Fail";
?>
