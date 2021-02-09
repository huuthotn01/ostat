<?php
    require('vendor/autoload.php');
?>

<!DOCTYPE html>
<html>
    <head>
		<title>OStat - Home Page</title>
		<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	</head>

    <body>
        <noscript>
            Enable JavaScript to use this page
        </noscript>
        <div class="row">
            <div class="col-xl-12">
                <p><strong>Thêm thông tin bằng bảng sau: (có (*) là bắt buộc)</strong></p>
                <form id="add-form" method="POST">
                    <div class="form-group">
                        <label for="quest">Câu hỏi:<sup>(*)</sup> </label>
                        <textarea class="form-control" id="quest" name="quest" placeholder="Câu hỏi"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="answer">Đáp án:<sup>(*)</sup> </label>
                        <textarea class="form-control" id="answer" name="answer" placeholder="Đáp án"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Trận đấu: </label> 
                        <div class="form-check">
                            <label class="form-check-label"> <input type="radio" class="form-check-input" value="week" id="week" name="match"> Tuần </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"> <input type="radio" class="form-check-input" value="week" id="week" name="match"> Tuần </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"> <input type="radio" class="form-check-input" value="month" id="month" name="match"> Tháng </label>
                        </div>
                        <div class="form-check">
                            <label class="form-check-label"> <input type="radio" class="form-check-input" value="quarter" id="quarter" name="match"> Quý </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <button id="button_submit" style="width: 100%" class="btn btn-success" >
                            Thêm
                            <span id="submit-spinner"></span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <hr />
    </body>
</html>