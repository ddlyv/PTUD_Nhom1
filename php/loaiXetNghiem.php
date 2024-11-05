<?php include 'header.php'; ?>


    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">LOẠI XÉT NGHIỆM</p>
        </div>
        <div class="them">
            <p class="them_cuthe"><a href="themLoaiXetNghiem.php">THÊM LOẠI XÉT NGHIỆM</a></p>
        </div>
        <form id="form1" name="form1" method="post">
            <table width="800" border="1" align="center" cellpadding="10" cellspacing="0">
            <tbody>
                <tr align="center" valign="middle">
                    <td class="title" width="63" align="center" valign="middle">STT</td>
                    <td class="title" width="107">Mã loại</td>
                    <td class="title" width="265">Tên loại xét nghiệm</td>
                    <td width="42">&nbsp;</td>
                    <td width="42">&nbsp;</td>
                </tr>
                <tr>
                    <td align="center" valign="middle">1</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td align="center" class="sua" valign="middle"><a href="suaLoaiXetNghiem.php"><input type="submit" name="nut" id="nut" value="Sửa"></a></td>
                    <td align="center" class="sua" valign="middle"><input type="submit" name="nut" id="nut" value="Xóa"></td>
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