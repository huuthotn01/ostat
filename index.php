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
	</head>

    <body>
        <noscript>
            Enable JavaScript to use this page
        </noscript>
        <div class="container">
            <p><strong>Thêm thông tin bằng bảng sau: (có <sup>(*)</sup> là bắt buộc)</strong></p>
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
                    <label>Trận đấu:<sup>(*)</sup> </label> 
                    <br />
                    <div class="form-check-inline">
                        <label class="form-check-label" for="week"> <input type="radio" class="form-check-input" value="week" id="week" name="match"> Tuần </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="month"> <input type="radio" class="form-check-input" value="month" id="month" name="match"> Tháng </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="quarter"> <input type="radio" class="form-check-input" value="quarter" id="quarter" name="match"> Quý </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Số điểm:<sup>(*)</sup> </label> 
                    <br />
                    <div class="form-check-inline">
                        <label class="form-check-label" for="ten"> <input type="radio" class="form-check-input" value="10" id="ten" name="point"> 10 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="twenty"> <input type="radio" class="form-check-input" value="20" id="twenty" name="point"> 20 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="thirty"> <input type="radio" class="form-check-input" value="30" id="thirty" name="point"> 30 </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Lĩnh vực:<sup>(*)</sup> </label> 
                    <br />
                    <div class="form-check-inline">
                        <label class="form-check-label" for="math"> <input type="checkbox" class="form-check-input" value="math" id="math" name="field"> Toán </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="physics"> <input type="checkbox" class="form-check-input" value="physics" id="physics" name="field"> Lý </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="chemistry"> <input type="checkbox" class="form-check-input" value="chemistry" id="chemistry" name="field"> Hóa </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="biology"> <input type="checkbox" class="form-check-input" value="biology" id="biology" name="field"> Sinh </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="literature"> <input type="checkbox" class="form-check-input" value="literature" id="literature" name="field"> Văn </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="history"> <input type="checkbox" class="form-check-input" value="history" id="history" name="field"> Sử </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="geography"> <input type="checkbox" class="form-check-input" value="geography" id="geography" name="field"> Địa </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="english"> <input type="checkbox" class="form-check-input" value="english" id="english" name="field"> Anh văn </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Lớp:<sup>(*)</sup> </label> 
                    <br />
                    <div class="form-check-inline">
                        <label class="form-check-label" for="grade_9"> <input type="radio" class="form-check-input" value="9" id="grade_9" name="grade"> 6 - 9 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="grade_10"> <input type="radio" class="form-check-input" value="10" id="grade_10" name="grade"> 10 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="grade_11"> <input type="radio" class="form-check-input" value="11" id="grade_11" name="grade"> 11 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="grade_12"> <input type="radio" class="form-check-input" value="12" id="grade_12" name="grade"> 12 </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="grade_13"> <input type="radio" class="form-check-input" value="13" id="grade_13" name="grade"> Ngoài sách </label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Các yếu tố khác: </label> 
                    <br />
                    <div class="form-check-inline">
                        <label class="form-check-label" for="calculating"> 
                            <input type="checkbox" class="form-check-input" value="calculating" id="calculating" name="others"> 
                            Tính toán 
                        </label>
                    </div>
                    <div class="form-check-inline">
                        <label class="form-check-label" for="video"> 
                            <input type="checkbox" class="form-check-input" value="video" id="video" name="others"> 
                            Video
                        </label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="notice">Ghi chú: </label>
                    <textarea class="form-control" id="notice" name="notice" placeholder="Ghi chú"></textarea>
                </div>
                <div class="form-group">
                    <button id="button_submit" style="width: 100%" class="btn btn-success" >
                        Thêm
                        <span id="submit-spinner"></span>
                    </button>
                </div>
            </form>
        </div>
        
        <script src="index.js"></script>
    </body>
</html>