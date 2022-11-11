$(document).ready(function () {
    
    if ($('#UsersTable').length > 0) {
        var UsersTable = $('#UsersTable').DataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            ajax: {
                "url": "/users/ajax",
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
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'email',
                    name: 'email',
                },
                {
                    data: 'id',
                    name: 'id',
                    orderable: false,
                    className: "text-center",
                    render: function (data, type, row) {
                        if (data != null) {
                            let del = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-danger UsersDelete"><i class="fas fa-trash"></i></button>';
                            let edit = '<button data-id="' + data + '" class="btn btn-sm d-sm-inline-block btn-primary UsersEdit"><i class="fas fa-edit"></i></button>';
                            return type === 'display' ?
                                edit+'&nbsp;'+del : null;
                        } else {
                            return '';
                        }
                    },
                },
            ],
            pageLength: 10,
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
    
    $(document).on('click', '.UsersEdit', function () {
        let id = $(this).data("id");
        $.ajax({
            type: 'POST',
            url: '/users/edit',
            data: {
                _token: $('meta[name="csrf-token"]').attr('content'),
                id: id,
            },
            success: function (result) {
                if (result) {
                    console.log(result);
                    console.log(result);
                    console.log(result);
                    $('#EditUsers').attr('action', '/users/' + result.id + '/update');
                    $('#EditName').val(result.name);
                    $('#EditEmail').val(result.email);
                    $('#EditUser').modal('toggle');
                    // $('#EditCar').show();
                }
            },
        });
    });


    $(document).on('click', '.UsersDelete', function () {
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
                $('#DeleteUser').attr('action', '/users/' + id);
                $('#DeleteUser').submit();
            }
        })
    });

});