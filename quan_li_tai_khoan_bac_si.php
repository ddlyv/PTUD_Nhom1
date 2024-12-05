<?php include 'header.php';

require_once __DIR__ . '/myclass/clbacsi.php';
$bacsi = new clbacsi();
$dsbacsi = $bacsi->getbacSi();


?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<style>
    .nav-tabs .nav-link {
        padding: 6px 12px;
        margin-right: 1px;
    }

    .nav-tabs .nav-item {
        flex-grow: 0;
    }
</style>

<div class="container mt-5">
    <h2 class="text-center mb-4">Danh sách Tài Khoản Bác Sĩ</h2>

    <?php
    $accounts = $dsbacsi;

    // Thiết lập số tài khoản trên mỗi trang
    $accounts_per_page = 10;

    // Tính toán tổng số trang
    $total_accounts = count($accounts);
    $total_pages = ceil($total_accounts / $accounts_per_page);

    // Biến khởi đầu cho các trang sẽ hiển thị và số trang tối đa
    $pages_to_show = 5;
    ?>

    <!-- Tabs cho các trang -->
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <?php for ($page = 1; $page <= min($total_pages, $pages_to_show); $page++): ?>
            <li class="nav-item">
                <a class="nav-link <?php echo $page == 1 ? 'active' : ''; ?>" id="page-<?php echo $page; ?>-tab" data-toggle="tab" href="#page-<?php echo $page; ?>" role="tab">
                    Trang <?php echo $page; ?>
                </a>
            </li>
        <?php endfor; ?>

        <?php if ($total_pages > $pages_to_show): ?>
            <li class="nav-item">
                <a class="nav-link" id="more-pages" href="javascript:void(0);" onclick="showNextPages();">...</a>
            </li>
        <?php endif; ?>
    </ul>


    <div class="tab-content" id="myTabContent">
        <?php for ($page = 1; $page <= $total_pages; $page++): ?>
            <div class="tab-pane fade <?php echo $page == 1 ? 'show active' : ''; ?>" id="page-<?php echo $page; ?>" role="tabpanel">
                <table class="table table-bordered mt-4">
                    <thead class="thead-dark">
                        <tr>
                            <th>STT</th>
                            <th>Họ và Tên</th>
                            <th>Ngày Sinh</th>
                            <th>Số Điện Thoại</th>
                            <th>Giới Tính</th>
                            <th>Email</th>
                            <th>Địa Chỉ</th>
                            <th>Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $start_index = ($page - 1) * $accounts_per_page;
                        $end_index = min($start_index + $accounts_per_page, $total_accounts);

                        for ($i = $start_index; $i < $end_index; $i++):
                            $account = $accounts[$i];
                        ?>
                            <tr>
                                <td><?php echo $i + 1; ?></td>
                                <td><?php echo $account['hoTenDem'] . ' ' . $account['ten']; ?></td>
                                <td><?php echo $account['ngaySinh']; ?></td>
                                <td><?php echo $account['soDienThoai']; ?></td>
                                <td><?php echo $account['gioiTinh']; ?></td>
                                <td><?php echo $account['email']; ?></td>
                                <td><?php echo $account['diachi']; ?></td>
                                <td class="text-center">
                                    <a href="#" class="btn btn-primary btn-sm edit-btn"
                                        data-id="<?= $account['maBacSi'] ?>"
                                        data-toggle="modal"
                                        data-target="#editScheduleModal">
                                        Sửa
                                    </a>
                                    <a href="./delete-tkbs?id=<?= $account['maBacSi'] ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?')">Xóa</a>
                                </td>
                            </tr>
                        <?php endfor; ?>
                    </tbody>
                </table>
            </div>
        <?php endfor; ?>
    </div>
</div>

<div class="modal fade" id="editScheduleModal" tabindex="-1" role="dialog" aria-labelledby="editScheduleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document"> <!-- Đổi modal-lg thành modal-xl để modal rộng hơn -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addScheduleModalLabel">Sửa Tài khoản bác sĩ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="./edit-tkbs" method="POST">
                    <input type="hidden" id="edit_id" name="id">
                    <!-- Ngày khám -->
                    <div class="form-group">
                        <label for="ngay_kham">Họ tên</label>
                        <input type="" class="form-control" id="edit_ngay_kham" name="ho_ten_dem" required style="height: 45px; width: 600px;">
                    </div>
                    <div class="form-group">
                        <label for="ngay_kham">Tên</label>
                        <input type="" class="form-control" id="edit_ngay_kham" name="ten" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Giờ bắt đầu -->
                    <div class="form-group">
                        <label for="gio_bat_dau">Ngày sinh</label>
                        <input type="date" class="form-control" id="gio_bat_dau" name="ngay_sinh" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Bác sĩ phụ trách -->
                    <div class="form-group">
                        <label for="bac_si">Số địen thoại</label>
                        <input type="" class="form-control" id="edit_ngay_kham" name="so_dien_thoai" required style="height: 45px; width: 600px;">
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Giới tính</label>
                        <select class="form-control" id="lich_hen" name="gioi_tinh" required style="height: 45px; width: 600px;">
                            <option value="">Chọn giới tính</option>
                            <option value="Nam">Nam</option>
                            <option value="Nu">Nu</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="bac_si">Email</label>
                        <input type="" class="form-control" id="edit_ngay_kham" name="email" required style="height: 45px; width: 600px;">
                    </div>

                    <!-- Ghi chú -->
                    <div class="form-group">
                        <label for="ghi_chu">Địa chỉ</label>
                        <textarea class="form-control" id="ghi_chu" name="dia_chi" rows="3" style="height: 100px;"></textarea>
                    </div>

                    <div class="text-center mt-4">
                        <button type="submit" value="add_schedule" class="btn btn-success">Lưu</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    let currentStartPage = 1;
    const totalPages = <?php echo $total_pages; ?>;
    const pagesToShow = <?php echo $pages_to_show; ?>;

    function showNextPages() {
        const start = currentStartPage + pagesToShow;
        const end = Math.min(start + pagesToShow - 1, totalPages);

        // Xóa các tab hiện tại
        $('#myTab .nav-item').not('#more-pages').remove();

        // Thêm các tab trang mới
        for (let page = start; page <= end; page++) {
            $('#more-pages').before(`
               <li class="nav-item">
                   <a class="nav-link" id="page-${page}-tab" data-toggle="tab" href="#page-${page}" role="tab">Trang ${page}</a>
               </li>
           `);
        }

        currentStartPage = start;

        // Kiểm tra nếu đã đến trang cuối
        if (currentStartPage + pagesToShow >= totalPages) {
            $('#more-pages').remove();
        }

        // Gán sự kiện cho các tab mới
        $('#myTab a').on('click', function(e) {
            e.preventDefault();
            $(this).tab('show');
        });
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const editButtons = document.querySelectorAll('.edit-btn');
        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                document.getElementById('edit_id').value = id;
            });
        });
    });
</script>




<?php include 'footer.php'; ?>