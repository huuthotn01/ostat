$(document).ready(function() {
    $("#math").click(function() {
        if ($("#calculating").attr("disabled") == true) {
            $("#calculating").attr("disabled", false);
            $("label[for='calculating']").attr("disabled", false);
        } else {
            $("#calculating").attr("disabled", true);
            $("label[for='calculating']").attr("disabled", true);
        }
    });
});