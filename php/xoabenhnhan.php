<?php
include 'db_connection.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Xóa bệnh nhân
    $sql = "DELETE FROM benhnhan WHERE maBenhNhan='$id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");  // Quay lại trang danh sách bệnh nhân
        exit;
    } else {
        echo "Lỗi khi xóa: " . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Bệnh Nhân</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2 class="text-center">Xóa Bệnh Nhân</h2>

    <?php if (isset($message)) { ?>
        <div class="alert alert-success"><?php echo $message; ?></div>
    <?php } ?>

    <a href="hienthidanhsachbenhnhan.php" class="btn btn-secondary">Trở lại danh sách bệnh nhân</a>
</div>

</body>
</html>