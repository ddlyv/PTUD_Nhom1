<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h3 class="text-center mb-4">Chỉnh Sửa Hẹn Lịch Khám</h3>

    <!-- Biểu mẫu chỉnh sửa lịch khám -->
    <form action="process_edit_schedule.php" method="POST">
        <input type="hidden" name="schedule_id" value="<?php echo $_GET['id']; ?>">

        <div class="form-group">
            <label for="benh_nhan">Bệnh nhân</label>
            <input type="text" class="form-control" id="benh_nhan" name="benh_nhan" value="Nguyễn Văn A" disabled>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ngay_kham">Ngày khám</label>
                <input type="date" class="form-control" id="ngay_kham" name="ngay_kham" required value="2024-11-15">
            </div>
            <div class="form-group col-md-6">
                <label for="gio_kham">Giờ khám</label>
                <input type="time" class="form-control" id="gio_kham" name="gio_kham" required value="09:00">
            </div>
        </div>

        <div class="form-group">
            <label for="bac_si">Bác sĩ phụ trách</label>
            <select class="form-control" id="bac_si" name="bac_si" required>
                <option value="1">Dr. Nguyễn Văn A</option>
                <option value="2">Dr. Lê Thị B</option>
                <option value="3">Dr. Trần Công C</option>
            </select>
        </div>

        <div class="form-group">
            <label for="ghi_chu">Ghi chú</label>
            <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">Kiểm tra định kỳ</textarea>
        </div>

        <!-- Thêm trường Trạng thái -->
        <div class="form-group">
            <label for="trang_thai">Trạng thái</label>
            <select class="form-control" id="trang_thai" name="trang_thai" required>
                <option value="Đang tiến hành">Đang tiến hành</option>
                <option value="Hoàn thành">Hoàn thành</option>
                <option value="Hủy">Hủy</option>
            </select>
        </div>

        <!-- Nút hành động -->
        <div class="text-center mt-4">
            <button type="button" onclick="window.history.back();" class="btn btn-secondary">Quay lại</button>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
