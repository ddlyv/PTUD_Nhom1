<?php include 'phanQuyen.php'; // Tự động kiểm tra quyền ?>
<?php include 'header.php'; ?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/xemtt.css">

<div class="section1">
    <div class="tenChucNang">
        <p class="tenChucNang_cuthe">THÔNG TIN ĐƠN THUỐC </p>
    </div>
    
    <div class="search-container" align="right" style="margin-bottom: 20px;">
        <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">
        <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
    </div>

    <?php
        // Lấy mã bệnh nhân từ session
        $maTaiKhoanBenhNhan = $_SESSION['id'];

        // Bao gồm class xử lý
        include '../myclass/clsbnxemdonthuoc.php'; 

        // Tạo đối tượng xử lý đơn thuốc
        $p = new xemdonthuoc();

        // Gọi phương thức xemThongTinDonThuoc với mã bệnh nhân
        $p->xemThongTinDonThuoc($maTaiKhoanBenhNhan);


    ?>

    <div class="button">
        <input type="submit" name="nut" id="backButton" value="Quay lại" onclick="window.history.back();">
        <input type="submit" name="nut" id="finishButton" value="Xong">
    </div>
</div>

<?php include 'footer.php'; ?>