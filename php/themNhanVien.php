<?php include 'header.php'; ?>

<link rel="stylesheet" href="../css/giaodienmc.css">
<div class="section1">
    <div class="tenChucNang">
        <p class="tenChucNang_cuthe">THÊM NHÂN VIÊN</p>
    </div>
    <form id="form1" name="form1" method="post">
        <table width="1200" border="1" align="center" cellpadding="10" cellspacing="0">
            <tbody>
                <tr>
                    <td class="title" width="214" align="center" valign="middle">Tên Nhân viên</td>
                    <td width="940"><input class="form-control" name="doctor_name" type="text" id="doctor_name"  placeholder="Nhập tên nhan vien"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Phòng ban</td>
                    <td><input class="form-control" name="specialty" type="text" id="specialty"  placeholder="Nhập chuyên khoa"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Số Điện Thoại</td>
                    <td><input class="form-control" name="phone" type="text" id="phone"  placeholder="Nhập số điện thoại"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Email</td>
                    <td><input class="form-control" name="email" type="email" id="email"  placeholder="Nhập email"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Địa Chỉ</td>
                    <td><input class="form-control" name="address" type="text" id="address"  placeholder="Nhập địa chỉ"></td>
                </tr>
            </tbody>
        </table>
        <div class="button">
 
            <input type="submit" name="save" id="save" value="Lưu">
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
