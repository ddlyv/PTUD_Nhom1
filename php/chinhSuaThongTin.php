<?php include 'header.php'; ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">CHỈNH SỬA THÔNG TIN</p>
        </div>
        <form id="formcstt" name="formcstt" method="post">
            <div class="form-group row mt-2 mb-3">
                <label class="control-label col-md-2" for="tenbenhnhan">Tên bệnh nhân:</label>
                <input class="col-md-9" name="txttenbenhnhan" type="text" id="txttenbenhnhan"  placeholder="Nhập tên bệnh nhân ...">
            </div>
            <div class="form-group row mt-2 mb-3">
                <label class="control-label col-md-2" for="ngaysinh">Ngày sinh:</label>               
                <input class="col-md-9" type="date" id="ngaysinh" name="ngaysinh">   
            </div>
            <div class="form-group row mt-2 mb-3">        
                <label for="sdt" class="control-label col-md-2">Số điện thoại:</label>
                
                    <input class="col-md-9" placeholder="Nhập số điện thoại ..." name="txtsdt" type="text" id="txtsdt" >
                
            </div>
            <div class="form-group row mt-2 mb-3">        
            <label class="control-label col-md-2" for="gioitinh">Giới tính:</label>
                
                    <select class="col-md-9" name="gioitinh" id="gioitinh">
                        <option value="1">Chose</option>
                        <option value="2">Nam</option>
                        <option value="3">Nữ</option>
                        <option value="4">Khác</option>
                    </select>
                
            </div>
            <div class="form-group row mt-2 mb-3">
                <label class="control-label col-md-2" for="email">Email:</label>
                
                    <input class="col-md-9" type="text" id="txtemail" placeholder="Nhập email ..." name="txtemail">
               
            </div>
            <div class="form-group row mt-2 mb-3">
                <label class="control-label col-md-2" for="diachi">Địa chỉ:</label>
               
                    <input class="col-md-9" type="text" id="txtdiachi" placeholder="Nhập địa chỉ ..." name="txtdiachi">
                
            </div>
            <div class="form-group row mt-2 mb-3">
                <label class="control-label col-md-2" for="email">Ảnh đại diện:</label>
                
                    <input class="col-md-9" type="file" name="file" id="file">
                
            </div>
        </form>
        <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" id="finishButton" value="Lưu">
        </div>
    </div>
<?php include 'footer.php'; ?>