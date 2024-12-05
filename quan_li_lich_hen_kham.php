<?php include 'header.php'; ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h3 class="text-center mb-4">Quản Lý Lịch Hẹn Khám</h3>

    <!-- Nút mở modal thêm lịch hẹn -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addAppointmentModal">
            Thêm Lịch Hẹn
        </button>
    </div>

    <!-- Bảng danh sách lịch hẹn -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Bệnh nhân</th>
                    <th>Ngày hẹn</th>
                    <th>Giờ hẹn</th>
                    <th>Bác sĩ</th>
                    <th>Ghi chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Dữ liệu mẫu tĩnh -->
                <tr>
                    <td>Nguyễn Văn A</td>
                    <td>2024-11-10</td>
                    <td>09:00</td>
                    <td>Dr. Trần Công C</td>
                    <td>Kiểm tra định kỳ</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAppointmentModal">Sửa</button>
                        <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                        <button type="button" class="btn btn-info btn-sm">Chuyển sang lịch khám</button>
                    </td>
                </tr>
                <tr>
                    <td>Lê Thị B</td>
                    <td>2024-11-11</td>
                    <td>10:30</td>
                    <td>Dr. Nguyễn Văn A</td>
                    <td>Tư vấn chuyên khoa</td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editAppointmentModal">Sửa</button>
                        <button type="button" class="btn btn-danger btn-sm">Xóa</button>
                        <button type="button" class="btn btn-info btn-sm">Chuyển sang lịch khám</button>
                    </td>
                </tr>
                <!-- Thêm nhiều dòng dữ liệu tương tự -->
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Thêm Lịch Hẹn -->
<div class="modal fade" id="addAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="addAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addAppointmentModalLabel">Thêm Lịch Hẹn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="process_add_appointment.php" method="POST">
                    <div class="form-group">
                        <label for="benh_nhan">Bệnh nhân</label>
                        <input type="text" class="form-control w-100" id="benh_nhan" name="benh_nhan" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ngay_hen">Ngày hẹn</label>
                            <input type="date" class="form-control w-100" id="ngay_hen" name="ngay_hen" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gio_hen">Giờ hẹn</label>
                            <input type="time" class="form-control w-100" id="gio_hen" name="gio_hen" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bac_si">Bác sĩ</label>
                        <select class="form-control w-100" id="bac_si" name="bac_si" required>
                            <option value="1">Dr. Nguyễn Văn A</option>
                            <option value="2">Dr. Lê Thị B</option>
                            <option value="3">Dr. Trần Công C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea class="form-control w-100" id="ghi_chu" name="ghi_chu" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa Lịch Hẹn -->
<div class="modal fade" id="editAppointmentModal" tabindex="-1" role="dialog" aria-labelledby="editAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAppointmentModalLabel">Sửa Lịch Hẹn</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="process_edit_appointment.php" method="POST">
                    <input type="hidden" name="appointment_id" id="appointment_id">
                    <div class="form-group">
                        <label for="benh_nhan_edit">Bệnh nhân</label>
                        <input type="text" class="form-control w-100" id="benh_nhan_edit" name="benh_nhan" required>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="ngay_hen_edit">Ngày hẹn</label>
                            <input type="date" class="form-control w-100" id="ngay_hen_edit" name="ngay_hen" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="gio_hen_edit">Giờ hẹn</label>
                            <input type="time" class="form-control w-100" id="gio_hen_edit" name="gio_hen" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bac_si_edit">Bác sĩ</label>
                        <select class="form-control w-100" id="bac_si_edit" name="bac_si" required>
                            <option value="1">Dr. Nguyễn Văn A</option>
                            <option value="2">Dr. Lê Thị B</option>
                            <option value="3">Dr. Trần Công C</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="ghi_chu_edit">Ghi chú</label>
                        <textarea class="form-control w-100" id="ghi_chu_edit" name="ghi_chu" rows="3"></textarea>
                    </div>
                    <button type="button" class="btn btn-secondary">Hủy</button>
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>