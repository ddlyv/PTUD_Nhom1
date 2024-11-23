<?php include 'header.php'; ?>

<link rel="stylesheet" href="../css/giaodienmc.css">

<div class="row">
    <div class="tenChucNang">
            <p class="tenChucNang_cuthe">DANH SÁCH BÁC SĨ</p>
</div>
    <!-- Bảng Danh Sách Bác Sĩ -->
    <div class="col-lg-12">
        
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Tên Bác Sĩ</th>
                    <th>Chuyên Khoa</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <td>Bác sĩ A</td>
                    <td>Khoa ngoại</td>
                    <td>0309747487</td>
                    <td>natteam1998@gmail.com</td>
                    <td>1234567</td>
                    <td>
                        <a href="#">Sửa</a> |
                        <a href="#">Xóa</a>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
<div class="tenChucNang">
            <p class="tenChucNang_cuthe">DANH SÁCH NHÂN VIÊN</p>
</div>
    <!-- Bảng Danh Sách Nhân Viên -->
    <div class="col-lg-12">
        <table class="table">
            <thead class="table-light">
                <tr>
                    <th>Tên Nhân Viên</th>
                    <th>Chuyên Khoa</th>
                    <th>Số Điện Thoại</th>
                    <th>Email</th>
                    <th>Địa Chỉ</th>
                    <th>Hành Động</th>
                </tr>
            </thead>
            <tbody>
                <?php for ($i = 0; $i < 3; $i++): ?>
                <tr>
                    <td>Nhân viên A</td>
                    <td>Khoa ngoại</td>
                    <td>0309747487</td>
                    <td>natteam1998@gmail.com</td>
                    <td>1234567</td>
                    <td>
                        <a href="#">Sửa</a> |
                        <a href="#">Xóa</a>
                    </td>
                </tr>
                <?php endfor; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include 'footer.php'; ?>
