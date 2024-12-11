<?php
include 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $hoTenDem = $_POST['hoTenDem'];
    $ten = $_POST['ten'];
    $email = $_POST['email'];
    $diaChi = $_POST['diaChi'];
    $soDienThoai = $_POST['soDienThoai'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $anhDaiDien = $_FILES['anhDaiDien']['name'];

    // Kiểm tra nếu có ảnh được upload
    if ($_FILES['anhDaiDien']['error'] == 0) {
        move_uploaded_file($_FILES['anhDaiDien']['tmp_name'], 'uploads/' . $anhDaiDien);
    } else {
        // Nếu không có ảnh mới, giữ lại ảnh cũ
        $anhDaiDien = $_POST['current_anhDaiDien']; // Trả về ảnh cũ
    }

    // Cập nhật thông tin vào cơ sở dữ liệu
    $sql = "UPDATE benhnhan SET hoTenDem='$hoTenDem', ten='$ten', email='$email', diaChi='$diaChi', soDienThoai='$soDienThoai', 
            ngaySinh='$ngaySinh', gioiTinh='$gioiTinh', anhDaiDien='$anhDaiDien' WHERE maBenhNhan='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Quay lại trang danh sách bệnh nhân
        exit;
    } else {
        echo "Lỗi khi cập nhật: " . $conn->error;
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM benhnhan WHERE maBenhNhan='$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $benhnhan = $result->fetch_assoc();
    } else {
        echo "Không tìm thấy bệnh nhân!";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Bệnh Nhân</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="text-center">Sửa Thông Tin Bệnh Nhân</h2>

    <!-- Form sửa bệnh nhân -->
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $benhnhan['maBenhNhan']; ?>">

        <div class="form-group">
            <label for="hoTenDem">Họ và Tên Đệm</label>
            <input type="text" class="form-control" id="hoTenDem" name="hoTenDem" value="<?php echo $benhnhan['hoTenDem']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ten">Tên</label>
            <input type="text" class="form-control" id="ten" name="ten" value="<?php echo $benhnhan['ten']; ?>" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?php echo $benhnhan['email']; ?>" required>
        </div>
        <div class="form-group">
            <label for="diaChi">Địa Chỉ</label>
            <input type="text" class="form-control" id="diaChi" name="diaChi" value="<?php echo $benhnhan['diaChi']; ?>" required>
        </div>
        <div class="form-group">
            <label for="soDienThoai">Số Điện Thoại</label>
            <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?php echo $benhnhan['soDienThoai']; ?>" required>
        </div>
        <div class="form-group">
            <label for="ngaySinh">Ngày Sinh</label>
            <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?php echo $benhnhan['ngaySinh']; ?>" required>
        </div>
        <div class="form-group">
            <label for="gioiTinh">Giới Tính</label>
            <select class="form-control" id="gioiTinh" name="gioiTinh" required>
                <option value="Nam" <?php if($benhnhan['gioiTinh'] == 'Nam') echo 'selected'; ?>>Nam</option>
                <option value="Nữ" <?php if($benhnhan['gioiTinh'] == 'Nữ') echo 'selected'; ?>>Nữ</option>
            </select>
        </div>
        <div class="form-group">
            <label for="anhDaiDien">Ảnh Đại Diện</label>
            <input type="file" class="form-control" id="anhDaiDien" name="anhDaiDien">
            <img src="uploads/<?php echo $benhnhan['anhDaiDien']; ?>" width="100" alt="Ảnh Đại Diện">
            <input type="hidden" name="current_anhDaiDien" value="<?php echo $benhnhan['anhDaiDien']; ?>">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Cập Nhật Bệnh Nhân</button>
    </form>

    <br>
    <a href="hienthidanhsachbenhnhan.php" class="btn btn-secondary">Trở lại danh sách bệnh nhân</a>
</div>

</body>
</html>
