@extends('Share.master_page')

@section('title')
    QUẢN LÝ LƯƠNG
@endsection

@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm mới lương
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Bậc lương</label>
                        <input v-model="them_moi.bac_luong" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Lương cơ sở</label>
                        <input v-model="them_moi.luong_co_so" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Hệ số lương</label>
                        <input v-model="them_moi.he_so_luong" type="number" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Hệ số phụ cấp</label>
                        <input v-model="them_moi.he_so_phu_cap" type="number" class="form-control">
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="createLuong()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Tiền Lương
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-light">
                                <tr class="text-nowrap text-center">
                                    <th>#</th>
                                    <th>Bậc lương</th>
                                    <th>Lương cơ sở</th>
                                    <th>Hệ số lương</th>
                                    <th>Hệ số phụ cấp</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in ds_luong">
                                    <th class="align-middle text-center">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.bac_luong }}</td>
                                    <td class="align-middle">@{{ value.luong_co_so }}</td>
                                    <td class="align-middle">@{{ value.he_so_luong }}</td>
                                    <td class="align-middle">@{{ value.he_so_phu_cap }}</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button v-on:click="edit=value" class="btn btn-primary" data-toggle="modal" data-target="#capNhatModal">Cập nhật</button>
                                        <button v-on:click="xoa=value" class="btn btn-danger" data-toggle="modal" data-target="#xoaModal">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="capNhatModal" tabindex="-1">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title"><b>Cập Nhật Lương</b></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-2">
                        <input v-model="edit.id" type="hidden" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label>Bậc lương</label>
                        <input v-model="edit.bac_luong" type="text" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label>Lương cơ sở</label>
                        <input v-model="edit.luong_co_so" type="text" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label>Hệ số lương</label>
                        <input v-model="edit.he_so_luong" type="text" class="form-control">
                    </div>
                    <div class="form-group mt-2">
                        <label>Hệ số phụ cấp</label>
                        <input v-model="edit.he_so_phu_cap" type="text" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="button" class="btn btn-primary" v-on:click="updateLuong()" data-dismiss="modal">Cập nhật</button>
                </div>
              </div>
            </div>
        </div>
        <div class="modal fade" id="xoaModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa Lương</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" v-model="xoa.id" >
                        Ban chắc chắn là sẽ xoá bậc lương <b class="text-danger">@{{xoa.bac_luong}}</b> này!<br>
                        <b>Lưu ý: Hành động này không thể khôi phục!</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-on:click="xoaLuong()" type="button" class="btn btn-primary" data-dismiss="modal">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                them_moi: {},
                ds_luong: [],
                edit: {},
                xoa: {},
            },
            created() {
                this.loadLuong();
            },
            methods: {
                createLuong() {
                    axios
                        .post('/admin/luong/store', this.them_moi)
                        .then((res) => {
                            toastr.success('Đã thêm mới lương thành công!');
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadLuong() {
                    axios
                        .get('/admin/luong/data')
                        .then((res) => {
                            this.ds_luong = res.data.luong;
                            this.loadLuong();
                        });
                },
                updateLuong(){
                    axios
                    .post('/admin/luong/update', this.edit)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Đã cập nhật thành công!');
                            this.loadLuong();
                            $('#capNhatModal').modal('hide');
                        } else {
                            toastr.error('Có lỗi không mong muốn!');
                        }
                    })
                    .catch((res) => {
                        $.each(res.response.data.errors, function(k, v) {
                            toastr.error(v[0]);
                        });
                    });
                },
                xoaLuong() {
                    axios
                        .post('/admin/luong/delete' , this.xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success('Đã xóa lương thành công!');
                                this.loadData();
                                $('#xoaModal').modal('hide');
                            } else {
                                toastr.error('Có lỗi không mong muốn!');
                            }
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                    });
                },
            },
        });
    </script>
@endsection
