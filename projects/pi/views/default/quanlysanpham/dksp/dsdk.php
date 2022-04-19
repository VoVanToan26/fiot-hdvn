<script type="text/javascript">
    
    function edit_san_pham(params) {
        alert("edit san pham -- pass parameters to modal");
    }

    function delete_san_pham(params) {
        alert("delete san pham -- pass parameters to modal");
    }
    
</script>
<style type="text/css">

</style>

<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap text-center">
        <thead>
            <tr>
                <th style="width: 5%">STT</th>
                <th style="width: 10%">Dòng sản phẩm</th>
                <th style="width: 15%">Mã linh kiện</th>
                <th style="width: 15%">Tên linh kiện</th>
                <th style="width: 15%">Mã Assy/Sub Assy</th>
                <th style="width: 15%">Tên Assy/Sub Assy</th>
                <th style="width: 15%">Bản vẽ</th>
                <th colspan="2" style="width: 10%">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1</td>
                <td>Coil</td>
                <td>C001</td>
                <td>Coil 001</td>
                <td>CA001</td>
                <td>Coild Assy 001</td>
                <td>BanveCA001.pdf</td>
               
                <td>
                    <button type="button" onclick="edit_san_pham([])" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#themsanpham">
                        <i class="far fa-edit"></i>
                    </button>
                </td>
                <td>
                    <button type="button" onclick="delete_san_pham([])" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#deletemodal">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>

            </tr>
        </tbody>
    </table>
</div>
