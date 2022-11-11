@extends('admin.admin_master')

@section('admin')
    <div class="page-content">
        <div class="container-fluid">
            <div class="row m-2 justify-content-center">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Senarai Pegawai
                            <div style="float: right">
                                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target="#CreateOfficer"><i class="fas fa-plus-circle"></i>&ensp;Tambah Pegawai</button>
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
                                <table class="table align-items-center table-flush datatable" id="OfficersTable">
                                    <thead>
                                        <tr>
                                            <th style="text-center">#</th>
                                            <th style="text-left">No Batch</th>
                                            <th style="text-center">Nama Penuh</th>
                                            <th style="text-center">Pangkat</th>
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
            <div class="modal fade" id="CreateOfficer" tabindex="-1" role="dialog" aria-labelledby="OfficersSettingTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Tambah Pegawai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('officers.store') }}" method="POST" id="CreateOfficersForm" enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group pb-2">
                                    <label for="noBatch">No Batch</label>
                                    <input type="text" name="no_batch" class="form-control" placeholder="cth: SJN 122560" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="OficerName">Nama Penuh</label>
                                    <input type="text" name="officer_name" class="form-control" placeholder="cth: Ali Bin Abu" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="batchRole">Pangkat</label>
                                    <select class="form-control form-control" name="batch_role" >
                                        <option value="">Pilih Pangkat</option>
                                        <option value="1">ASP</option>
                                        <option value="2">SM</option>
                                        <option value="3">SJN</option>
                                        <option value="4">KPL</option>
                                        <option value="5">L/KPL</option>
                                        <option value="6">KONS</option>
                                        <option value="7">KPL/S</option>
                                        <option value="8">LK/S</option>
                                        <option value="9">K/S</option>
                                        <option value="10">KA</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                                <button type="submit" form="CreateOfficersForm" class="btn btn-success"><i class="fas fa-save"></i>&ensp;Simpan</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            {{-- Update Modal --}}
            <div class="modal fade" id="OfficersEdit" tabindex="-1" role="dialog" aria-labelledby="OfficersEditModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Sunting Pegawai</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <form action="{{ route('officers.store') }}" method="POST" id="OfficersEditForm" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group pb-2">
                                    <label for="noBatch">No Batch</label>
                                    <input type="text" name="no_batch" id="EditOfficerBatchNo" class="form-control" placeholder="cth: SJN 122560" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="OficerName">Nama Penuh</label>
                                    <input type="text" name="officer_name" id="EditOfficerName" class="form-control" placeholder="cth: Ali Bin Abu" required>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="batchRole">Pangkat</label>
                                    <select class="form-control form-control" id="EditOfficersRole" name="batch_role" >
                                        <option value="">Pilih Pangkat</option>
                                        <option value="1">ASP</option>
                                        <option value="2">SM</option>
                                        <option value="3">SJN</option>
                                        <option value="4">KPL</option>
                                        <option value="5">L/KPL</option>
                                        <option value="6">KONS</option>
                                        <option value="7">KPL/S</option>
                                        <option value="8">LK/S</option>
                                        <option value="9">K/S</option>
                                        <option value="10">KA</option>
                                    </select>
                                </div> 
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-ban"></i>&ensp;Batal</button>
                                <button type="submit" form="OfficersEditForm" class="btn btn-success"><i class="fas fa-save"></i>&ensp;Sunting</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <form action="{{ route('officers.store') }}" method="POST" id="DeleteOfficers" enctype="multipart/form-data">
                @method('Delete')
                @csrf
            </form>
        </div>
    </div>
@endsection