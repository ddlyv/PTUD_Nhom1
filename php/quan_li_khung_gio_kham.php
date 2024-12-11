<?php include 'header.php';
require_once __DIR__ . '/myclass/clquanlykhunggiokham.php';
require_once __DIR__ . '/myclass/clbacsi.php';
require_once __DIR__ . '/myclass/clbenhnhan.php';
require_once __DIR__ . '/myclass/cllichhen.php';
$quanlykhunggiokham = new clquanlykhunggiokham();
$bacsi = new clbacsi();
$benhnhan = new clbenhnhan();
$lichhen = new cllichhen();
$ds = $quanlykhunggiokham->getLichKham();
$dsbacsi = $bacsi->getbacSi();
$dsbenhnhan = $benhnhan->getBenhNhan();
$dslichhen = $lichhen->getLichHen();

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style>
    /* Căn giữa form và giới hạn chiều rộng */
    .table-container {
        max-width: 800px;
        margin: 20px auto;
    }
</style>



<div class="container mt-5">
    <!-- Nút mở modal thêm khung giờ -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#addScheduleModal">
            Thêm Khung Giờ Khám
        </button>
    </div>

    <!-- Danh sách khung giờ khám -->
    <div class="table-container">
        <h3 class="text-center mb-4">Danh Sách Khung Giờ Khám</h3>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ngày khám</th>
                    <th>Giờ bắt đầu</th>
                    <th>Bác sĩ phụ trách</th>
                    <th>Ghi chú</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ds as $key => $value): ?>
                    <tr>
                        <td><?= $value['ngayKham'] ?></td>
                        <td><?= $value['gioKham'] ?></td>
                        <td><?= $value['tenBacSi'] ?></td>
                        <td><?= $value['ghiChu'] ?></td>
                        <td>
                            <a href="#" class="btn btn-primary btn-sm edit-btn"
                                data-id="<?= $value['maLichKham'] ?>"
                                data-ngay-kham="<?= $value['ngayKham'] ?>"
                                data-gio-bat-dau="<?= $value['tenBenhNhan'] ?>"
                                data-ten-bac-si="<?= $value['tenBacSi'] ?>"
                                data-ghi-chu="<?= $value['ghiChu'] ?>"
                                data-toggle="modal"
                                data-target="#editScheduleModal">
                                Sửa
                            </a>
                            <a href="./delete-schedule?id=<?= $value['maLichKham'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal thêm khung giờ khám -->
<div class="modal fade" id="addScheduleModal" tabindex="-1" role="dialog" aria-labelledby="addScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Đổi modal-lg thành modal-xl để modal rộng hơn -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Thêm Khung Giờ Khám</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./add-schedule" method="POST">
                    <!-- Ngày khám -->
                    <div class="form-group">
                        <label for="ngay_kham">Ngày khám</label>
                        <input type="date" class="form-control" id="ngay_kham" name="ngay_kham" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Giờ bắt đầu -->
                    <div class="form-group">
                        <label for="gio_bat_dau">Giờ bắt đầu</label>
                        <input type="time" class="form-control" id="gio_bat_dau" name="gio_bat_dau" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Bác sĩ phụ trách -->
                    <div class="form-group">
                        <label for="bac_si">Bác sĩ phụ trách</label>
                        <select class="form-control" id="bac_si" name="bac_si" required style="height: 45px; width: 600px;">
                            <option value="">Chọn bác sĩ</option>
                            <?php foreach ($dsbacsi as $key => $value): ?>
                                <option value="<?= $value['maBacSi'] ?>"><?= $value['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Lịch hẹn</label>
                        <select class="form-control" id="lich_hen" name="lich_hen" required style="height: 45px; width: 600px;">
                            <option value="">Chọn lịch hẹn</option>
                            <?php
                            foreach ($dslichhen as $key => $value) {
                                echo '<option value="' . $value['maLichHen'] . '">' . $value['maLichHen'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Bệnh nhân</label>
                        <select class="form-control" id="benh_nhan" name="benh_nhan" required style="height: 45px; width: 600px;">
                            <option value="">Chọn bệnh nhân</option>
                            <?php
                            foreach ($dsbenhnhan as $key => $value) {
                                echo '<option value="' . $value['maBenhNhan'] . '">' . $value['ten'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Ghi chú -->
                    <div class="form-group">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3" style="height: 100px;"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="ghi_chu">Trạng thái</label>
                        <textarea class="form-control" id="ghi_chu" name="trang_thai" rows="3" style="height: 100px;"></textarea>
                    </div>

                   
                    <div class="text-center mt-4">
                        <button type="submit" value="add_schedule" class="btn btn-success">Lưu Khung Giờ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Modal sửa khung giờ khám -->
<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Đổi modal-lg thành modal-xl để modal rộng hơn -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Sửa Khung Giờ Khám</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./edit-schedule" method="POST">
                    <input type="hidden" id="edit_id" name="id">
                    <!-- Ngày khám -->
                    <div class="form-group">
                        <label for="ngay_kham">Ngày khám</label>
                        <input type="date" class="form-control" id="edit_ngay_kham" name="ngay_kham" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Giờ bắt đầu -->
                    <div class="form-group">
                        <label for="gio_bat_dau">Giờ bắt đầu</label>
                        <input type="time" class="form-control" id="gio_bat_dau" name="gio_bat_dau" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Bác sĩ phụ trách -->
                    <div class="form-group">
                        <label for="bac_si">Bác sĩ phụ trách</label>
                        <select class="form-control" id="bac_si" name="bac_si" required style="height: 45px; width: 600px;">
                            <option value="">Chọn bác sĩ</option>
                            <?php foreach ($dsbacsi as $key => $value): ?>
                                <option value="<?= $value['maBacSi'] ?>"><?= $value['ten'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Lịch hẹn</label>
                        <select class="form-control" id="lich_hen" name="lich_hen" required style="height: 45px; width: 600px;">
                            <option value="">Chọn lịch hẹn</option>
                            <?php
                            foreach ($dslichhen as $key => $value) {
                                echo '<option value="' . $value['maLichHen'] . '">' . $value['maLichHen'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Bệnh nhân</label>
                        <select class="form-control" id="benh_nhan" name="benh_nhan" required style="height: 45px; width: 600px;">
                            <option value="">Chọn bệnh nhân</option>
                            <?php
                            foreach ($dsbenhnhan as $key => $value) {
                                echo '<option value="' . $value['maBenhNhan'] . '">' . $value['ten'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>

                    <!-- Ghi chú -->
                    <div class="form-group">
                        <label for="ghi_chu">Ghi chú</label>
                        <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3" style="height: 100px;"></textarea>
                    </div>

                    <!-- Nút submit -->
                    <div class="text-center mt-4">
                        <button type="submit" value="add_schedule" class="btn btn-success">Lưu Khung Giờ</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                // const ngayKham = this.getAttribute('data-ngay-kham');
                // const gioBatDau = this.getAttribute('data-gio-bat-dau');
                // const ghiChu = this.getAttribute('data-ghi-chu');

                document.getElementById('edit_id').value = id;
                // document.getElementById('edit_ngay_kham').value = ngayKham;
                // document.getElementById('edit_gio_bat_dau').value = gioBatDau;
                // document.getElementById('edit_ghi_chu').value = ghiChu;
            });
        });
    });
</script>


<?php include 'footer.php'; ?>