<script type="text/javascript">
    function them_san_pham() {
        // console.log("them san pham");
        alert("Luu tru du lieu thanh cong");
    }
    
    
</script>

<!-- Modal thêm sản phẩm -->
<div class="modal fade" id="themsanpham" tabindex="-1" role="dialog" aria-labelledby="exthemsanpham" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exthemsanpham">Thông tin sản phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="" class="col-form-label">Dòng sản phẩm</label>
                        <select class="form-control ">
                            <option selected>Other</option>
                            <option value="1">Coil</option>
                            <option value="2">Valve</option>
                            <option value="3">Sensor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Mã linh kiện</label>
                        <input type="text" class="form-control" id="malinhkien">
                    </div>
                    <div class="form-group">
                        <label for="ten-linh-kien" class="col-form-label">Tên linh kiện</label>
                        <input type="text" class="form-control" id="tenlinhkien">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Mã Assy/Sub Assy</label>
                        <input type="text" class="form-control" id="maassy">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Tên Assy/Sub Assy</label>
                        <input type="text" class="form-control" id="tenassy">
                    </div>
                    <div class="form-group">
                        <label for="" class="col-form-label">Bản vẽ</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="banve" accept=".gif,.jpg,.jpeg,.png,.pdf">
                            <label class="custom-file-label" for="banve">Chọn bản vẽ</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" onclick="them_san_pham();">Save</button>
            </div>
        </div>
    </div>
</div>