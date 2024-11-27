<?php include '../layout/header.php'; ?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <style>
        .table thead {
            background-color: #d3d3d3;
        }

        .search-bar {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15px;
        }
    </style>


    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3>Danh Sách Khám Bệnh</h3>
        </div>

        <!-- Search bar -->
        <div class="search-bar">
            <input type="text" class="form-control mr-2" placeholder="Nhập từ khóa" style="width: 200px;">
            <button class="btn btn-primary">Tìm kiếm</button>
        </div>

        <table class="table table-bordered mt-3">
            <thead>
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Họ tên bệnh nhân</th>
                    <th scope="col">Số điện thoại</th>
                    <th scope="col">Bác sĩ</th>
                    <th scope="col">Triệu chứng</th>
                    <th scope="col">Thao Tác</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Faker</td>
                    <td>0123456789</td>
                    <td>T1</td>
                    <td>Đau cổ tay</td>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#medicalRecordModal">Tạo hồ sơ bệnh án</a>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Keria</td>
                    <td>0789654123</td>
                    <td>T1</td>
                    <td>Đau tay</td>
                    <td><a href="#" data-bs-toggle="modal" data-bs-target="#medicalRecordModal">Tạo hồ sơ bệnh án</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- Modal for Medical Record Form -->
    <div class="modal fade" id="medicalRecordModal" tabindex="-1" aria-labelledby="medicalRecordModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="medicalRecordModalLabel">Tạo Hồ Sơ Bệnh Án</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="creationDate" class="form-label">Ngày tạo</label>
                            <input type="date" class="form-control" id="creationDate" required>
                        </div>
                        <div class="mb-3">
                            <label for="patientCode" class="form-label">Mã bệnh nhân</label>
                            <input type="text" class="form-control" id="patientCode" required>
                        </div>
                        <div class="mb-3">
                            <label for="patientName" class="form-label">Họ tên</label>
                            <input type="text" class="form-control" id="patientName" required>
                        </div>
                        <div class="mb-3">
                            <label for="birthYear" class="form-label">Năm sinh</label>
                            <input type="number" class="form-control" id="birthYear" required>
                        </div>
                        <div class="mb-3">
                            <label for="gender" class="form-label">Giới tính</label>
                            <select class="form-select" id="gender" required>
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                                <option value="Khác">Khác</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="diagnosis" class="form-label">Chẩn đoán</label>
                            <input type="text" class="form-control" id="diagnosis" required>
                        </div>
                        <div class="mb-3">
                            <label for="detailedDescription" class="form-label">Mô tả chi tiết</label>
                            <textarea class="form-control" id="detailedDescription" rows="3" required></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-primary" onclick="window.location.href='HoSoBenhAn.html'">Lưu
                        hồ sơ</button>
                </div>
            </div>
        </div>
    </div>

    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>