<script type="text/javascript">
    function ok_delete_modal() {
        // console.log("them san pham");
        alert("Xóa dữ liệu");
    }
</script>

<!-- Modal thêm sản phẩm -->
<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exdeletemodal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exdeletemodal">Xóa dữ liệu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to do this?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" onclick="ok_delete_modal();">Yes</button>
            </div>
        </div>
    </div>
</div>