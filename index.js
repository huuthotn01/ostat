$(document).ready(function() {
    // Form submitting processing
    $("#button-submit").click(function() {
        $("#form-alert").text("");
        var data = ["", "", ""];
        var bool_check = true;
        for (let i = 0; i < 3; i++) {
            try {
                let selector = "#slider-" + i.toString() + " #add-form";
                data[i] = getSubmitId(selector);
            } catch(err) {
                bool_check = false;
                $("#form-alert").append("- " + err + "<br />");
                $("#form-alert").css("display", "block");
            }
        }
        if (bool_check) {
            try {
                if (JSON.parse(data[0])["match"] != JSON.parse(data[1])["match"] || JSON.parse(data[0])["match"] != JSON.parse(data[2])["match"] || JSON.parse(data[1])["match"] != JSON.parse(data[2])["match"]) 
                    throw "Not the same match, try again!";
            } catch(err) {
                bool_check = false;
                $("#form-alert").append("- " + err + "<br />");
                $("#form-alert").css("display", "block");
            }
        }
        if (bool_check) {
            $("#form-alert").css("display", "none");
            // AJAX call to server
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    $("#server-result").html("");
                    $("#server-result").html(this.responseText);
                    $("#slider-0 #add-form, #slider-1 #add-form, #slider-2 #add-form").trigger("reset");
                }
            };
            xhttp.open("POST", "/action.php", true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            var info = "first=" + data[0] + "&second=" + data[1] + "&third=" + data[2];
            xhttp.send(info);
        }
    });

    $("#slider-0 #add-form, #slider-1 #add-form, #slider-2 #add-form").submit(function(e) {
        e.preventDefault();
        console.log("Unavailable!");
    });
});

function getSubmitId(id) {
    var slider_num = id[8];
    // console.log("Each slider submit, " + (typeof submit_quest(slider_num)));
    return submit_quest(slider_num);
}

function submit_quest(slider_num) {
    var selector = "#slider-" + slider_num + " ";
    // data values
    var data = {
        math: false,
        physics: false,
        chemistry: false,
        biology: false,
        literature: false,
        history: false,
        geography: false,
        english: false,
        calculating: false,
        video: false,
        match: "",
        point: "",
        grade: "",
        quest: "",
        answer: "",
        notice: "",
        num: ""
    } 

    data["num"] = slider_num;

    // quest and answer
    var quest = $(selector + "#quest").val();
    var answer = $(selector + "#answer").val();
    if (quest === "" || answer === "") throw ("Enter question or answer at slider " + slider_num);
    else {
        data["quest"] = quest;
        data["answer"] = answer;
    }

    // match
    var has_check = false;
    var match_var = ["week", "month", "quarter"];
    var match_var_num = match_var.length;
    for (var i = 0; i < match_var_num; i++) {
        selector_str = selector + "#" + match_var[i];
        if ($(selector_str).is(":checked")) {
            data["match"] = match_var[i];
            has_check = true;
            break;
        }
    }
    if (!has_check) throw ("Choose match at slider " + slider_num);

    // point
    has_check = false;
    var point_var = ["ten", "twenty", "thirty"];
    var point_var_num = point_var.length;
    for (var i = 0; i < point_var_num; i++) {
        selector_str = selector + "#" + point_var[i];
        if ($(selector_str).is(":checked")) {
            data["point"] = point_var[i];
            has_check = true;
            break;
        }
    }
    if (!has_check) throw ("Choose point at slider " + slider_num);

    // field
    var field_name = ["math", "physics", "chemistry", "biology", "literature", "history", "geography", "english"];
    var field_val_num = field_name.length;
    has_check = false;
    for (var i = 0; i < field_val_num; i++) {
        selector_str = selector + "#" + field_name[i];
        if ($(selector_str).is(":checked")) {
            data[field_name[i]] = true;
            has_check = true;
        }
    }
    if (!has_check) throw ("Choose field at slider " + slider_num);

    // grade
    has_check = false;
    var grade_var = ["9", "10", "11", "12", "13"];
    var grade_var_num = grade_var.length;
    for (var i = 0; i < grade_var_num; i++) {
        selector_str = selector +  "#grade_" + grade_var[i];
        if ($(selector_str).is(":checked")) {
            data["grade"] = grade_var[i];
            has_check = true;
            break;
        }
    }
    if (!has_check) throw ("Choose grade at slider " + slider_num);

    // others
    if ($(selector + "#calculating").is(":checked")) data["calculating"] = true;
    if ($(selector + "#video").is(":checked")) data["video"] = true;

    // optional notice
    var notice = $(selector + "#notice").val();
    data["notice"] = notice;

    // return data to check and make AJAX call
    return (JSON.stringify(data));
}