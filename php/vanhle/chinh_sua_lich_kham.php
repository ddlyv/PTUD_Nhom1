<?php
include 'header.php';
require_once __DIR__ . '/myclass/clquanlykhunggiokham.php';
require_once __DIR__ . '/myclass/clbacsi.php';
$bacsi = new clbacsi();
$dsbacsi = $bacsi->getbacSi();
$quanlykhunggiokham = new clquanlykhunggiokham();
$id = $_GET['id'];
$data = $quanlykhunggiokham->getID($id);

$ngayKham = date('Y-m-d', strtotime($data[0]['ngaykham']));
if (empty($data)) {
    echo "No data found!";
    exit;
}
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h3 class="text-center mb-4">Chỉnh Sửa Lịch Khám</h3>

    <form action="./edit-khunggiokham" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="benh_nhan" value="<?php echo $data[0]['maBenhNhan']; ?>">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ngay_kham">Ngày khám</label>
                <input type="date" class="form-control" id="ngay_kham" name="ngay_kham" required value="<?php echo $ngayKham; ?>">
            </div>
            <div class="form-group col-md-6">
                <label for="gio_kham">Giờ khám</label>
                <input type="time" class="form-control" id="gio_kham" name="gio_bat_dau" required value="<?php echo $data[0]['gioKham']; ?>">
            </div>
            <div class="form-group col-md-6">
                <input type="hidden" class="form-control" id="gio_kham" name="lich_hen" required value="1">
            </div>
        </div>

        <div class="form-group">
            <label for="bac_si">Bác sĩ phụ trách</label>
            <select class="form-control" id="bac_si" name="bac_si" required>
                <option value="">Chọn bác sĩ</option>
                <?php foreach ($dsbacsi as $key => $value): ?>
                    <option value="<?= $value['maBacSi'] ?>" <?php echo ($data[0]['maBacSi'] === $value['maBacSi']) ? 'selected' : ''; ?>><?= $value['ten'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="ghi_chu">Ghi chú</label>
            <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3">
                <?php echo $data[0]['ghiChu']; ?>
            </textarea>
        </div>

        <div class="form-group">
            <label for="trang_thai">Trạng thái</label>
            <select class="form-control" id="trang_thai" name="trang_thai" required>
                <option value="0" <?php echo ($data[0]['trangthai'] === 'Đang tiến hành') ? 'selected' : ''; ?>>Đang tiến hành</option>
                <option value="1" <?php echo ($data[0]['trangthai'] === 'Hoàn thành') ? 'selected' : ''; ?>>Hoàn thành</option>
                <option value="2" <?php echo ($data[0]['trangthai'] === 'Hủy') ? 'selected' : ''; ?>>Hủy</option>
            </select>
        </div>

        <div class="text-center mt-4">
            <button type="button" onclick="window.history.back();" class="btn btn-secondary">Quay lại</button>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
        </div>
    </form>
</div>

<?php include '../layout/footer.php'; ?>
