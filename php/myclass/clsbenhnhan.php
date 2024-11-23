<?php
    include('clsbenhvien.php');
    class benhnhan extends hospital
    {
        public function  xemHoSoBenhAn($sql,$current_page,$inf_per_page)
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
                            <th>Bác sĩ khám</th>
                            <th>Chuẩn đoán</th>
                            <th>Kết luận</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                        </tr>
                        </thead>
                        <tbody>';
                $count=1 + ($current_page - 1) * $inf_per_page;;
                while($row=mysqli_fetch_array($ketqua))
                {
                    $maHoSo=$row['maHoSo'];
                    $chuanDoan=$row['chuanDoan'];
                    $ketLuan=$row['ketLuan'];
                    $trangThai=$row['trangThai'];
                    $ngayTaoHoSo=$row['ngayTaoHoSo'];
                    $maBenhNhan=$row['maBenhNhan'];
                    $maBacSi=$row['maBacSi'];
                    echo'<tr>
                            <td>'.$count.'</td>
                            <td>'.$row['hoTenBenhNhan'].'</td>
                            <td>'.$row['hoTenBacSi'].'</td>
                            <td>'.$chuanDoan.'</td>
                            <td>'.$ketLuan.'</td>
                            <td>'.$trangThai.'</td>
                            <td>'.$ngayTaoHoSo.'</td>
                        </tr>';
                    $count++;
                }
                echo'</tbody>
                    </table>';
            }
            else {
                echo "Không có hồ sơ nào.";
            }
        }

        
        
    }
?>