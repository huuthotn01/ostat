<?php
    require('vendor/autoload.php');
    echo "Hello, This is OStat";
?>

<!DOCTYPE html>
<html>
	<head>
		
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
                        <label>Ngày:<sup>(*)</sup> </label>
                        <input id="date" class="form-control" type="date" name="date" required />
                    </div>
                    <div class="form-group">
                        <label>Số tiền:<sup>(*)</sup> </label>
                        <input id="amount" class="form-control" type="number" name="amount" placeholder="Đơn vị: VND" required />
                    </div>
                    <div class="form-group">
                        <label>Lí do: </label>
                        <textarea class="form-control" id="reason" name="reason" placeholder="Lí do"></textarea>
                    </div>
                    <div class="form-group">
                        <button id="button_submit" style="width: 100%" class="btn btn-success" >
                            Thêm
                            <span id="submit-spinner"></span>
                        </button>
                    </div>
                </form>
                    
                <div id="alert">
                        
                </div>
            </div>
        </div>
        <hr />
        
        <div class="row">
            <div class="col-xl-12">
                <button type="button" class="btn btn-info" id="history-view">Xem nhật ký</button>
                <div style="display: none" id="history">
                    <form id="history-form" method="POST">
                        <div class="form-group">
                            <label>Ngày: </label>
                            <input id="history-day" class="form-control" type="number" name="history-date" min="1" max="31" />
                        </div>
                        <div class="form-group">
                            <label>Tháng: </label>
                            <input id="history-month" class="form-control" type="number" name="history-month" min="1" max="12"/>
                        </div>
                        <div class="form-group">
                            <label>Năm: </label>
                            <input id="history-year" class="form-control" type="number" name="history-year" min="2020" required/>
                        </div>
                        <div class="form-group form-check">
                            <label class="form-check-label">
                            <input id="view-all" class="form-check-input" type="checkbox"> Xem toàn bộ lịch sử
                            </label>
                        </div>
                        <div class="form-group">
                            <button id="history-button" class="btn btn-info">
                                Xem lịch sử
                                <span id="history-spinner"></span>
                            </button>
                        </div>
                    </form>
                    <div id="history-table" class="table-responsive">
                            
                    </div>
                </div>
            </div>
        </div>
        <script src="client/activity.js"></script>
    </body>
</html>