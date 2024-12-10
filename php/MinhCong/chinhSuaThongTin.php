<title>Chỉnh sửa thông tin </title>
<?php include 'header.php'; ?>
<?php 
    include '../myclass/clsbenhnhan.php'; 
    $p=new benhnhan();
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">CHỈNH SỬA THÔNG TIN</p>
        </div>
        <?php
            $id_user=$_SESSION['id'];
            $hoTenDem=$p->laycot('select hoTenDem from benhnhan where maTaiKhoan='.$id_user.'');
            $ten=$p->laycot('select ten from benhnhan where maTaiKhoan='.$id_user.'');
            $email=$p->laycot('select email from benhnhan where maTaiKhoan='.$id_user.'');
            $diaChi=$p->laycot('select diaChi from benhnhan where maTaiKhoan='.$id_user.'');
            $soDienThoai=$p->laycot('select soDienThoai from benhnhan where maTaiKhoan='.$id_user.'');
            $ngaySinh=$p->laycot('select ngaySinh from benhnhan where maTaiKhoan='.$id_user.'');
            $gioiTinh=$p->laycot('select gioiTinh from benhnhan where maTaiKhoan='.$id_user.'');
            $anhDaiDien=$p->laycot('select anhDaiDien from benhnhan where maTaiKhoan='.$id_user.''); 
        ?>
        <form id="formcstt" name="formcstt" method="post" enctype="multipart/form-data">
            <div class="row mb-3">
                <label for="txthotendem" class="col-md-2 control-label">Họ tên đệm</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" value="<?php echo $hoTenDem ?>" id="txthotendem" name="txthotendem" placeholder="Nhập họ tên đệm ...">
                </div>
                <label for="txtten" class="col-md-2 control-label">Tên</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="txtten" name="txtten" value="<?php echo $ten ?>" placeholder="Nhập tên ...">
                </div>
            </div>
            <div class="row mb-3">
                <label for="ngaysinh" class="col-md-2 control-label">Ngày sinh</label>
                <div class="col-md-4">
                    <input type="datetime" class="form-control" id="ngaysinh" value="<?php echo $ngaySinh ?>" name="ngaysinh">
                </div>
                <label for="txtsdt" class="col-md-2 control-label">Số điện thoại</label>
                <div class="col-md-4">
                    <input type="text" class="form-control" id="txtsdt" name="txtsdt" value="<?php echo $soDienThoai ?>" placeholder="Nhập số điện thoại ...">
                </div>
            </div>
            <div class="row mb-3">
                <label for="gioitinh" class="col-md-2 control-label">Giới tính</label>
                <div class="col-md-4">
                    <select class="form-select" id="gioitinh" value='Chọn' name="gioitinh">
                        <option value="Nam" <?php echo $gioiTinh=='Nam'? 'selected':''?>>Nam</option>
                        <option value="Nữ" <?php echo $gioiTinh=='Nữ'? 'selected':''?>>Nữ</option>
                        <option value="Khác" <?php echo $gioiTinh=='Khác'? 'selected':''?>>Khác</option>
                    </select>
                </div>
                <label for="txtemail" class="col-md-2 control-label" style="line-height: 20px;">Email</label>
                <div class="col-md-4">
                    <input type="email" class="form-control" id="txtemail" name="txtemail" value="<?php echo $email ?>" placeholder="Nhập email ...">
                </div>
            </div>
            <div class="row mb-3">
                <label for="txtdiachi" class="col-md-2 control-label">Địa chỉ</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" id="txtdiachi" name="txtdiachi" value="<?php echo $diaChi ?>" placeholder="Nhập địa chỉ ...">
                </div>
            </div>
            <div class="row mb-3">
                <label for="file" class="col-md-2 control-label">Ảnh đại diện</label>
                <div class="col-md-10">
                    <input type="file" class="form-control" id="file" name="file">
                </div>
            </div>
            <?php if (!empty($anhDaiDien)) { ?>
                    <img src="../../img/<?php echo $anhDaiDien; ?>" alt="Ảnh đại diện" style="max-width: 200px; max-height: 200px; margin-top: 10px;"/>
            <?php } ?>
            <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" value="Lưu">
            </div>
            <div align='center'>
                <?php
                    switch ($_REQUEST['nut']) 
                    {
                        case 'Lưu':
                        {
                            $txthotendem = $_POST['txthotendem'];
                            $txtten = $_POST['txtten'];
                            $ngaysinh = $_POST['ngaysinh'];
                            $txtsdt = $_POST['txtsdt'];
                            $gioitinh = $_POST['gioitinh'];
                            $txtemail = $_POST['txtemail'];
                            $txtdiachi = $_POST['txtdiachi'];
                            $file_name=$_FILES['file']['name'];
                            $tmp_name=$_FILES['file']['tmp_name'];
                            $default_name = $_SESSION['id'].".jpg";
                            if(isset($file_name) && $file_name != '') {
                                if ($p->uploadfile($file_name,$tmp_name,$default_name, "../../img")) {
                                    if ($p->themxoasua("UPDATE benhnhan 
                                            SET hoTenDem = '$txthotendem', ten = '$txtten', email = '$txtemail', diaChi = '$txtdiachi', soDienThoai = '$txtsdt', 
                                            ngaySinh = '$ngaysinh', gioiTinh = '$gioitinh', anhDaiDien = '$default_name'
                                            WHERE maTaiKhoan = '$id_user'")==1) {
                                        echo '<script>alert("Cập nhật thông tin và ảnh thành công");</script>';
                                    } else {
                                        echo '<script>alert("Cập nhật thông tin không thành công");</script>';
                                    }
                                } else {
                                    echo '<script>alert("Upload hình không thành công");</script>';
                                    exit; 
                                }
                            } else {
                                if ($p->themxoasua("UPDATE benhnhan 
                                            SET hoTenDem = '$txthotendem', ten = '$txtten', email = '$txtemail', diaChi = '$txtdiachi', soDienThoai = '$txtsdt', 
                                            ngaySinh = '$ngaysinh', gioiTinh = '$gioitinh'
                                            WHERE maTaiKhoan = '$id_user'")==1) {

                                            if($p->themxoasua("UPDATE taikhoan 
                                                                SET hoTenDem='$txthotendem',tenTaiKhoan='$txtten',soDienThoai='$txtsdt'
                                                                WHERE maTaiKhoan='$id_user'")==1)
                                            {
                                                echo '<script>alert("Cập nhật thông tin thành công");
                                                    window.location="danhChoBenhNhan.php" ;   
                                            </script>';
                                            }
                                            else{
                                                echo '<script>alert("Cập nhật thông tin vào tài khoản không thành công");</script>';
                                            }
                                        
                                    } else {
                                        echo '<script>alert("Cập nhật thông tin không thành công");</script>';
                                    }
                            }
                            break;
                        }
                    }   
                ?>
            </div>
        </form>
    </div>
<?php include 'footer.php'; ?>