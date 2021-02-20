<?php
    function jsonDecode($val) {
        return json_decode($val, true);
    }
    $input_quest = [$_POST["first"], $_POST["second"], $_POST["third"]];
    $input_quest_array = array_map('jsonDecode', $input_quest);
    if ($input_quest_array[0]["match"] != $input_quest_array[1]["match"] || $input_quest_array[0]["match"] != $input_quest_array[2]["match"] || $input_quest_array[1]["match"] != $input_quest_array[2]["match"]) {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo 'Not the same match, try again!';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    } else if ($input_quest_array[0]["num"] != "0" || $input_quest_array[1]["num"] != "1" || $input_quest_array[2]["num"] != "2") {
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">';
        echo 'Something wrong, refresh page and try again!';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    } else {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
        echo 'Questions added successfully!';
        echo '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
        echo '<span aria-hidden="true">&times;</span>';
        echo '</button>';
        echo '</div>';
    }
?>