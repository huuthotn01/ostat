<?php
    $quest = $_POST["quest"];
    $answer = $_POST["answer"];
    $notice = $_POST["notice"];
    $bool_val = $_POST["bool"];
    $bool_val = json_decode($bool_val, true);
    if ($bool_val == null) {
        echo "Error, try again!";
    } else {
        echo "OK";
    }
?>