<?php include 'header.php'; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">

        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">HỒ SƠ BỆNH ÁN</p>
        </div>
        <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div>

        <!-- <div class="date-filter" align="right" style="margin-bottom: 20px;">
            <label for="startDate" class="form-label">Từ ngày:</label>
            <input type="date" id="startDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <label for="endDate" class="form-label">Đến ngày:</label>
            <input type="date" id="endDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <button id="filterButton" class="btn btn-primary">Lọc</button>
        </div> -->
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Bác sĩ khám</th>
                <th>Chuẩn đoán</th>
                <th>Kết luận</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
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