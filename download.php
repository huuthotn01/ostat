<?php
    $id = $_POST["match"];
    $file = "csv_data";
    if ($id == "weekly-download") $file = $file."/week.csv";
    else if ($id == "monthly-download") $file = $file."/month.csv";
    else if ($id == "quarterly-download") $file = $file."/quarter.csv";
    else echo "Error!";
    if ($file != "") {
        if (file_exists($file)) {
            clearstatcache();
            header('Content-Description: File Transfer');
            header('Content-Type: text/csv');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Content-Length: '.filesize($file));
            header('Pragma: public');
            flush();
            readfile($file, true);
            exit;
        }
        else echo "Error";
    } else echo "Error.";
?>