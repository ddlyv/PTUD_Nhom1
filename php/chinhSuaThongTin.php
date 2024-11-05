<?php include 'header.php'; ?>


    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">CHỈNH SỬA THÔNG TIN</p>
        </div>
        <form id="form1" name="form1" method="post">
            <table width="1200" border="1" align="center" cellpadding="10" cellspacing="0">
            <tbody>
                <tr>
                    <td class="title" width="214" align="center" valign="middle">Tên bệnh nhân</td>
                    <td width="940"><input name="txttenbenhnhan" type="text" id="txttenbenhnhan" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Ngày sinh</td>
                    <td><input type="date" name="ngaysinh" id="ngaysinh"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Số điện thoại</td>
                    <td><input name="txtsdt" type="text" id="txtsdt" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Giới tính</td>
                    <td><label for="gioitinh">Select:</label>
                    <select name="gioitinh" id="gioitinh">
                        <option value="1">chose</option>
                        <option value="2">Nam</option>
                        <option value="3">Nữ</option>
                        <option value="4">Khác</option>
                    </select></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Email</td>
                    <td><input name="txtemail" type="text" id="txtemail" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Địa chỉ</td>
                    <td><input name="txtdiachi" type="text" id="txtdiachi" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Ảnh đại diện</td>
                    <td><input type="file" name="fileField" id="fileField"></td>
                </tr>
            </tbody>
            </table>
            <div class="button">
                <input type="submit" name="nut" id="nut" value="Quay lại">
                <input type="submit" name="nut" id="nut" value="Lưu">
            </div>
        </form>
        
    </div>


<?php include 'footer.php'; ?>