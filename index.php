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
    try {
    $match = ["week", "month", "quarter"];
    foreach ($match as $match_name) {
        $test = $pdo->query("SELECT 1 FROM $test LIMIT 1");
        if ($test === false) {
            $query = "CREATE TABLE $test (
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
        }
    }
    } catch(Exception $e) {
        echo $e;
    }
?>
