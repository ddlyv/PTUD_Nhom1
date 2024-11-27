<?php
class clsHoSoBenhAn
{

    private $con;

    public function __construct() {
        $this->connectdb();
    }
    
    private function connectdb() {
        $this->con = mysqli_connect("localhost", "root", "", "benhvien");
        if (!$this->con) {
            die('Không thể kết nối đến database: ' . mysqli_connect_error());
        }
        mysqli_set_charset($this->con, "utf8");
    }

    public function layDanhSachHoSo($maBacSi = null)
    {
        $link = $this->con;
        $sql = "
            SELECT 
                benhnhan.hoTenDem, 
                benhnhan.ten, 
                benhnhan.maBenhNhan,
                YEAR(benhnhan.ngaySinh) AS namSinh, 
                benhnhan.diaChi, 
                benhnhan.soDienThoai, 
                benhnhan.gioiTinh, 
                hosobenhan.chuanDoan, 
                hosobenhan.trangThai, 
                hosobenhan.ngayTaoHoSo,
                hosobenhan.maHoSo
            FROM 
                hosobenhan
            INNER JOIN 
                benhnhan ON hosobenhan.maBenhNhan = benhnhan.maBenhNhan
            INNER JOIN 
                bacsi ON hosobenhan.maBacSi = bacsi.maBacSi
        ";
        if ($maBacSi) {
            $sql .= " WHERE HoSoBenhAn.maBacSi = '$maBacSi'";
        }
        $result = mysqli_query($link, $sql);
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }

    public function laycot($sql) {
        if (!$this->con) {
            die('Kết nối cơ sở dữ liệu không tồn tại.');
        }
        $ketqua = mysqli_query($this->con, $sql);
        if (!$ketqua) {
            die('Lỗi truy vấn: ' . mysqli_error($this->con));
        }
        $giatri = '';
        if (mysqli_num_rows($ketqua) > 0) {
            while ($row = mysqli_fetch_array($ketqua)) {
                $giatri = $row[0];
            }
        }
        return $giatri;
    }
    public function layDanhSachThuoc()
    {
        $sql = "SELECT maThuoc, tenThuoc FROM Thuoc";
        $result = mysqli_query($this->con, $sql);
        $data = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = $row;
            }
        }
        return $data;
    }
    

}
?>
