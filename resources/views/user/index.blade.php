@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            Senarai Pengguna
                            <div style="float: right">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#UsersCreate"><i class="fas fa-plus-circle"></i>&ensp;Tambah Pengguna</button>
                            </div>
                        </div>

                        <div class="card-body">
                            {{-- @if (Session::has('message'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ Session::get('message') }}</strong>
                                    <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                            aria-hidden="true">×</span></button>
                                </div>
                            @endif
                            @if ($errors->any())
                                @foreach ($errors->all() as $error)
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <strong>{{ $error }}</strong>
                                        <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span
                                                aria-hidden="true">×</span></button>
                                    </div>
                                @endforeach
                            @endif --}}
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush datatable" id="UsersTable">
                                    <thead>
                                        <tr>
                                            <th style="text-center">#</th>
                                            <th style="text-left">Nama</th>
                                            <th style="text-center">Email</th>
                                            <th style="text-center">Sunting</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            {{-- Create Modal --}}
            <div class="modal fade" id="UsersCreate" tabindex="-1" role="dialog" aria-labelledby="UsersCreateTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pengguna</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <!-- Validation Errors -->
                        <x-auth-validation-errors class=" p-3 pb-0" :errors="$errors" />

                        <form action="{{ route('users.store') }}" method="POST" id="CreateUsers" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pengguna" required>
                                    <small id="nameUserHelp" class="form-text text-muted">cth: Ali Bin Abu</small>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Pengguna" required>
                                    <small id="emailUserHelp" class="form-text text-muted">cth: contoh22@gmail.com</small>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="password">Kata Laluan</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Laluan" required>
                                    <small id="passUserHelp" class="form-text text-muted">*Pastikan kata laluan anda mengandungi Huruf besar dan Huruf kecil</small>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="confirm_password">Pengesahan Kata Laluan</label>
                                    <input type="password" class="form-control" id="confirm_password"name="confirm_password" placeholder="Masukkan Kata Laluan Semula" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                                <button type="submit" form="CreateUsers" class="btn btn-success"><i class="fas fa-save"></i>&ensp;Simpan</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!--Edit USer Modal -->
            <div class="modal fade" id="EditUser" tabindex="-1" role="dialog" aria-labelledby="CarSettingTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Tambah Pengguna</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body m-3">
                            <form action="{{ route('users.store') }}" method="POST" id="EditUsers" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="name">Nama</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama Pengguna" required>
                                    <small id="nameUserHelp" class="form-text text-muted">cth: Ali Bin Abu</small>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan Email Pengguna" required>
                                    <small id="emailUserHelp" class="form-text text-muted">cth: contoh22@gmail.com</small>
                                </div>
                                <div class="form-group">
                                    <label for="password">Kata Laluan</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan Kata Laluan" required>
                                    <small id="passUserHelp" class="form-text text-muted">*Pastikan kata laluan anda mengandungi Huruf besar dan Huruf kecil</small>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Pengesahan Kata Laluan</label>
                                    <input type="confirmPassword" class="form-control" id="confirm_password"name="confirm_password" placeholder="Masukkan Kata Laluan Semula" required>
                                </div>
                                <input type="hidden" name="user_role" value="normal">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                            <button type="submit" form="EditCars" class="btn btn-sm btn-success"><i class="fas fa-save"></i>&ensp;Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('users.store') }}" method="POST" id="DeleteUser" enctype="multipart/form-data">
                @method('Delete')
                @csrf
            </form>
        </div>
    </div>
@endsection