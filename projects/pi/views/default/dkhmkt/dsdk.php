<script type="text/javascript">
    function edit_hang_muc_kiem_tra(params) {
        alert("edit hạng mục kiểm tra -- pass parameters to modal");
    }

    function delete_hang_muc_kiem_tra(params) {
        alert("delete hạng mục kiểm tra -- pass parameters to modal");
    }
</script>
<style type="text/css">

</style>
<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap text-center">
        <thead>
            <tr>
                <th style="width: 5%">No.</th>
                <th style="width: 5%">Symbol</th>
                <th style="width: 15%">Kích thước kiểm tra</th>
                <th style="width: 15%">Phân loại đánh giá</th>
                <th style="width: 15%">Giá trị quy cách</th>
                <th style="width: 15%">Dụng cụ kiểm tra</th>
                <th style="width: 15%">Số lượng kiểm tra</th>
                <th colspan="2" style="width: 10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>0</td>
                <td></td>
                <td>Kiểm tra ngoại quan</td>
                <td>9</td>
                <td>Xem hướng dẫn kiểm tra ngoại quan</td>
                <td>Kính phóng đại x3 lần</td>
                <td>S2</td>
                <td>
                    <button type="button" onclick="edit_hang_muc_kiem_tra([])" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#themhangmuckiemtra">
                        <i class="far fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button type="button" onclick="delete_hang_muc_kiem_tra([])" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deletemodal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>
        </tbody>
    </table>
</div>