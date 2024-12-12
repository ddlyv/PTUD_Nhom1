<?php include '../layout/header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h3 class="text-center mb-4">Chuyển Lịch Hẹn Sang Khám</h3>
    <div class="row justify-content-center">
        <!-- Lịch hẹn khám (Bên trái) -->
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Lịch Hẹn</h5>

                    <div class="form-group">
                        <label for="benh_nhan_hen">Bệnh nhân</label>
                        <input type="text" class="form-control" id="benh_nhan_hen" value="Nguyễn Văn A" disabled>
                    </div>

                    <!-- Ngày và Giờ Hẹn trên cùng một hàng -->
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ngay_hen">Ngày hẹn</label>
                            <input type="date" class="form-control" id="ngay_hen" value="2024-11-10" disabled>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gio_hen">Giờ hẹn</label>
                            <input type="time" class="form-control" id="gio_hen" value="09:00" disabled>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bac_si_hen">Bác sĩ</label>
                        <input type="text" class="form-control" id="bac_si_hen" value="Dr. Trần Công C" disabled>
                    </div>

                    <div class="form-group">
                        <label for="benh_an_hen">Bệnh án</label>
                        <input type="text" class="form-control" id="benh_an_hen" value="Bệnh tim mạch" disabled>
                    </div>

                    <div class="form-group">
                        <label for="ghi_chu_hen">Ghi chú</label>
                        <textarea class="form-control" id="ghi_chu_hen" rows="3" disabled>Kiểm tra định kỳ</textarea>
                    </div>

                    <div class="form-group">
                        <label for="trang_thai_hen">Trạng thái</label>
                        <input type="text" class="form-control" id="trang_thai_hen" value="Đã xác nhận" disabled>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-1 d-flex align-items-center justify-content-center">
            <button type="button" class="btn btn-primary">Sang</button>
        </div>


        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title text-center">Lịch Khám</h5>

                    <div class="form-group">
                        <label for="benh_nhan_kham">Bệnh nhân</label>
                        <input type="text" class="form-control" id="benh_nhan_kham" value="Nguyễn Văn A" disabled>
                    </div>


                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ngay_kham">Ngày khám</label>
                            <input type="date" class="form-control" id="ngay_kham" name="ngay_kham" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gio_kham">Giờ khám</label>
                            <input type="time" class="form-control" id="gio_kham" name="gio_kham" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="bac_si_kham">Bác sĩ</label>
                        <select class="form-control" id="bac_si_kham" name="bac_si_kham" required>
                            <option value="1">Dr. Nguyễn Văn A</option>
                            <option value="2">Dr. Lê Thị B</option>
                            <option value="3">Dr. Trần Công C</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="benh_an_kham">Bệnh án</label>
                        <input type="text" class="form-control" id="benh_an_kham" value="Bệnh tim mạch" disabled>
                    </div>

                    <div class="form-group">
                        <label for="ghi_chu_kham">Ghi chú</label>
                        <textarea class="form-control" id="ghi_chu_kham" name="ghi_chu_kham" rows="3"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="trang_thai_kham">Trạng thái</label>
                        <select class="form-control" id="trang_thai_kham" name="trang_thai_kham">
                            <option value="Chưa xác nhận">Chưa xác nhận</option>
                            <option value="Đã xác nhận">Đã xác nhận</option>
                            <option value="Hoàn thành">Hoàn thành</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="text-center mt-4">
        <button type="button" class="btn btn-secondary">Quay lại</button>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</div>

<?php include '../layout/footer.php'; ?>
