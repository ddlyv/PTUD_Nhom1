<?php include 'header.php'; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">PHIẾU XÉT NGHIỆM</p>
        </div>
        <div class="them">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalthem">THÊM PHIẾU XÉT NGHIỆM</button>
        </div>
        
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Mã phiếu</th>
                    <th>Tên bệnh nhân</th>
                    <th>Tên loại xét nghiệm</th>
                    <th>Kết quả xét nghiệm</th>
                    <th>Ngày xét nghiệm</th>
                    <th>Giờ xét nghiệm</th>
                    <th>Ngày tạo</th>
                    <th>&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="pt-3">1</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="pt-3">&nbsp;</td>
                    <td class="text" align="right">
                    <!-- nut modal sua -->
                        <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalSua">Sửa</button>
                        <input id="nut_xoa" type="submit" name="nut" class="btn " value="Xóa">
                    </td>
                </tr>
            </tbody>
        </table>
            <div class="button">
                <input type="submit" name="nut" id="backButton" value="Quay lại">
                <input type="submit" name="nut" id="finishButton" value="Xong">
            </div>
    </div>
<!-- modal sửa phiếu đẩy dữ liệu lên từ CSDL và cập nhập trạng thái và nhập kết quả -->
<div class="modal fade" id="modalSua">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header w-75">
                <h4 style="padding-left:80px" class="modal-title">SỬA PHIẾU XÉT NGHIỆM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body w-75">
                <form id="formmodalthem" name="formmodalthem" method="post">
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Tên bệnh nhân</label>
                        <input class="col-9 " name="txttenbenhnhan" type="text" id="txttenbenhnhan" placeholder="Nhập tên bệnh nhân">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Tên loại</label>
                        <input class="col-9 " name="txttenloaixetnghiem" type="text" id="txttenloaixetnghiem" placeholder="Nhập tên loại xét nghiệm">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Kết quả</label>
                        <input class="col-9 " name="txtkqxn" type="text" id="txtkqxn" placeholder="Nhập kết quả xét nghiệm (nếu có)">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Ngày xét nghiệm</label>
                        <input class="col-9 " name="date" type="date" id="date">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Giờ xét nghiệm</label>
                        <input class="col-9 " name="time" type="time" id="time">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Ngày tạo</label>
                        <input class="col-9 " name="date2" type="date" id="date2">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Trạng thái</label>
                        <select class="col-9 " name="select" id="select">
                            <option value="1">Đang xử lý</option>
                            <option value="2" selected="selected">Hoàn thành</option>
                            <option value="3">Hủy bỏ</option>
                        </select>
                    </div>
                </form>
            </div>

                <!-- Modal footer -->
            <div class="modal-footer w-75">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                <input id="modalSua_luu" type="submit" name="nut" class="btn " value="Lưu">
            </div>
        </div>
    </div>
</div>


<!-- Modal thêm phiếu xét nghiệm -->
<div class="modal fade" id="modalthem">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header w-75">
                <h4 style="padding-left:80px" class="modal-title">THÊM PHIẾU XÉT NGHIỆM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body w-75">
                <form id="formmodalthem" name="formmodalthem" method="post">
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Tên bệnh nhân</label>
                        <input class="col-9 " name="txttenbenhnhan" type="text" id="txttenbenhnhan" placeholder="Nhập tên bệnh nhân">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Tên loại</label>
                        <input class="col-9 " name="txttenloaixetnghiem" type="text" id="txttenloaixetnghiem" placeholder="Nhập tên loại xét nghiệm">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Kết quả</label>
                        <input class="col-9 " name="txtkqxn" type="text" id="txtkqxn" placeholder="Nhập kết quả xét nghiệm (nếu có)">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Ngày xét nghiệm</label>
                        <input class="col-9 " name="date" type="date" id="date">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Giờ xét nghiệm</label>
                        <input class="col-9 " name="time" type="time" id="time">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Ngày tạo</label>
                        <input class="col-9 " name="date2" type="date" id="date2">
                    </div>
                    <div class="row mb-3">
                        <label class="col-3 pt-2" class="form-label">Trạng thái</label>
                        <select class="col-9 " name="select" id="select">
                            <option value="1">Đang xử lý</option>
                            <option value="2" selected="selected">Hoàn thành</option>
                            <option value="3">Hủy bỏ</option>
                        </select>
                    </div>
                </form>
            </div>

                <!-- Modal footer -->
            <div class="modal-footer w-75">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Hủy</button>
                <input id="modalSua_luu" type="submit" name="nut" class="btn " value="Lưu">
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>