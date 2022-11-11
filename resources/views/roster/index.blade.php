@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card shadow">
                        <div class="card-header">
                            Senarai Jadual
                            <div style="float: right">
                                <a class="btn btn-primary float-right" href="{{ route('rosters.create') }}"><i class="fas fa-plus-circle"></i>&ensp;Tambah Jadual</a>
                            </div>
                        </div>

                        <div class="card-body">
                            @if (Session::has('message'))
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
                            @endif
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush datatable" id="RostersTables">
                                    <thead>
                                        <tr>
                                            <th style="text-center">#</th>
                                            <th style="text-center">Tajuk</th>
                                            <th style="text-left">Tarikh</th>
                                            <th style="text-left">Status</th>
                                            <th style="text-center">Sunting</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal fade" id="EditOfficers" tabindex="-1" role="dialog" aria-labelledby="OfficersSettingTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Sunting Pegawai</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body m-3">
                            <form action="{{ route('officers.store') }}" method="POST" id="EditOfficersForm" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group pb-2">
                                    <label for="noBatch">No Batch</label>
                                    <input type="text" name="no_batch" class="form-control" placeholder="Masukkan No Batch Pegawai" required>
                                    <small id="noBatchHelp" class="form-text text-muted">cth: SJN 122560</small>
                                </div>
                                <div class="form-group">
                                    <label for="OficerName">Nama Penuh</label>
                                    <input type="text" name="officer_name" class="form-control" placeholder="Masukkan Name Penuh Pegawai" required>
                                    <small id="nameHelp" class="form-text text-muted">cth: Ali Bin Abu</small>
                                </div>
                                <div class="form-group">
                                    <label for="batchRole">Pangkat</label>
                                    <input type="text" name="batch_role" class="form-control" placeholder="Masukkan Pangkat Pegawai" required>
                                    <small id="batchRoleHelp" class="form-text text-muted">cth: SJN, ASP, KPL , etc</small>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                            <button type="submit" form="EditOfficersForm" class="btn btn-sm btn-success"><i class="fas fa-save"></i>&ensp;Simpan</button>
                        </div>
                    </div>
                </div>
            </div>

            <form action="{{ route('officers.store') }}" method="POST" id="DeleteOfficers" enctype="multipart/form-data">
                @method('Delete')
                @csrf
            </form>
        </div>
    </div>
@endsection