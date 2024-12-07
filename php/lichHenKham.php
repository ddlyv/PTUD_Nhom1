<?php include 'header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">LỊCH HẸN KHÁM</p>
        </div>
        <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Ngày khám</th>
                <th>Giờ khám</th>
                <th>Ngày tạo</th>
                <th>Tình trạng</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table>
        <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" id="finishButton" value="Xong">
        </div>
    </div>


<?php include 'footer.php'; ?>