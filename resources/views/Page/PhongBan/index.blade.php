@extends('Share.master_page')


@section('title')
    QUẢN LÝ PHÒNG BAN
@endsection

@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm mới phòng ban
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mã phòng ban</label>
                        <input v-model="them_moi.ma_phong_ban" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tên phòng ban</label>
                        <input v-model="them_moi.ten_phong_ban" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input v-model="them_moi.dia_chi_phong_ban" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input v-model="them_moi.sdt_phong_ban" type="text" class="form-control">
                    </div>

                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="createPhongBan()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Phòng Ban
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-primary text-light">
                                <tr class="text-nowrap text-center">
                                    <th>#</th>
                                    <th>Mã phòng ban</th>
                                    <th>Tên phòng ban</th>
                                    <th>Địa chỉ</th>
                                    <th>Số điện thoại</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in ds_phongban">
                                    <th class="align-middle text-center">@{{ key + 1 }}</th>
                                    <td class="align-middle">@{{ value.ma_phong_ban }}</td>
                                    <td class="align-middle">@{{ value.ten_phong_ban }}</td>
                                    <td class="align-middle">@{{ value.dia_chi_phong_ban }}</td>
                                    <td class="align-middle">@{{ value.sdt_phong_ban }}</td>
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
                ds_phongban: [],
                // phim_xoa: {},
                // phim_update: {},
                // slug: '',
            },
            created() {
                this.loadPhongBan();
            },
            methods: {
                createPhongBan() {
                    axios
                        .post('/admin/phong-ban/store', this.them_moi)
                        .then((res) => {
                            toastr.success('Đã thêm mới phòng ban thành công!');
                            this.loadPhongBan();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                loadPhongBan() {
                    axios
                        .get('/admin/phong-ban/data')
                        .then((res) => {
                            this.ds_phongban = res.data.phong_ban;
                        });
                },
            }
        })
    </script>
@endsection
