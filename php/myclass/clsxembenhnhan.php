<?php
class xembenhnhan {
    // Kết nối cơ sở dữ liệu
    public function connectdb() {
        $server = "localhost";
        $username = "root";
        $password = "";
        $dbname = "benhvien";  // Thay đổi với tên database của bạn

        $link = mysqli_connect($server, $username, $password, $dbname);
        
        if (mysqli_connect_errno()) {
            die("Connection failed: " . mysqli_connect_error());
        }
        // Set mã hóa UTF-8 cho kết nối
        mysqli_set_charset($link, 'utf8');
        return $link;
    }

    // Hiển thị thông tin chi tiết tất cả bệnh nhân (có nhóm theo bác sĩ)
    public function xemThongTinBenhNhan($sql) {
        $link = $this->connectdb();
        $ketqua = mysqli_query($link, $sql);

        if ($ketqua && mysqli_num_rows($ketqua) > 0) {
            $currentDoctor = null; // Lưu trữ bác sĩ hiện tại để nhóm dữ liệu

            echo '<table class="table table-hover">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Bệnh Nhân</th>
                            <th>Ngày Sinh</th>
                            <th>Số Điện Thoại</th>
                            <th>Email</th>
                            <th>Giới Tính</th>
                            <th>Địa Chỉ</th>
                            <th>Ngày Khám</th>
                            <th>Giờ Khám</th>
                       
                        </tr>
                    </thead>
                    <tbody>';

            $count = 1;
            while ($row = mysqli_fetch_array($ketqua)) {
                $hoTenBenhNhan = trim($row['hoTenDem'] . ' ' . $row['ten']);
                $ngaySinh = $row['ngaySinh']; // Lấy giá trị ngày sinh từ CSDL
                $soDienThoai = $row['soDienThoai'];
                $email = $row['email'];
                $gioiTinh = $row['gioiTinh'];
                $diaChi = $row['diaChi'];
            
                // Format ngày sinh theo d/m/Y
                $format_date_ngaySinh = 'Chưa rõ ngày sinh';
                if ($ngaySinh) {
                    $date_ngaySinh = DateTime::createFromFormat('Y-m-d', $ngaySinh);
                    if ($date_ngaySinh !== false) {
                        $format_date_ngaySinh = $date_ngaySinh->format('d/m/Y');
                    }
                }
            
                // Lấy ngày khám và giờ khám từ cơ sở dữ liệu
                $ngayKham = $row['ngayKham'];
                $gioKham = $row['gioKham'];
                $format_date_ngayKham = 'Chưa có lịch khám';
                if ($ngayKham) {
                    $date_ngayKham = DateTime::createFromFormat('Y-m-d H:i:s', $ngayKham);
                    if ($date_ngayKham !== false) {
                        $format_date_ngayKham = $date_ngayKham->format('d/m/Y');
                    }
                }
            
                // Tính tuổi từ ngày sinh
                $tuoi = 'Chưa rõ tuổi';
                if ($ngaySinh) {
                    $ngaySinhObj = new DateTime($ngaySinh);
                    $hienTai = new DateTime();
                    $tuoi = $hienTai->diff($ngaySinhObj)->y;
                }
            
                // Hiển thị thông tin bệnh nhân
                echo '<tr>';
                echo '<td>' . $count . '</td>';
                echo '<td>' . $hoTenBenhNhan . '</td>';
                echo '<td>' . $format_date_ngaySinh . ' (' . $tuoi . ' tuổi)</td>';
                echo '<td>' . $soDienThoai . '</td>';
                echo '<td>' . $email . '</td>';
                echo '<td>' . $gioiTinh . '</td>';
                echo '<td>' . $diaChi . '</td>';
                echo '<td>' . $format_date_ngayKham . '</td>';
                echo '<td>' . ($gioKham ? $gioKham : 'Chưa có giờ khám') . '</td>';
                echo '</tr>';
            
                $count++;
            }
            
            

            echo '</tbody></table>';
        } else {
            echo "Không có dữ liệu bệnh nhân.";
        }
    }
}
?>
