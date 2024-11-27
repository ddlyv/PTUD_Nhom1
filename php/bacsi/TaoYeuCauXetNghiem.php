<?php include '../layout/header.php'; ?>

    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">

    <div class="container mt-5">
        <div class="card" style="max-width: 500px; margin: 0 auto;">
            <div class="card-body">
                <h3 class="text-center mb-4">Tạo yêu cầu xét nghiệm</h3>
                <form onsubmit="event.preventDefault(); window.location.href='ThemYeuCauXNThanhCong.html'">
                    <div class="mb-3">
                        <label for="patientName" class="form-label">Tên bệnh nhân:</label>
                        <input type="text" class="form-control" id="patientName" value="Faker" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="birthYear" class="form-label">Năm sinh:</label>
                        <input type="text" class="form-control" id="birthYear" value="2024-10-11" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Giới tính:</label>
                        <select class="form-select" id="gender">
                            <option selected>Nam</option>
                            <option>Nữ</option>
                            <option>Khác</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="testType" class="form-label">Loại xét nghiệm:</label>
                        <select class="form-select" id="testType">
                            <option selected>Chọn loại xét nghiệm</option>
                            <option>Xét nghiệm máu</option>
                            <option>Xét nghiệm nước tiểu</option>
                            <option>Xét nghiệm Covid-19</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Tạo</button>

                </form>
            </div>
        </div>
    </div>

    <script src="../../bootstrap/js/bootstrap.bundle.min.js"></script>
<?php include '../layout/footer.php'; ?>