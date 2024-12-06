<?php
    include('clsbenhvien.php');
    class benhnhan extends hospital
    {
        public function xemlichhenkham($sql,$current_page,$inf_per_page)
        {
            $link=$this->connectdb();
            $ketqua=mysqli_query($link,$sql);
            if(mysqli_num_rows($ketqua)>0)
            {
                echo'<table class="table table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Họ tên</th>
                                <th>Ngày khám</th>
                                <th>Giờ khám</th>
                                <th>Ngày tạo</th>
                                <th>Tình trạng</th>
                            </tr>
                        </thead>
                        <tbody>';
                    $count=1+($current_page -1 )* $inf_per_page;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maLichHen=$row['maLichHen'];
                    $hoTenBenhNhan=$row['hoTenBenhNhan'];
                    $ngayTaoLichHen=$row['ngayTaoLichHen'];
                    $ngayDatLich=$row['ngayDatLich'];
                    $gioDatLich=$row['gioDatLich'];
                    $trangThai=$row['trangThai'];  
                    $maBenhNhan=$row['maBenhNhan'];

                    $date_NgayDatLich = DateTime::createFromFormat('Y-m-d H:i:s', $ngayDatLich);
                    $format_date_NgayDatLich= $date_NgayDatLich->format('d/m/Y');
                    
                    $date_ngayTaoLichHen=DateTime::createFromFormat('Y-m-d H:i:s',$ngayTaoLichHen);
                    $format_date_ngayTaoLichHen=$date_ngayTaoLichHen->format('d/m/Y');

                    echo'
                        <tr>
                            <td>'.$count.'</td>
                            <td>'.$hoTenBenhNhan.'</td>
                            <td>'.$format_date_NgayDatLich.'</td>
                            <td>'.$gioDatLich.'</td>
                            <td>'.$format_date_ngayTaoLichHen.'</td>
                            <td>'.$trangThai.'</td>
                        </tr>
                        ';
                        $count++;
                }
                echo '</tbody>
                </table>';
            }
            else {
                echo "Không có lịch hẹn nào.";
            }

        }
       
        
    }
?>