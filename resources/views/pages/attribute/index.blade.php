@extends('layouts.front')

@push('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.ext.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/Select-1.3.0/css/select.bootstrap4.min.css') }}">
@endpush

@push('menu_name')
    <h1 data-title-border>{{ ucfirst(__('word.attribute')) }}</h1>
@endpush

@push('menu_path')
    <li><a href="{{ url('/') }}">{{ __('word.home') }}</a></li>
    <li class="active color_777">{{ __('word.attribute') }}</li>
@endpush


@push('page_content')
    <div class="container-fluid bg-white py-3">
        <div class="row">
            <div class="col-12 text-left mb-3">
                <a id="btn_add" href="javascript: void(0)" class="btn btn-primary">
                    <i class="fas fa-plus"></i> {{ ucfirst( __('word.add') ) }}
                </a>
            </div>
            <div class="col-12">
                <table id="tbl_attribute" class="table table-bordered table-hover dataTable display responsive no-wrap" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    @component('components\modal-add', ['id' => 'modal_add', 'form_id' => 'frm_add'])
        <form id="frm_add" class="container-fluid" method="POST"
              action="{{ url( 'attribute/ajax/create' ) }}" autocomplete="off" target="ifrm_add"
              class="needs-validation">
            @csrf
            <div class="form-row error-alert">
                @if($errors->any())
                    <div class="col-12">
                        <div class="alert alert-quaternary">
                            {{$errors->first()}}
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.name')) }}</label>
                        <input type="text" name="name" class="form-control" maxlength="15" required/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.display_order')) }}</label>
                        <input type="number" name="display_order" class="form-control" min="1" required/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.type')) }}</label>
                        <select name="type" class="form-control">
                            <option value="text">{{__('word.text')}}</option>
                            <option value="number">{{__('word.number')}}</option>
                            <option value="file">{{__('word.file')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label class="font-weight-bold text-dark text-2">{{ ucfirst(__('word.memo')) }}</label>
                    <textarea maxlength="255" rows="3" class="form-control" name="memo"></textarea>
                </div>
            </div>
        </form>
        <iframe id="ifrm_add" name="ifrm_add" class="display-none"></iframe>
    @endcomponent

    @component('components\modal-edit', ['id' => 'modal_edit', 'form_id' => 'frm_edit'])
        <form id="frm_edit" class="container-fluid" method="POST"
              action="{{ url( 'attribute/ajax/update' ) }}" autocomplete="off" target="ifrm_edit"
              class="needs-validation">
            @csrf

            <input type="hidden" name="id" value="-1"/>

            <div class="form-row error-alert">
                @if($errors->any())
                    <div class="col-12">
                        <div class="alert alert-quaternary">
                            {{$errors->first()}}
                        </div>
                    </div>
                @endif
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.name')) }}</label>
                        <input type="text" name="name" class="form-control" maxlength="15" required/>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.display_order')) }}</label>
                        <input type="number" name="display_order" class="form-control" min="1" required/>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-6">
                    <div class="form-group">
                        <label class="required font-weight-bold text-dark text-2">{{ ucfirst(__('word.type')) }}</label>
                        <select name="type" class="form-control">
                            <option value="text">{{__('word.text')}}</option>
                            <option value="number">{{__('word.number')}}</option>
                            <option value="file">{{__('word.file')}}</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-12">
                    <label class="font-weight-bold text-dark text-2">{{ ucfirst(__('word.memo')) }}</label>
                    <textarea maxlength="255" rows="3" class="form-control" name="memo"></textarea>
                </div>
            </div>
        </form>
        <iframe id="ifrm_edit" name="ifrm_edit" class="display-none"></iframe>
    @endcomponent

    @component('components\modal-delete', ['id' => 'modal_delete'])
    @endcomponent
@endpush

@push('page_js')
    <script type="text/javascript" src="{{ asset('library/DataTables/datatables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('library/DataTables/DataTables-1.10.18/js/dataTables.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('library/DataTables/Select-1.3.0/js/select.bootstrap4.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('library/DataTables/Localization/' . app()->getLocale() . '.js') }}"></script>
@endpush

@push('script')
    <script type="text/javascript" defer>

        $(document).ready(function () {
            'use strict';

            /**
             * DataTable Initialize
             */
            $('#tbl_attribute').dataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "fixedHeader": true,
                "stateSave": true,

                "ajax": {
                    "url": "{!! url( 'attribute/ajax/load' ) !!}",
                    "type": "POST",
                    "data": function (d) {
                    }
                },

                language: DataTable.Language,
                "pageLength": 10,
                "searching": true,
                "order": [ [2, "asc"], [1,"asc"] ],

                "columns": [
                    {
                        "title": "{{ ucfirst(__('word.no')) }}",
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "class": "text-center text-middle fs-12px",
                        "type": "number",
                        "render": function (data, type, row, meta) {
                            return meta.settings._iDisplayStart + meta.row + 1;
                        }
                    },
                    {
                        "title": "{!! ucfirst(__( 'word.name' )) !!}",
                        "data": "name",
                        "searchable": true,
                        "orderable": true,
                        "class": "text-center text-middle fs-12px",
                        "type": "string"
                    },
                    {
                        "title": "{!! ucfirst(__( 'word.display_order' )) !!}",
                        "data": "display_order",
                        "searchable": true,
                        "orderable": true,
                        "class": "text-center text-middle fs-12px",
                        "type": "string"
                    },
                    {
                        "title": "{!! ucfirst(__( 'word.type' )) !!}",
                        "data": "type",
                        "searchable": true,
                        "orderable": true,
                        "class": "text-center text-middle fs-12px",
                        "type": "string"
                    },
                    {
                        "title": "{!! ucfirst(__( 'word.memo' )) !!}",
                        "data": "memo",
                        "searchable": true,
                        "orderable": false,
                        "class": "text-left text-middle fs-12px text-break",
                        "type": "string"
                    },
                    {
                        "title": "{!! ucfirst(__( 'word.action' )) !!}",
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "class": "text-center text-middle fs-12px actions",
                        "type": "html",
                        "render": function (data, type, row, meta) {
                            let html = '';

                            html = '<a href="{!! url('attribute/edit') !!}/' + row.id + '" class="edit-row mr-3 fs-14px text-decoration-none"><i class="icon-pencil icons"></i></a>' +
                                '<a href="#" class="remove-row fs-14px text-decoration-none"><i class="icon-trash icons"></i></a>';

                            return html;
                        }
                    }
                ]
            });

            /**
             * Add action
             */
            $('#btn_add').on('click', function(e){
                $.ajax({
                    url: '{{ url( 'attribute/ajax/get_display_order' ) }}',
                    method: 'POST',
                    data: { },
                    dataType: 'json',
                    success: function (result, status, xhr) {
                        $('#modal_add input[name="display_order"]').val( result.display_order );
                        $('#modal_add').modal('show');
                    },
                    error: function (xhr, status, error) {

                    }
                });
            });

            $('#frm_add').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 15
                    },
                    display_order: {
                        required: true,
                        number: true
                    }
                }
            });

            $("#ifrm_add").on("load", function () {
                let ret = $("#ifrm_add").contents().find("body").html();

                if (ret == "" || ret == undefined)
                    return;

                ret = $.parseJSON(ret);

                if (ret.code === 0) {
                    $('#modal_add').modal('hide');

                    $('#modal_add input[name="name"]').val('');
                    $('#modal_add input[name="display_order"]').val('');
                    $('#modal_add select[name="type"]').val('text');
                    $('#modal_add textarea[name="memo"]').val('');
                    $("#tbl_attribute").dataTable().api().ajax.reload();

                    PNotify.success({
                        text: "{{ __('msg.data_insert_success') }}."
                    });
                } else {
                    if( ret.code === 1 )
                        PNotify.info({
                            text: "{{ __('msg.data_insert_duplicate') }}"
                        });
                    else
                        PNotify.error({
                            text: "{{ __('msg.data_insert_error') }}"
                        });
                }
            });

            let data = null;

            /**
             * Edit Action
             */

            $('#frm_edit').validate({
                rules: {
                    name: {
                        required: true,
                        maxlength: 15
                    },
                    display_order: {
                        required: true,
                        number: true
                    }
                }
            });

            $("#tbl_attribute").on('click', 'a.edit-row', function (e) {
                e.preventDefault();

                let $row = $(this).closest('tr');
                data = $('#tbl_attribute').dataTable().api().row($row).data();

                $('#modal_edit input[name="id"]').val( data.id );
                $('#modal_edit input[name="name"]').val( data.name );
                $('#modal_edit input[name="display_order"]').val( data.display_order );
                $('#modal_edit select[name="type"]').val( data.type );
                $('#modal_edit textarea[name="memo"]').val( data.memo );

                $('#modal_edit').modal('show');
            });

            $("#ifrm_edit").on("load", function () {
                let ret = $("#ifrm_edit").contents().find("body").html();

                if (ret == "" || ret == undefined)
                    return;

                ret = $.parseJSON(ret);

                data = null;

                if (ret.code === 0) {
                    $('#modal_edit').modal('hide');

                    $("#tbl_attribute").dataTable().api().ajax.reload();

                    PNotify.success({
                        text: "{{ __('msg.data_update_success') }}."
                    });
                } else {
                    if( ret.code === 1 )
                        PNotify.info({
                            text: "{{ __('msg.data_update_duplicate') }}"
                        });
                    else
                        PNotify.error({
                            text: "{{ __('msg.data_update_error') }}"
                        });
                }
            });

            /**
             * Delete Action
             */

            $("#tbl_attribute").on('click', 'a.remove-row', function (e) {
                e.preventDefault();

                let $row = $(this).closest('tr');
                data = $('#tbl_attribute').dataTable().api().row($row).data();

                $('#modal_delete').modal('show');
            });

            $(document).on('click', '#modal_delete .modal-confirm', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ url( 'attribute/ajax/delete' ) }}',
                    method: 'POST',
                    data: {
                        id: data.id
                    },
                    success: function (result, status, xhr) {
                        data = null;
                        $('#modal_delete').modal('hide');
                        $("#tbl_attribute").dataTable().api().ajax.reload();

                        PNotify.success({
                            text: "{{ __('msg.data_delete_success') }}."
                        });
                    },
                    error: function (xhr, status, error) {
                        PNotify.error({
                            text: "{{ __('msg.data_delete_error') }}"
                        });
                    }
                });
            });
        });
    </script>
@endpush