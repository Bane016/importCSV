@extends('layouts.app')

@section('content')
    <div class="container">
        <button class="btn btn-primary add-new-row col-2">Add new row</button>
        <div class="row justify-content-center">
            <table id="medicinePersonal"
                   class="table table-hover">
                <thead>
                <tr>
                    <th>User</th>
                    <th>Client</th>
                    <th>Client Type</th>
                    <th>Type of Call</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade pt-5" id="addModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content color_white">
                <div class="modal-header">
                    <label class="label-text">Add new row in table</label>
                </div>
                <div class="modal-body">
                    <form id="add-new-row">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="User">User</label>
                                    <input type="text"
                                    class="form-control"
                                    id="user" name="user"
                                    placeholder="User"
                                    value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Client">Client</label>
                                    <input type="text"
                                    class="form-control"
                                    id="client" name="client"
                                    placeholder="Client"
                                    value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Client Type">Client type</label>
                                    <select type="text" class="form-select" id="client_type" name="client_type">
                                        <option value="Nurse">Carer</option>
                                        <option value="Carer">Nurse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Date">Date</label>
                                    <input type="datetime-local"
                                           class="form-control"
                                    id="date" name="date"
                                    value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Duration">Duration</label>
                                    <input type="number"
                                    class="form-control"
                                    id="duration" name="duration"
                                    placeholder="Duration"
                                    value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Type of call">Type of call</label>
                                    <select type="text" class="form-select" id="type_of_call" name="type_of_call">
                                        <option value="Incoming">Incoming</option>
                                        <option value="Outgoing">Outgoing</option>
                                    </select>
                                    {{--                                    <input type="text"--}}
                                    {{--                                    class="form-control"--}}
                                    {{--                                    id="client" name="client"--}}
                                    {{--                                    placeholder="Client"--}}
                                    {{--                                    value="">--}}
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="External call score">External call score</label>
                                    <input type="number"
                                    class="form-control"
                                    id="external_call_score" name="external_call_score"
                                    placeholder="External call store"
                                    value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-block" id="alert-response-add-row" style="display: none;">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-5">
                            <button class="btn btn-secondary" id="cancel-add">
                                Cancel
                            </button>
                        </div>
                        <div class="col-md-7">
                            <button type="submit" id="submit-row"
                                    class="btn btn-primary">Create</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade pt-5" id="editModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content color_white">
                <div class="modal-header">
                    <label class="label-text">Edit selected row</label>
                </div>
                <div class="modal-body">
                    <form id="edit-row">
                        <input type="hidden" name="id_edit" id="id_edit">
                        <div class="form-group">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="User">User</label>
                                    <input type="text"
                                           class="form-control"
                                           id="user_edit" name="user_edit"
                                           placeholder="User"
                                           value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Client">Client</label>
                                    <input type="text"
                                           class="form-control"
                                           id="client_edit" name="client_edit"
                                           placeholder="Client"
                                           value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Client Type">Client type</label>
                                    <select type="text" class="form-select" id="client_type_edit" name="client_type_edit">
                                        <option value="Nurse">Carer</option>
                                        <option value="Carer">Nurse</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row" style="padding-top: 10px">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Date">Date</label>
                                    <input type="datetime-local"
                                           class="form-control"
                                           id="date_edit" name="date_edit"
                                           value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Duration">Duration</label>
                                    <input type="number"
                                           class="form-control"
                                           id="duration_edit" name="duration_edit"
                                           placeholder="Duration"
                                           value="">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="Type of call">Type of call</label>
                                    <select type="text" class="form-select" id="type_of_call_edit" name="type_of_call_edit">
                                        <option value="Incoming">Incoming</option>
                                        <option value="Outgoing">Outgoing</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label class="label-text" for="External call score">External call score</label>
                                    <input type="number"
                                           class="form-control"
                                           id="external_call_score_edit" name="external_call_score_edit"
                                           placeholder="External call store"
                                           value="">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div class="alert alert-block" id="alert-response-edit-row" style="display: none;">
                                        <strong></strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-5">
                            <button class="btn btn-secondary" id="cancel-edit">
                                Cancel
                            </button>
                        </div>
                        <div class="col-md-7">
                            <button type="submit" id="submit-row-edit"
                                    class="btn btn-primary submit-row-edit">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade pt-5" id="viewModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content color_white">
                <div class="modal-header">
                    View full info for selected row
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Id">ID</label>
                            <input type="text"
                                   class="form-control"
                                   id="id_view" name="id_view"
                                   placeholder="ID"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="User">User</label>
                            <input type="text"
                                   class="form-control"
                                   id="user_view" name="user_view"
                                   placeholder="User"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Client">Client</label>
                            <input type="text"
                                   class="form-control"
                                   id="client_view" name="client_view"
                                   placeholder="Client"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Client Type">Client Type</label>
                            <input type="text"
                                   class="form-control"
                                   id="client_type_view" name="client_type_view"
                                   placeholder="Client Type"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row" style="padding-top: 10px">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Date">Date</label>
                            <input type="text"
                                   class="form-control"
                                   id="date_view" name="date_view"
                                   placeholder="Date"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Duration">Duration</label>
                            <input type="number"
                                   class="form-control"
                                   id="duration_view" name="duration_view"
                                   placeholder="Duration"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="Type of call">Type of call</label>
                            <input type="text"
                                   class="form-control"
                                   id="type_of_call_view" name="type_of_call_view"
                                   placeholder="Type of call"
                                   readonly
                                   value="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label class="label-text" for="External call score">External call score</label>
                            <input type="number"
                                   class="form-control"
                                   id="external_call_score_view" name="external_call_score_view"
                                   placeholder="External call store"
                                   readonly
                                   value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" id="cancel-view">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade pt-5" id="deleteModal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content -->
            <div class="modal-content color_white">
                <div class="modal-body">
                    <h5 class="modal-text" style="word-break: break-word"></h5>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <div class="alert alert-block" id="alert-response-delete-row" style="display: none;">
                                <strong></strong>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="yes_row" class="btn btn-primary yes_row">Yes</button>
                    <button class="btn btn-secondary" id="cancel-delete">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.21.0/slimselect.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.css" rel="stylesheet"></link>
    <style lang="scss">

    </style>
@endsection

@section('scripts')
    <script type="text/javascript"
            src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js" defer></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js" defer></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js" defer></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" defer></script>

    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.1/slimselect.min.js"></script>

    <script>
        $(document).ready(function () {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let table = $('#medicinePersonal').DataTable({
                responsive: true,
                lengthChange: false,
                "processing": false,
                ajax: {
                    url: `{{ route('get-medicinePersonal') }}`,
                    method: 'POST',
                    dataType: 'json'
                },
                columns: [
                    {
                        data: 'user'
                        // render: function (data, type, full, meta) {
                        //     return full.user;
                        // }
                    },
                    {
                        data: 'client'
                        // render: function (data, type, full, meta) {
                        //     return full.client;
                        // }
                    },
                    {
                        data: 'client_type'
                        // render: function (data, type, full, meta) {
                        //     return full.client;
                        // }
                    },
                    {
                        data: 'type_of_call'
                    },
                    {
                        sortable: false,
                        render: function (data, type, full, meta) {
                            return `<a class="popup row_view btn btn-primary text-white" data-row_id="${full.id}"
                                    data-row_user="${full.user}" data-row_client="${full.client}"
                                    data-row_client_type="${full.client_type}" data-row_date="${full.date}"
                                    data-row_duration="${full.duration}" data-row_type_of_call="${full.type_of_call}"
                                    data-row_external_call_score="${full.external_call_score}"
                                    style="padding-right: 10px"><i class="fas fa-plus-circle"></i></a>
                                <a class="popup row_edit btn btn-primary text-white" data-row_id="${full.id}"
                                    data-row_user="${full.user}" data-row_client="${full.client}"
                                    data-row_client_type="${full.client_type}" data-row_date="${full.date}"
                                    data-row_duration="${full.duration}" data-row_type_of_call="${full.type_of_call}"
                                    data-row_external_call_score="${full.external_call_score}"
                                    style="padding-right: 10px"><i class="fas fa-user-edit"></i></a>
                                <a class="popup row_delete btn btn-danger text-white" data-row_id="${full.id}"
                                    style="padding-right: 10px"><i class="far fa-trash-alt"></i></a>`
                        }
                    }
                ],
                "initComplete": function (settings, json) {

                }
            })

            $('.add-new-row').on('click', function () {

                $('#cancel-add').on('click', function () {
                    $('#addModal').modal('hide');
                })
                $('#addModal').modal('show');
            });

            $('#submit-row').on('click', function (e) {
                e.preventDefault();
                var form_data = new FormData();
                let fields= $("#add-new-row").serializeArray();

                fields.forEach(function (el) {
                    form_data.append(el.name, el.value)
                })

                $.ajax({
                    method: "POST",
                    url: "{{ route("add-row")  }}",
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: form_data,
                    success: function (data) {
                        let modal_response = $('#alert-response-add-row');
                        if (data.success) {
                            modal_response.removeClass("alert-danger");
                            modal_response.addClass("alert-success").show();
                            $("alert-response-add-row > strong").text(data.message);
                            setTimeout(function () {
                                $("#alert-response-add-row").fadeOut('slow');
                            }, 2000)
                            setTimeout(function () {
                                $("#addModal").modal('hide');
                                table.ajax.reload(null,false)
                            }, 3000)
                        } else {
                            modal_response.removeClass("alert-success");
                            modal_response.addClass("alert-danger").show()
                            $("#alert-response-add-row > strong").text(data.message);
                            setTimeout(function () {
                                $("#alert-response-add-row").fadeOut('slow');
                            }, 2000)
                        }
                    },
                    error: function (response) {
                        if (response.status === 401) {
                            $(".response-message").text("You're have samo problems with add row").addClass('text-danger').show();
                            setTimeout(function () {
                                $(".response-message").text('').removeClass('text-danger').hide();
                            }, 3000)
                        } else {
                            let errors = response.responseJSON.errors;
                            for (let key in errors) {
                                $(".error-" + key).text(errors[key]).show();
                                setTimeout(function () {
                                    $(".error-" + key).text('').fadeOut()
                                }, 3000)
                            }
                        }
                    }
                })
            })

            $(document).on('click', '.row_edit', function () {

                row = $(this);
                row_id = $(this).attr('data-row_id');
                row_user = $(this).attr('data-row_user')
                row_client = $(this).attr('data-row_client')
                row_client_type = $(this).attr('data-row_client_type')
                row_date = $(this).attr('data-row_date')
                row_duration = $(this).attr('data-row_duration')
                row_type_of_call = $(this).attr('data-row_type_of_call')
                row_external_call_score = $(this).attr('data-row_external_call_score')

                $('#id_edit').attr('value', row_id)
                $('#user_edit').attr('value', row_user)
                $('#client_edit').attr('value', row_client)
                $('#client_type_edit').attr('value', row_client_type)
                $('#date_edit').attr('value', row_date)
                $('#duration_edit').attr('value', row_duration)
                $('#type_of_call_edit').attr('value', row_type_of_call)
                $('#external_call_score_edit').attr('value', row_external_call_score)

                $('#cancel-edit').on('click', function () {
                    $('#editModal').modal('hide');
                })
                $('#editModal').modal('show');
            });


            $('.submit-row-edit').on('click', function (e) {
                e.preventDefault()
                // $("#row_id_edit").val()
                let fields = $("#edit-row").serializeArray();
                $.ajax({
                    url: `{{ route('edit-row') }}`,
                    method: 'POST',
                    data: fields,
                    success: function (data) {
                        let modal_response = $('#alert-response-edit-row');
                        if (data.success) {
                            modal_response.removeClass("alert-danger");
                            modal_response.addClass("alert-success").show();
                            $('#alert-response-edit-row > strong').text(data.message);
                            setTimeout(function () {
                                $('#alert-response-edit-row').fadeOut('slow');
                            }, 2000);
                            setTimeout(function () {
                                $('#editModal').modal('hide');
                                table.ajax.reload(null,false)
                            }, 3000)
                        } else {
                            modal_response.removeClass("alert-success");
                            modal_response.addClass("alert-danger").show();
                            $('#alert-response-edit-row > strong').text(data.message);
                            setTimeout(function () {
                                $('#alert-response-edit-row').fadeOut('slow');
                            }, 2000);
                        }
                    },
                    error: function (error) {
                        let errors = error.responseJSON.errors;
                        for (let key in errors) {
                            $("#edit-ad-error-" + key).text(errors[key]).show();
                            setTimeout(function () {
                                $("#edit-ad-error-" + key).hide();
                            }, 5000)
                        }
                    },
                });
            });

            $(document).on('click', '.row_view', function () {
                row_id = $(this).attr('data-row_id');
                row_user = $(this).attr('data-row_user')
                row_client = $(this).attr('data-row_client')
                row_client_type = $(this).attr('data-row_client_type')
                row_date = $(this).attr('data-row_date')
                row_duration = $(this).attr('data-row_duration')
                row_type_of_call = $(this).attr('data-row_type_of_call')
                row_external_call_score = $(this).attr('data-row_external_call_score')


                $('#id_view').attr('value', row_id)
                $('#user_view').attr('value', row_user)
                $('#client_view').attr('value', row_client)
                $('#client_type_view').attr('value', row_client_type)
                $('#date_view').attr('value', row_date)
                $('#duration_view').attr('value', row_duration)
                $('#type_of_call_view').attr('value', row_type_of_call)
                $('#external_call_score_view').attr('value', row_external_call_score)


                $('#cancel-view').on('click', function () {
                    $('#viewModal').modal('hide');
                })

                $('#viewModal').modal('show');
            })

            $(document).on('click', '.row_delete', function () {
                row_id = $(this).attr('data-row_id');
                delete_btn = $(this);
                $('.yes_row').attr('data-value', row_id);
                $('.modal-text').text('This row will be removed from database. Do you want to proceed?');

                $('#cancel-delete').on('click', function () {
                    $('#deleteModal').modal('hide')
                })
                $('#deleteModal').modal('show');
            })


            $('.yes_row').on('click', function () {
                $.ajax({
                    url: `{{ route('delete-row')  }}`,
                    method: `POST`,
                    async: false,
                    dataType: `JSON`,
                    data: {
                        'id': row_id
                    },
                    success: function (data) {
                        let modal_response = $('#alert-response-delete-row');
                        if (data.success) {
                            modal_response.removeClass("alert-danger");
                            modal_response.addClass("alert-success").show();
                            $('#alert-response-delete-row > strong').text(data.message);
                            setTimeout(function () {
                                $('#alert-response-delete-row').fadeOut('slow');
                            }, 2000);
                            setTimeout(function () {
                                $('.alert-success').hide();
                                $('#deleteModal').modal('hide');
                                table.ajax.reload(null,false)
                            }, 3000)
                        } else {
                            modal_response.removeClass("alert-danger");
                            modal_response.addClass("alert-success").show();
                            $('#alert-response-delete-row > strong').text(data.message);
                        }
                    },
                })
            })

        });
    </script>
@endsection
