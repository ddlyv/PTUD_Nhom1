<?php include 'header.php'; ?>


    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">PHIẾU XÉT NGHIỆM</p>
        </div>
        <div class="them">
            <p class="them_cuthe"><a href="themPhieuXetNghiem.php">THÊM PHIẾU XÉT NGHIỆM</a></p>
        </div>
        <form id="form1" name="form1" method="post">
            <table width="1400" border="1" align="center" cellpadding="10" cellspacing="0">
            <tbody>
                <tr align="center" valign="middle">
                    <td class="title" align="center" valign="middle">STT</td>
                    <td class="title">Mã phiếu</td>
                    <td class="title">Tên bệnh nhân</td>
                    <td class="title">Tên loại xét nghiệm</td>
                    <td class="title">Kết quả xét nghiệm</td>
                    <td class="title">Ngày xét nghiệm</td>
                    <td class="title">Giờ xét nghiệm</td>
                    <td class="title">Ngày tạo</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" valign="middle">1</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center" class="sua"><a href="suaPhieuXetNghiem.php"><input type="submit" name="nut" id="nut" value="Sửa"></a></td>
                    <td align="center" class="sua"><input type="submit" name="nut" id="nut" value="Xóa"></td>
                </tr>
                </tbody>
            </table>
            <div class="button">
                <input type="submit" name="nut" id="nut" value="Quay lại">
                <input type="submit" name="nut" id="nut" value="Xong">
            </div>
        </form>
        
    </div>


<?php include 'footer.php'; ?>