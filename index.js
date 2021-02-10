$(document).ready(function() {
    // Input radio #match processing
    $("input[name='match']").click(function() {
        if ($("#week").is(":checked") || $("#month").is(":checked") || $("#quarter").is(":checked")) {
            $("#week").removeAttr("required");
            $("#month").removeAttr("required");
            $("#quarter").removeAttr("required");
        }
    });

    // Input radio #point processing
    $("input[name='point']").click(function() {
        if ($("#ten").is(":checked") || $("#twenty").is(":checked") || $("#thirty").is(":checked")) {
            $("#ten").removeAttr("required");
            $("#twenty").removeAttr("required");
            $("#thirty").removeAttr("required");
        }
    });

    // Input checkbox #field processing
    $("input[name='field']").click(function() {
        var field_name = ["math", "physics", "chemistry", "biology", "literature", "history", "geography", "english"];
        var field_num = field_name.length;
        if ($("#math").is(":checked") || $("#physics").is(":checked") || $("#chemistry").is(":checked") || $("#biology").is(":checked") || $("#literature").is(":checked") || $("#history").is(":checked") || $("#geography").is(":checked") || $("#english").is(":checked")) {
            for (var i = 0; i < field_num; i++) {
                var selector_str = "#" + field_name[i];
                $(selector_str).removeAttr("required");
            }
        } else {
            for (var i = 0; i < field_num; i++) {
                var selector_str = "#" + field_name[i];
                $(selector_str).attr("required", "required");
            }
        }
    });

    // Input radio #grade processing
    $("input[name='grade']").click(function() {
        if ($("#grade_9").is(":checked") || $("#grade_10").is(":checked") || $("#grade_11").is(":checked") || $("#grade_12").is(":checked") || $("#grade_13").is(":checked")) {
            $("#grade_9").removeAttr("required");
            $("#grade_10").removeAttr("required");
            $("#grade_11").removeAttr("required");
            $("#grade_12").removeAttr("required");
            $("#grade_13").removeAttr("required");
        }
    });

    // Form submitting processing
    $("#add-form").submit(function(e) {
        e.preventDefault();
        if ($("#quest").val() == '' || $("#answer").val() == '') {
            alert("Enter question or answer.");
        }
        submit_quest();
    });
});

function submit_quest() {
    var bool_val = {
        week: false,
        month: false,
        quarter: false,
        ten: false,
        twenty: false,
        thirty: false,
        math: false,
        physics: false,
        chemistry: false,
        biology: false,
        literature: false,
        history: false,
        geography: false,
        english: false,
        grade_9: false,
        grade_10: false,
        grade_11: false,
        grade_12: false,
        grade_13: false,
        calculating: false,
        video: false,
    } 
    var bool_name = ["week", "month", "quarter", "ten", "twenty", "thirty", "math", "physics", "chemistry", "biology", "literature", "history", "geography", "english", "grade_9", "grade_10", "grade_11", "grade_12", "grade_13", "calculating", "video"];
    var bool_val_num = bool_name.length;
    for (var i = 0; i < bool_val_num; i++) {
        selector_str = "#" + bool_name[i];
        if ($(selector_str).is(":checked")) bool_val[bool_name[i]] = true;
    }
    var quest = $("#quest").val();
    var answer = $("#answer").val();
    var notice = $("#notice").val();

    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#result").html(this.responseText);
            $("#add-form").trigger("reset");
        }
    };
    xhttp.open("POST", "/action.php", true);
    xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    var info = "quest=" + quest + "&answer=" + answer + "&notice=" + notice + "&bool=" + JSON.stringify(bool_val);
    alert(JSON.stringify(bool_val));
    xhttp.send(info);
}