    <title>Hồ sơ bệnh án</title>
    <?php 
        include 'header.php'; 
    ?>
    <?php
        include '../myclass/clsbenhnhan.php';
        $p=new benhnhan();
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../css/giaodienmc.css">
    <div class="section1">

        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">HỒ SƠ BỆNH ÁN</p>
        </div>
        <!-- <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div> -->
        <!-- <div class="date-filter" align="right" style="margin-bottom: 20px;">
            <label for="startDate" class="form-label">Từ ngày:</label>
            <input type="date" id="startDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <label for="endDate" class="form-label">Đến ngày:</label>
            <input type="date" id="endDate" class="form-control d-inline-block" style="width: auto; display: inline-block; margin-right: 10px;">
            
            <button id="filterButton" class="btn btn-primary">Lọc</button>
        </div> -->
        <!-- <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Họ tên</th>
                <th>Bác sĩ khám</th>
                <th>Chuẩn đoán</th>
                <th>Kết luận</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>1</td>
                <td>Doe</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
                <td>john@example.com</td>
            </tr>
            </tbody>
        </table> -->
        <?php
            $id_benhnhan = $_SESSION['id'];
            //số phần tử mỗi trang
            $inf_per_page=!empty($_REQUEST['per_page'])?$_REQUEST['per_page']:5;
            // đặt trang gốc
            $current_page=!empty($_REQUEST['page'])?$_REQUEST['page']:1;
            // công thức tính cho offset (bắt đầu từ 0)
            $offset=($current_page-1)*$inf_per_page;
            $totalsql=mysqli_query($p->connectdb(),"SELECT *
                                FROM hosobenhan
                                JOIN benhnhan ON hosobenhan.maBenhNhan = benhnhan.maBenhNhan
                                JOIN bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
                                LEFT JOIN phieuxetnghiem ON hosobenhan.maHoSo = phieuxetnghiem.maHoSo
                                LEFT JOIN loaixetnghiem ON phieuxetnghiem.maLoai = loaixetnghiem.maLoai
                                WHERE benhnhan.maTaiKhoan = $id_benhnhan");
            $totalsql=$totalsql->num_rows;
            //ceil làm tròn 1.5 ==> 2
            $totalpages=ceil($totalsql/$inf_per_page);
            //Hàm này sẽ in ra giá trị của biến $totalsql, cho phép bạn xem số lượng hồ sơ bệnh án đã tìm thấy.
            //var_dump($totalsql);exit;

            $p->xemHoSoBenhAn("SELECT 
                                CONCAT(benhnhan.hoTenDem, ' ', benhnhan.ten) AS hoTenBenhNhan,
                                CONCAT(bacsi.hoTenDem, ' ', bacsi.ten) AS hoTenBacSi,
                                hosobenhan.chuanDoan,
                                loaixetnghiem.tenLoai,
                                hosobenhan.ketLuan,
                                hosobenhan.trangThai,
                                hosobenhan.ngayTaoHoSo
                            FROM hosobenhan
                            JOIN benhnhan ON hosobenhan.maBenhNhan = benhnhan.maBenhNhan
                            JOIN bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
                            LEFT JOIN phieuxetnghiem ON hosobenhan.maHoSo = phieuxetnghiem.maHoSo
                            LEFT JOIN loaixetnghiem ON phieuxetnghiem.maLoai = loaixetnghiem.maLoai
                            WHERE benhnhan.maTaiKhoan = $id_benhnhan
                            ORDER BY hoSoBenhAn.ngayTaoHoSo DESC limit $inf_per_page offset $offset;
                            ",$current_page,$inf_per_page);
    
        ?>
        
        <div class="pagination"><?php include 'pagination.php';?></div> <!-- phân trang -->
        
        <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" id="finishButton" value="Xong">
        </div>
    </div>
<?php include 'footer.php'; ?>