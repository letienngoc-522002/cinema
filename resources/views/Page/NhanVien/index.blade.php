@extends('Share.master_page')

@section('title')
    Quản Lý Nhân Viên
@endsection

@section('content')
    <div id="app" class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Thêm mới nhân viên
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Mã nhân viên</label>
                        <input v-model="create_nhanvien.ma_nhan_vien" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Họ và tên</label>
                        <input v-model="create_nhanvien.ho_va_ten" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input v-model="create_nhanvien.sdt" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Quê quán</label>
                        <input v-model="create_nhanvien.que_quan" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Chức vụ</label>
                        <select v-model="create_nhanvien.ma_chuc_vu" class="form-control">
                            <template v-for="(value, key) in ds_chucvu">
                                <option v-bind:value="value.id">
                                    @{{ value.ten_chuc_vu }}
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Phòng ban</label>
                        <select v-model="create_nhanvien.ma_phong_ban" class="form-control">
                            <template v-for="(value, key) in ds_phongban">
                                <option v-bind:value="value.id">
                                    @{{ value.ten_phong_ban }}
                                </option>
                            </template>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bậc lương</label>
                        <select v-model="create_nhanvien.ma_bac_luong" class="form-control">
                            <template v-for="(value, key) in ds_luong">
                                <option v-bind:value="value.id">
                                    @{{ value.bac_luong }}
                                </option>
                            </template>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button class="btn btn-primary" v-on:click="themNhanVien()">Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Danh Sách Nhân Viên
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="">
                            <thead>
                                <tr class="text-center align-middle bg-primary text-white text-nowrap">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mã nhân viên </th>
                                    <th class="text-center">Họ và tên</th>
                                    <th class="text-center">Số điện thoại</th>
                                    <th class="text-center">Quê quán</th>
                                    <th class="text-center">Chức vụ</th>
                                    <th class="text-center">Phòng ban</th>
                                    <th class="text-center">Bậc lương</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v, k) in ds_nhanvien">
                                    <th class="align-middle text-center">@{{ k + 1 }}</th>
                                    <td class="align-middle">@{{ v.ma_nhan_vien }}</td>
                                    <td class="align-middle">@{{ v.ho_va_ten }}</td>
                                    <td class="align-middle">@{{ v.sdt }}</td>
                                    <td class="align-middle">@{{ v.que_quan }}</td>
                                    <td class="align-middle">@{{ v.ten_chuc_vu }}</td>
                                    <td class="align-middle">@{{ v.ten_phong_ban }}</td>
                                    <td class="align-middle">@{{ v.bac_luong }}</td>
                                    <td class="text-center text-nowrap align-middle">
                                        <button v-on:click="edit = v" class="btn btn-primary" data-toggle="modal"
                                            data-target="#capNhatModal">Cập nhật</button>
                                        <button v-on:click="xoa = v" class="btn btn-danger" data-toggle="modal"
                                        data-target="#xoaModal">Xóa</button>
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
                        <h5 class="modal-title"><b>Cập Nhật Nhân Viên</b></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group mt-2">
                            <input v-model="edit.id" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Mã nhân viên</label>
                            <input v-model="edit.ma_nhan_vien" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Họ và tên</label>
                            <input v-model="edit.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Số điện thoại</label>
                            <input v-model="edit.sdt" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-2">
                            <label>Quê quán</label>
                            <input v-model="edit.que_quan" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="">Chức vụ</label>
                            <select v-model="edit.ma_chuc_vu" class="form-control">
                                <template v-for="(value, key) in ds_chucvu">
                                    <option v-bind:value="value.id">
                                        @{{ value.ten_chuc_vu }}
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Phòng ban</label>
                            <select v-model="edit.ma_phong_ban" class="form-control">
                                <template v-for="(value, key) in ds_phongban">
                                    <option v-bind:value="value.id">
                                        @{{ value.ten_phong_ban }}
                                    </option>
                                </template>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Bậc lương</label>
                            <select v-model="edit.ma_bac_luong" class="form-control">
                                <template v-for="(value, key) in ds_luong">
                                    <option v-bind:value="value.id">
                                        @{{ value.bac_luong }}
                                    </option>
                                </template>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-on:click="updateNhanVien()" type="button" class="btn btn-primary"
                            data-dismiss="modal">Save</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal" id="xoaModal" tabindex="-1" aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Xóa Nhân Viên</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" v-model="xoa.id">
                        Ban chắc chắn là sẽ xoá nhân viên <b class="text-danger">@{{xoa.ma_nhan_vien}}</b> này!<br>
                        <b>Lưu ý: Hành động này không thể khôi phục!</b>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button v-on:click="xoaNhanVien()" type="button" class="btn btn-primary" data-dismiss="modal">Xóa</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>
    <script>
        new Vue({
            el: '#app',
            data: {
                create_nhanvien: {},
                ds_chucvu: [],
                ds_phongban: [],
                ds_luong: [],
                ds_nhanvien: [],
                edit: {},
                xoa: {},
            },
            created() {
                this.loadChucVu();
                this.loadPhongBan();
                this.loadLuong();
                this.loadNhanVien();
            },
            methods: {
                themNhanVien() {
                    axios
                        .post('/admin/nhan-vien/store', this.create_nhanvien)
                        .then((res) => {
                            toastr.success('Thêm mới thành công');
                            this.loadNhanVien();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                loadNhanVien() {
                    axios
                        .get('/admin/nhan-vien/data')
                        .then((res) => {
                            this.ds_nhanvien = res.data.data;
                        });
                },

                loadChucVu() {
                    axios
                        .get('/admin/chuc-vu/data')
                        .then((res) => {
                            this.ds_chucvu = res.data.chuc_vu;
                        });
                },

                loadPhongBan() {
                    axios
                        .get('/admin/phong-ban/data')
                        .then((res) => {
                            this.ds_phongban = res.data.phong_ban;
                        });
                },

                loadLuong() {
                    axios
                        .get('/admin/luong/data')
                        .then((res) => {
                            this.ds_luong = res.data.luong;
                        });
                },
                updateNhanVien() {
                    axios
                        .post('/admin/nhan-vien/update', this.edit)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success('Đã cập nhật thành công!');
                                this.loadNhanVien();
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
                xoaNhanVien() {
                    axios
                        .post('/admin/nhan-vien/delete' , this.xoa)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success('Đã xóa nhân viên thành công!');
                                this.loadNhanVien();
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
            }
        });
    </script>
@endsection
