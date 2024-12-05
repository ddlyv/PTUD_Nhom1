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
        <h2 class="text-center mb-4">Chỉnh Sửa Tài Khoản</h2>
        
        <form action="process_form.php" method="POST" enctype="multipart/form-data">
            <!-- Họ và Tên -->
            <div class="form-group">
                <label for="ho_ten">Họ và Tên</label>
                <input type="text" class="form-control" id="ho_ten" name="ho_ten" required>
            </div>

            <!-- Ngày sinh -->
            <div class="form-group">
                <label for="ngay_sinh">Ngày sinh</label>
                <input type="date" class="form-control" id="ngay_sinh" name="ngay_sinh" required>
            </div>

            <!-- Số điện thoại -->
            <div class="form-group">
                <label for="so_dien_thoai">Số điện thoại</label>
                <input type="tel" class="form-control" id="so_dien_thoai" name="so_dien_thoai" required>
            </div>

            <!-- Giới tính -->
            <div class="form-group">
                <label for="gioi_tinh">Giới tính</label>
                <select class="form-control" id="gioi_tinh" name="gioi_tinh" required>
                    <option value="">Chọn giới tính</option>
                    <option value="Nam">Nam</option>
                    <option value="Nữ">Nữ</option>
                    <option value="Khác">Khác</option>
                </select>
            </div>

            <!-- Email -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>

            <!-- Địa chỉ -->
            <div class="form-group">
                <label for="dia_chi">Địa chỉ</label>
                <input type="text" class="form-control" id="dia_chi" name="dia_chi" required>
            </div>

            <!-- Ảnh đại diện -->
            <div class="form-group">
                <label for="anh_dai_dien">Ảnh đại diện</label>
                <input type="file" class="form-control-file" id="anh_dai_dien" name="anh_dai_dien" accept="image/*">
            </div>

            <!-- Nút submit -->
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-success">Lưu Tài Khoản</button>
                <button type="reset" class="btn btn-secondary">Làm Mới</button>
            </div>
        </form>
    </div>
</div>

<?php include 'footer.php'; ?>
