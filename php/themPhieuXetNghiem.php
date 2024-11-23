<?php include 'header.php'; ?>


    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">THÊM PHIẾU XÉT NGHIỆM</p>
        </div>
        <form id="form1" name="form1" method="post">
            <table width="1200" border="1" align="center" cellpadding="10" cellspacing="0">
                <tbody>
                <tr>
                    <td class="title" width="214" align="center" valign="middle">Tên bệnh nhân</td>
                    <td width="940"><input name="txttenbenhnhan" type="text" id="txttenbenhnhan" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Tên loại xét nghiệm</td>
                    <td><input name="txttenloaixetnghiem" type="text" id="txttenloaixetnghiem" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Kết quả xét nghiệm</td>
                    <td><input name="txtkqxn" type="text" id="txtkqxn" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Ngày xét nghiệm</td>
                    <td><input type="date" name="date" id="date"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Giờ xét nghiệm</td>
                    <td><input type="time" name="time" id="time"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Ngày tạo </td>
                    <td><input type="date" name="date2" id="date2"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Trạng thái</td>
                    <td><label for="select">Select:</label>
                    <select name="select" id="select">
                        <option value="1">Đang xử lý</option>
                        <option value="2" selected="selected">Hoàn thành</option>
                        <option value="3">Hủy bỏ</option>
                    </select></td>
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