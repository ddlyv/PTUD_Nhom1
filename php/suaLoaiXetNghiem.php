<?php include 'header.php'; ?>


    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">SỬA LOẠI XÉT NGHIỆM</p>
        </div>
        <form id="form1" name="form1" method="post">
            <table width="1200" border="1" align="center" cellpadding="10" cellspacing="0">
                <tbody>
                <tr>
                    <td class="title" width="214" align="center" valign="middle">Mã loại</td>
                    <td width="940"><input readonly="readonly" name="txtmaloai" type="text" id="txtmaloai" size="130"></td>
                </tr>
                <tr>
                    <td class="title" align="center" valign="middle">Tên loại xét nghiệm</td>
                    <td><input name="txttenloaixetnghiem" type="text" id="txttenloaixetnghiem" size="130"></td>
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