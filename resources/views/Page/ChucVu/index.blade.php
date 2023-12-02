@extends('Share.master_page')

@section('title')
    QUẢN LÝ CHỨC VỤ
@endsection

@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm mới chức vụ
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mã chức vụ</label>
                        <input v-model="them_moi.ma_chuc_vu" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tên chức vụ</label>
                        <input v-model="them_moi.ten_chuc_vu" type="text" class="form-control">
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="createChucVu()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Chức Vụ
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-light">
                                <tr class="text-nowrap text-center">
                                    <th>#</th>
                                    <th>Mã chức vụ</th>
                                    <th>Tên chức vụ</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in ds_chucvu">
                                    <th class="align-middle text-center">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.ma_chuc_vu }}</td>
                                    <td class="align-middle">@{{ value.ten_chuc_vu }}</td>
                                    <td class="align-middle text-nowrap text-center">
                                        <button class="btn btn-primary">Cập nhật</button>
                                        <button class="btn btn-danger">Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                ds_chucvu: [],
                // phim_xoa: {},
                // phim_update: {},
                // slug: '',
            },
            created() {
                this.loadChucVu();
            },
            methods: {
                createChucVu() {
                    axios
                        .post('/admin/chuc-vu/store', this.them_moi)
                        .then((res) => {
                            toastr.success('Đã thêm mới chức vụ thành công!');
                            this.loadChucVu();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadChucVu() {
                    axios
                        .get('/admin/chuc-vu/data')
                        .then((res) => {
                            this.ds_chucvu = res.data.chuc_vu;
                        });
                },
            },
        });
    </script>
@endsection
