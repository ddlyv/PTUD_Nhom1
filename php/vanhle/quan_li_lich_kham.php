<?php include 'header.php';
require_once __DIR__ . '/myclass/clquanlykhunggiokham.php';
require_once __DIR__ . '/myclass/clbacsi.php';
require_once __DIR__ . '/myclass/clbenhnhan.php';
require_once __DIR__ . '/myclass/cllichhen.php';
$quanlykhunggiokham = new clquanlykhunggiokham();
$dsDaXacNhan = $quanlykhunggiokham->getLichKhamTrangThai(0);
$dsDaDangTienHanh = $quanlykhunggiokham->getLichKhamTrangThai(1);
$dsDaHoanThanh = $quanlykhunggiokham->getLichKhamTrangThai(2);
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="container mt-5">
    <h3 class="text-center mb-4">Quản Lý Lịch Khám</h3>

    <!-- Nút mở modal danh sách chờ xác nhận với huy hiệu màu đỏ hiển thị số lượng -->
    <div class="text-center mb-4">
        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#pendingConfirmationModal">
            Danh sách chờ xác nhận <span class="badge badge-danger" id="pendingCount">0</span>
        </button>
    </div>

    <!-- Bảng danh sách đã xác nhận -->
    <h5 class="mb-3">Danh sách đã xác nhận</h5>
    <div class="table-responsive">
        <table class="table table-bordered" id="confirmedTable">
            <thead>
                <tr>
                    <th>Bệnh nhân</th>
                    <th>Ngày khám</th>
                    <th>Giờ khám</th>
                    <th>Bác sĩ</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Các lịch khám đã xác nhận sẽ hiển thị ở đây -->
            </tbody>
        </table>
    </div>

    <!-- Bảng danh sách đang tiến hành -->
    <h5 class="mb-3">Danh sách đang tiến hành</h5>
    <div class="table-responsive">
        <table class="table table-bordered" id="inProgressTable">
            <thead>
                <tr>
                    <th>Bệnh nhân</th>
                    <th>Ngày khám</th>
                    <th>Giờ khám</th>
                    <th>Bác sĩ</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <!-- Rows dynamically populated -->
                <?php if (!empty($dsDaXacNhan)): ?>
                    <?php foreach ($dsDaXacNhan as $lichkham): ?>
                        <tr>
                            <td><?= htmlspecialchars($lichkham['maLichKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['ngayKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['gioKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['tenBacSi']) ?></td>
                            <td><?= htmlspecialchars($lichkham['ghiChu']) ?></td>
                            <td><?= htmlspecialchars($lichkham['trangthai']) ?></td>
                            <td>
                                <a href="chinh_sua_lich_kham.php?id=<?= $lichkham['maLichKham'] ?>" class="btn btn-primary btn-sm edit-btn" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

    <!-- Bảng danh sách đã hoàn thành -->
    <h5 class="mb-3">Danh sách đã hoàn thành</h5>
    <div class="table-responsive">
        <table class="table table-bordered" id="completedTable">
            <thead>
                <tr>
                    <th>Bệnh nhân</th>
                    <th>Ngày khám</th>
                    <th>Giờ khám</th>
                    <th>Bác sĩ</th>
                    <th>Ghi chú</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($dsDaDangTienHanh)): ?>
                    <?php foreach ($dsDaDangTienHanh as $lichkham): ?>
                        <tr>
                            <td><?= htmlspecialchars($lichkham['maLichKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['ngayKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['gioKham']) ?></td>
                            <td><?= htmlspecialchars($lichkham['tenBacSi']) ?></td>
                            <td><?= htmlspecialchars($lichkham['ghiChu']) ?></td>
                            <td><?= htmlspecialchars($lichkham['trangthai']) ?></td>
                            <td>
                                <a href="chinh_sua_lich_kham.php?id=<?= $lichkham['maLichKham'] ?>" class="btn btn-primary btn-sm edit-btn" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <a href="./delete-schedule?id=<?= $lichkham['maLichKham'] ?>" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="7" class="text-center">Không có dữ liệu</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Danh sách chờ xác nhận -->
<div class="modal fade" id="pendingConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="pendingConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="pendingConfirmationModalLabel">Danh Sách Chờ Xác Nhận</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Bảng danh sách chờ xác nhận -->
                <div class="table-responsive">
                    <table class="table table-bordered" id="pendingTable">
                        <thead>
                            <tr>
                                <th>Bệnh nhân</th>
                                <th>Ngày khám</th>
                                <th>Giờ khám</th>
                                <th>Bác sĩ</th>
                                <th>Ghi chú</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($dsDaHoanThanh)): ?>
                                <?php foreach ($dsDaHoanThanh as $lichkham): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($lichkham['maLichKham']) ?></td>
                                        <td><?= htmlspecialchars($lichkham['ngayKham']) ?></td>
                                        <td><?= htmlspecialchars($lichkham['gioKham']) ?></td>
                                        <td><?= htmlspecialchars($lichkham['tenBacSi']) ?></td>
                                        <td><?= htmlspecialchars($lichkham['ghiChu']) ?></td>
                                        <td><?= htmlspecialchars($lichkham['trangthai']) ?></td>
                                        <td>
                                            <a href="chinh_sua_lich_kham.php?id=<?= $lichkham['maLichKham'] ?>" class="btn btn-primary btn-sm edit-btn" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <a href="#" class="btn btn-danger btn-sm delete-btn" data-id="<?= htmlspecialchars($lichkham['id']) ?>">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Không có dữ liệu</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function updatePendingCount() {
        const pendingTable = document.getElementById("pendingTable");
        const pendingCount = pendingTable.querySelectorAll("tbody tr").length;
        document.getElementById("pendingCount").textContent = pendingCount;
    }

    document.addEventListener("DOMContentLoaded", function() {
        updatePendingCount();
    });

    function confirmAppointment(button) {
        const row = button.closest("tr");
        const confirmedTable = document.getElementById("confirmedTable").querySelector("tbody");
        const newRow = row.cloneNode(true);

        // Thêm trạng thái "Đã xác nhận", nút "Bắt đầu", và nút "Chỉnh sửa"
        newRow.cells[5].innerHTML = '<span class="badge badge-success">Đã xác nhận</span>';
        newRow.insertCell(6).innerHTML = `
        <button type="button" class="btn btn-primary btn-sm" onclick="startAppointment(this)">Bắt đầu</button>
        <a href="chinh_sua_lich_kham.php" class="btn btn-warning btn-sm" onclick="editAppointment(this)">Chỉnh sửa</a>
    `;
        confirmedTable.appendChild(newRow);
        row.remove();

        updatePendingCount();
        if (document.getElementById("pendingCount").textContent === "0") {
            $('#pendingConfirmationModal').modal('hide');
        }
    }

    function startAppointment(button) {
        const row = button.closest("tr");
        const inProgressTable = document.getElementById("inProgressTable").querySelector("tbody");
        const newRow = row.cloneNode(true);

        // Cập nhật trạng thái "Đang tiến hành", thêm nút "Hoàn thành" và nút "Chỉnh sửa"
        newRow.cells[5].innerHTML = '<span class="badge badge-info">Đang tiến hành</span>';
        newRow.cells[6].innerHTML = `
        <button type="button" class="btn btn-success btn-sm" onclick="completeAppointment(this)">Hoàn thành</button>
        <a href="chinh_sua_lich_kham.php" class="btn btn-warning btn-sm" onclick="editAppointment(this)">Chỉnh sửa</a>
    `;
        inProgressTable.appendChild(newRow);
        row.remove();
    }

    function startAppointment(button) {
        const row = button.closest("tr");
        const inProgressTable = document.getElementById("inProgressTable").querySelector("tbody");
        const newRow = row.cloneNode(true);

        // Cập nhật trạng thái "Đang tiến hành" và nút "Hoàn thành"
        newRow.cells[5].innerHTML = '<span class="badge badge-info">Đang tiến hành</span>';
        newRow.cells[6].innerHTML = '<button type="button" class="btn btn-success btn-sm" onclick="completeAppointment(this)">Hoàn thành</button>';
        inProgressTable.appendChild(newRow);
        row.remove();
    }

    function completeAppointment(button) {
        const row = button.closest("tr");
        const completedTable = document.getElementById("completedTable").querySelector("tbody");
        const newRow = row.cloneNode(true);

        // Cập nhật trạng thái thành "Hoàn thành" và xóa cột hành động
        newRow.cells[5].innerHTML = '<span class="badge badge-primary">Hoàn thành</span>';
        newRow.deleteCell(6);
        completedTable.appendChild(newRow);
        row.remove();
    }
</script>

<?php include 'footer.php'; ?>