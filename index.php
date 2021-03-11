<?php
    require('vendor/autoload.php');
    // include "index/index.php";
    $db = parse_url(getenv("DATABASE_URL"));
    $pdo = new PDO("pgsql:" . sprintf(
        "host=%s;port=%s;user=%s;password=%s;dbname=%s",
        $db["host"], $db["port"], $db["user"], $db["pass"],
        ltrim($db["path"], "/")
    ));
    $match = ["week", "month", "quarter"];
    foreach ($match as $match_code) {
        if (($file = fopen("csv_data/".$match_code.".csv", "r")) !== FALSE) {
            while (($data = fgetcsv($file, 0, "|")) !== FALSE) {
                $ok = true;
                try {
                    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $add_row = $pdo->prepare("UPDATE $match_code SET Notice = '' WHERE Notice = '0'");
                    $add_row->execute();
                } catch (Exception $e) {
                    $ok = false;
                    echo $e . PHP_EOL;
                    exit;
                }
                if ($ok) echo "<br/>Modified!<br/>";
            }
            fclose($file);
            echo "<br /> OK";
        } else echo "Error opening file";
    }
?>
