<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>
    /* Căn giữa form và giới hạn chiều rộng */
    .form-container {
        max-width: 600px;
        margin: 0 auto;
        background-color: #f8f9fa;
        padding: 30px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4">Chỉnh Khung Giờ Khám</h2>
        
        <form action="process_schedule.php" method="POST">
            <!-- Ngày khám -->
            <div class="form-group">
                <label for="ngay_kham">Ngày khám</label>
                <input type="date" class="form-control" id="ngay_kham" name="ngay_kham" required>
            </div>

            <!-- Giờ bắt đầu -->
            <div class="form-group">
                <label for="gio_bat_dau">Giờ bắt đầu</label>
                <input type="time" class="form-control" id="gio_bat_dau" name="gio_bat_dau" required>
            </div>

            <!-- Giờ kết thúc -->
            <div class="form-group">
                <label for="gio_ket_thuc">Giờ kết thúc</label>
                <input type="time" class="form-control" id="gio_ket_thuc" name="gio_ket_thuc" required>
            </div>

            <!-- Bác sĩ phụ trách -->
            <div class="form-group">
                <label for="bac_si">Bác sĩ phụ trách</label>
                <select class="form-control" id="bac_si" name="bac_si" required>
                    <option value="">Chọn bác sĩ</option>
                    <option value="1">Dr. Nguyễn Văn A</option>
                    <option value="2">Dr. Lê Thị B</option>
                    <option value="3">Dr. Trần Công C</option>
                    <option value="4">Dr. Phạm Văn D</option>
                    <option value="5">Dr. Hoàng Thị E</option>
                </select>
            </div>

            <!-- Ghi chú -->
            <div class="form-group">
                <label for="ghi_chu">Ghi chú</label>
                <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
            </div>

            <!-- Nút submit -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Lưu Khung Giờ</button>
                <button type="reset" class="btn btn-secondary">Làm Mới</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
