<?php
    require('vendor/autoload.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <title>O Stat</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <link rel="icon" type="image/png" href="/favicon.png" />
        <link rel="stylesheet" href="index.css" />
	</head>

    <body>
        <noscript>
            Enable JavaScript to use this page
        </noscript>
          
        <div id="form-slider" class="carousel slide" data-interval="false">
            <ol style="background-color: black;" class="carousel-indicators">
                <li data-target="#form-slider" data-slide-to="0" class="active"></li>
                <li data-target="#form-slider" data-slide-to="1"></li>
                <li data-target="#form-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div id="slider-0" class="carousel-item active">
                    <?php
                        include "quest_form.html";
                    ?>
                </div>
                <div id="slider-1" class="carousel-item">
                    <?php
                        include "quest_form.html";
                    ?>
                </div>
                <div id="slider-2" class="carousel-item">
                    <?php
                        include "quest_form.html";
                    ?>
                </div>
            </div>
            <a class="carousel-control-prev" href="#form-slider" role="button" data-slide="prev">
                <span style="background-color: black;" class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#form-slider" role="button" data-slide="next">
                <span style="background-color: black;" class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            <br />
            <br />
        </div>

        <div class="container">
            <div style="display: none" id="form-alert" class="alert alert-danger" role="alert">
            </div>
            <div class="form-group">
                <button id="button-submit" style="width: 100%" class="btn btn-success" >
                    Thêm vào CSDL
                </button>
            </div>
        </div>

        <div id="server-result" class="container">
            
        </div>
        <hr />
        <div class="container">
            <p>Tải về dữ liệu: </p>
            <div class="form-group">
                <button id="weekly-download" class="btn btn-success">
                    Tải về dữ liệu tuần
                </button>
            </div>
            <div class="form-group">
                <button id="monthly-download" class="btn btn-success" >
                    Tải về dữ liệu tháng
                </button>
            </div>
            <div class="form-group">
                <button id="quarterly-download" class="btn btn-success" >
                    Tải về dữ liệu quý
                </button>
            </div>
            <div id="download-result">
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <script src="index.js"></script>
        <script src="download.js"></script>
    </body>
</html>