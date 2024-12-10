<?php
include 'phanQuyen.php'; // Tự động kiểm tra quyền
include 'header.php';
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../../css/xemtt.css">

<div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe"> ĐẶT LỊCH KHÁM </p>
        </div>
<div class="container mt-5">
    <p>Quý khách hàng có nhu cầu đặt hẹn khám tại Hệ thống Bệnh viện , vui lòng thực hiện theo hướng dẫn.</p>
    <p>
        - Đặt hẹn qua các cách gọi tới tổng đài chăm sóc khách hàng hoặc điền thông tin vào biểu mẫu dưới đây.
    </p>
    <form action="xuLyDatLich.php" method="POST" class="mt-4">
        <div class="form-group mb-3">
            <label for="diaDiem">Chọn chi nhánh khám</label>
            <select id="diaDiem" name="diaDiem" class="form-select" required>
                <option value="BVĐK Tâm Anh Hà Nội"> Hà Nội </option>
                <option value="BVĐK Tâm Anh TP. HCM"> TP. HCM </option>
             
            </select>
        </div>
        <div class="form-group mb-3">
            <label>Chọn loại dịch vụ khám</label>
            <div>
                <input type="radio" id="trongGio" name="loaiDichVu" value="Khám trong giờ" required>
                <label for="trongGio">Khám trong giờ</label>
                <input type="radio" id="ngoaiGio" name="loaiDichVu" value="Khám ngoài giờ">
                <label for="ngoaiGio">Khám ngoài giờ</label>
                <input type="radio" id="online" name="loaiDichVu" value="Khám online">
                <label for="online">Khám online</label>
            </div>
        </div>
        <div class="form-group mb-3">
            <label for="chuyenKhoa">Chọn chuyên khoa</label>
            <select id="chuyenKhoa" name="chuyenKhoa" class="form-select" required>
                <option value="CK Hô hấp">CK Hô hấp</option>
                <option value="CK Tim mạch">CK Tim mạch</option>
                <option value="CK Nội tiết">CK Nội tiết</option>
            </select>
        </div>
        <div class="form-group mb-3">
    <label for="bacSi">Chọn bác sĩ</label>
    <select id="bacSi" name="bacSi" class="form-select" required>
        <option value="1">BSNT. Nguyễn Đức Mạnh</option>
        <option value="2">BSNT. Lê Minh Tuấn</option>
        <option value="3">BSNT. Trần Thị Hoa</option>
        <option value="4">BSNT. Phạm Anh Duy</option>
        <option value="5">BSNT. Hà Anh Tuấn</option>
    </select>
    </div>



        <div class="form-group mb-3">
            <label for="ngayKham">Chọn ngày</label>
            <input type="date" id="ngayKham" name="ngayKham" class="form-control" required>
        </div>
        <div class="form-group mb-3">
        <label for="khungGio">Chọn khung giờ muốn khám</label>
        <select id="khungGio" name="khungGio" class="form-select" required>
        <option value="Sáng">Sáng </option>
        <option value="Trưa">Trưa </option>
        <option value="Chiều">Chiều </option>
         </select>
        </div>

        <div class="form-group mb-3">
            <label for="ghiChu">Nhập yêu cầu sức khỏe cần khám</label>
            <textarea id="ghiChu" name="ghiChu" class="form-control" rows="3" placeholder="Nhập thông tin cần thiết"></textarea>
        </div>
        <button type="submit" class="btn btn-primary w-100"> Đặt Lịch </button>
    </form>
</div>
</div>
<?php include 'footer.php'; ?>
