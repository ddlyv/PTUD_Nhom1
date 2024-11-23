<?php include 'header.php'; ?>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/giaodienmc.css">
    <div class="section1">
        <div class="tenChucNang">
            <p class="tenChucNang_cuthe">LOẠI XÉT NGHIỆM</p>
        </div>
        <div class="them">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalthem">THÊM LOẠI XÉT NGHIỆM</button>
        </div>
        <div class="search-container" align="right" style="margin-bottom: 20px;">
            <input type="text" id="searchInput" placeholder="Tìm kiếm..." class="form-control h-25 d-inline-block" style="width: auto; display: inline-block;">
            <button id="searchButton" class="btn btn-primary">Tìm kiếm</button>
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th>STT</th>
                <th>Mã loại</th>
                <th>Tên loại xét nghiệm</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td class="pt-3">1</td>
                <td class="pt-3">Doe</td>
                <td class="pt-3">john@example.com</td>
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

<div class="modal fade" id="modalSua">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header w-75">
                <h4 style="padding-left:100px" class="modal-title">SỬA LOẠI XÉT NGHIỆM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body w-75">
                <form id="formmodalsua" name="formmodalsua" method="post">
                    <div class="row mb-3 mt-3">
                        <label class="col-2 pt-2" class="form-label">Mã loại</label>
                        <input class="col-10" class="form-control" readonly="readonly" name="txtmaloai" type="text" id="txtmaloai" >
                    </div>
                    <div class="row mb-3">
                        <label class="col-2 pt-2" class="form-label">Tên loại</label>
                        <input class="col-10 " name="txttenloaixetnghiem" type="text" id="txttenloaixetnghiem" placeholder="Nhập tên loại xét nghiệm">
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

<div class="modal fade" id="modalthem">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

        <!-- Modal Header -->
            <div class="modal-header w-75">
                <h4 style="padding-left:80px" class="modal-title">THÊM LOẠI XÉT NGHIỆM</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body w-75">
                <form id="formmodalthem" name="formmodalthem" method="post">
                    <div class="row mb-3">
                        <label class="col-2 pt-2" class="form-label">Tên loại</label>
                        <input class="col-10 " name="txttenloaixetnghiem_them" type="text" id="txttenloaixetnghiem_them" placeholder="Nhập tên loại xét nghiệm">
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