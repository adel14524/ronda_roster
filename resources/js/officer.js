$(document).ready(function() {
    if ($('#OfficersTable').length > 0) {
        var CarsTable = $('#OfficersTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "officers/ajax",
                "type": "POST",
                "data": function (d) {
                    d._token = $('meta[name="csrf-token"]').attr('content');
                },
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                    className: "text-center",
                },
                {
                    data: 'batch_num',
                    name: 'batch_num',
                    render: function (data, type, row) {
                        return  row.batch_num ;
                        return  row.role_batch + ' ' + row.batch_num ;
                    }
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'pangkat',
                    name: 'pangkat',
                },
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    className: "text-center",
                    render: function (data, type, row) {
                        if (data != null) {
                            let edit = '<button data-id="' + data + '" class="btn d-sm-inline-block btn-primary btn-sm OfficersEdit" data-toggle="modal"><i class="fas fa-edit"></i></button>';
                            let del = '<button data-id="' + data + '" class="btn d-sm-inline-block btn-danger btn-sm OfficersDelete"><i class="fas fa-trash"></i></button>';
                            return type === 'display' ?
                                edit+'&nbsp;'+del : null;
                        } else {
                            return '';
                        }
                    },
                },
                {
                    data: 'role_batch',
                    name: 'role_batch',
                    render: function (data, type, row) {
                        return row.role_batch;
                    }
                },
            ],
            order: [[5, 'asc']],

            pageLength: 25,

            columnDefs: [
                {
                    target: 5,
                    visible: false,
                },
            ],

            language: {
                zeroRecords: "Tiada rekod untuk dipaparkan.",
                paginate: {
                    next: "<i class='fas fa-chevron-right'></i>",
                    previous: "<i class='fas fa-chevron-left'></i>",
                    first: "<<",
                    last: ">>",
                },
                info: "Paparan _START_ / _END_ dari _TOTAL_ rekod",
                infoEmpty: "Paparan 0 / 0 dari 0 rekod",
                infoFiltered: "(tapisan dari _MAX_ rekod)",
                processing: "Sila tunggu...",
                search: "Carian:",
                emptyTable: "Tiada rekod untuk dipaparkan",
                lengthMenu: "Papar _MENU_ item",
            }
        });
    }

    $(document).on('click', '.OfficersEdit', function () {
        console.log('hello');
        let id = $(this).data("id");
        $.ajax({
            type: 'POST',
            url: '/officers/edit',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (result) {
                console.log(result);
                if (result) {
                    $('#OfficersEditForm').attr('action', '/officers/' + result.id + '/update');
                    $('#EditOfficerBatchNo').val(result.batch_num);
                    $('#EditOfficerName').val(result.name);
                    $('#EditOfficersRole').val(result.role_batch);
                    $('#OfficersEdit').modal('toggle');
                }
            },
        });
    });


    $(document).on('click', '.OfficersDelete', function () {
        let id = $(this).data('id');
        Swal.fire({
            title: 'Adakah anda pasti ?',
            text: "Proses ini tidak boleh diundur!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, padam!',
            cancelButtonText: "Batal"
        }).then((result) => {
            if (result.isConfirmed) {
                console.log("djklfhusioadf");
                $('#DeleteOfficers').attr('action', '/officers/' + id);
                $('#DeleteOfficers').submit();
            }
        })
    });
});