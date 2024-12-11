<?php include 'header.php';
?>
<?php include 'config.php'; ?>
<?php
// Kết nối với cơ sở dữ liệu "benhvien"
$conn = new mysqli("localhost", "root", "", "benhvien");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối không thành công: " . $conn->connect_error);
}

// Lấy danh sách bác sĩ từ bảng 'bacsi'
$sql = "SELECT * FROM bacsi";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý tài khoản bác sĩ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Quản Lý Tài Khoản Bác Sĩ</h1>

    <!-- Nút Thêm -->
    <div class="text-right mb-3">
        <button class="btn btn-success" data-toggle="modal" data-target="#addDoctorModal">Thêm Tài Khoản Bác Sĩ</button>
    </div>

    <!-- Bảng -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Mã Bác Sĩ</th>
            <th>Họ Tên Đệm</th>
            <th>Tên</th>
            <th>Ngày Sinh</th>
            <th>Số Điện Thoại</th>
            <th>Giới Tính</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Hành Động</th>
        </tr>
        </thead>
        <tbody>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($account = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $account['maBacSi'] ?></td>
                    <td><?= $account['hoTenDem'] ?></td>
                    <td><?= $account['ten'] ?></td>
                    <td><?= $account['ngaySinh'] ?></td>
                    <td><?= $account['soDienThoai'] ?></td>
                    <td><?= $account['gioiTinh'] ?></td>
                    <td><?= $account['email'] ?></td>
                    <td><?= $account['diachi'] ?></td>
                    <td>
                        <!-- Nút Sửa -->
                        <a href="#" class="btn btn-primary btn-sm edit-btn"
                            data-id="<?= $account['maBacSi'] ?>"
                            data-hotendem="<?= $account['hoTenDem'] ?>"
                            data-ten="<?= $account['ten'] ?>"
                            data-ngaysinh="<?= $account['ngaySinh'] ?>"
                            data-sodienthoai="<?= $account['soDienThoai'] ?>"
                            data-gioitinh="<?= $account['gioiTinh'] ?>"
                            data-email="<?= $account['email'] ?>"
                            data-diachi="<?= $account['diachi'] ?>"
                            data-toggle="modal" data-target="#editDoctorModal">Sửa</a>

                        <!-- Nút Xóa -->
                        <a href="xóabacsi.php?id=<?= $account['maBacSi'] ?>" class="btn btn-danger btn-sm"
                            onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>

                    </td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="9" class="text-center">Không có dữ liệu</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<!-- Modal Thêm -->
<div class="modal fade" id="addDoctorModal" tabindex="-1" role="dialog" aria-labelledby="addDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDoctorModalLabel">Thêm Tài Khoản Bác Sĩ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="thembacsi.php" method="POST">
                    <!-- Form Thêm -->
                    <div class="form-group">
                        <label>Họ Tên Đệm</label>
                        <input type="text" class="form-control" name="hoTenDem" required>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="ten" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input type="date" class="form-control" name="ngaySinh" required>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="soDienThoai" required>
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <select class="form-control" name="gioiTinh" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" required>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <textarea class="form-control" name="diachi" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Sửa -->
<div class="modal fade" id="editDoctorModal" tabindex="-1" role="dialog" aria-labelledby="editDoctorModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editDoctorModalLabel">Sửa Tài Khoản Bác Sĩ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="suabacsi.php" method="POST">
                    <!-- Form Sửa -->
                    <input type="hidden" name="id" id="edit-id">
                    <div class="form-group">
                        <label>Họ Tên Đệm</label>
                        <input type="text" class="form-control" name="hoTenDem" id="edit-hoTenDem" required>
                    </div>
                    <div class="form-group">
                        <label>Tên</label>
                        <input type="text" class="form-control" name="ten" id="edit-ten" required>
                    </div>
                    <div class="form-group">
                        <label>Ngày Sinh</label>
                        <input type="date" class="form-control" name="ngaySinh" id="edit-ngaySinh" required>
                    </div>
                    <div class="form-group">
                        <label>Số Điện Thoại</label>
                        <input type="text" class="form-control" name="soDienThoai" id="edit-soDienThoai" required>
                    </div>
                    <div class="form-group">
                        <label>Giới Tính</label>
                        <select class="form-control" name="gioiTinh" id="edit-gioiTinh" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" id="edit-email" required>
                    </div>
                    <div class="form-group">
                        <label>Địa Chỉ</label>
                        <textarea class="form-control" name="diachi" id="edit-diachi" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                document.getElementById('edit-id').value = this.getAttribute('data-id');
                document.getElementById('edit-hoTenDem').value = this.getAttribute('data-hotendem');
                document.getElementById('edit-ten').value = this.getAttribute('data-ten');
                document.getElementById('edit-ngaySinh').value = this.getAttribute('data-ngaysinh');
                document.getElementById('edit-soDienThoai').value = this.getAttribute('data-sodienthoai');
                document.getElementById('edit-gioiTinh').value = this.getAttribute('data-gioitinh');
                document.getElementById('edit-email').value = this.getAttribute('data-email');
                document.getElementById('edit-diachi').value = this.getAttribute('data-diachi');
            });
        });
    });
</script>
</body>
</html>
<?php include 'footer.php';
?>