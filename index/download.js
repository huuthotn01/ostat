$(document).ready(function() {
    $("#weekly-download, #monthly-download, #quarterly-download").click(function(e) {
        var match = e.target.id;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#download-result").html("");
                $("#download-result").html(this.responseText);
            }
        };
        xhttp.open("POST", "index/download.php", true);
        xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        var info = "match=" + match;
        xhttp.send(info);
        console.log("Request sent");
    });
});

