<?php include 'header.php';
?>
<?php
include 'db_connection.php';

// Lấy danh sách bệnh nhân từ cơ sở dữ liệu
$sql = "SELECT * FROM benhnhan";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Bệnh Nhân</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .tab-content {
            margin-top: 20px;
        }
        .tab-pane {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center">Quản lý Bệnh Nhân</h2>

    <!-- Tab navigation -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="add-tab" data-toggle="tab" href="#add" role="tab" aria-controls="add" aria-selected="true">Thêm Bệnh Nhân</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="edit-tab" data-toggle="tab" href="#edit" role="tab" aria-controls="edit" aria-selected="false">Sửa Bệnh Nhân</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="delete-tab" data-toggle="tab" href="#delete" role="tab" aria-controls="delete" aria-selected="false">Xóa Bệnh Nhân</a>
        </li>
    </ul>

    <!-- Tab content -->
    <div class="tab-content" id="myTabContent">
        
        <!-- Thêm Bệnh Nhân -->
        <div class="tab-pane fade show active" id="add" role="tabpanel" aria-labelledby="add-tab">
            <h4>Thêm Bệnh Nhân</h4>
            <form action="thembenhnhan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ và Tên Đệm:</label>
                    <input type="text" name="hoTenDem" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Tên:</label>
                    <input type="text" name="ten" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Địa Chỉ:</label>
                    <input type="text" name="diaChi" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại:</label>
                    <input type="text" name="soDienThoai" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh:</label>
                    <input type="date" name="ngaySinh" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Giới Tính:</label>
                    <select name="gioiTinh" class="form-control" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh Đại Diện:</label>
                    <input type="file" name="anhDaiDien" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>

        <!-- Sửa Bệnh Nhân -->
        <div class="tab-pane fade" id="edit" role="tabpanel" aria-labelledby="edit-tab">
            <h4>Sửa Bệnh Nhân</h4>
            <form action="suabenhnhan.php" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Họ và Tên Đệm:</label>
                    <input type="text" name="hoTenDem" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Tên:</label>
                    <input type="text" name="ten" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Địa Chỉ:</label>
                    <input type="text" name="diaChi" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Số Điện Thoại:</label>
                    <input type="text" name="soDienThoai" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Ngày Sinh:</label>
                    <input type="date" name="ngaySinh" class="form-control" value="Giá trị cũ" required>
                </div>
                <div class="form-group">
                    <label>Giới Tính:</label>
                    <select name="gioiTinh" class="form-control" required>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Ảnh Đại Diện:</label>
                    <input type="file" name="anhDaiDien" class="form-control">
                </div>
                <button type="submit" class="btn btn-warning">Cập nhật</button>
            </form>
        </div>

        <!-- Xóa Bệnh Nhân -->
        <div class="tab-pane fade" id="delete" role="tabpanel" aria-labelledby="delete-tab">
            <h4>Xóa Bệnh Nhân</h4>
            <form action="xoabenhnhan.php" method="POST">
                <div class="form-group">
                    <label>Chọn Bệnh Nhân cần xóa:</label>
                    <select name="maBenhNhan" class="form-control" required>
                        <!-- Giả sử bạn sẽ lấy danh sách bệnh nhân từ cơ sở dữ liệu và hiển thị ở đây -->
                        <option value="1">Bệnh Nhân 1</option>
                        <option value="2">Bệnh Nhân 2</option>
                        <option value="3">Bệnh Nhân 3</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</button>
            </form>
        </div>

    </div>
</div>

<!-- Bootstrap JS và jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php include 'footer.php';
?>