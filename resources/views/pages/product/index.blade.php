@extends('layouts.front')

@push('page_css')
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/datatables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.ext.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('library/DataTables/Select-1.3.0/css/select.bootstrap4.min.css') }}">
@endpush

@push('menu_name')
    <h1 data-title-border>{{ ucfirst(__('word.product')) }}</h1>
@endpush

@push('menu_path')
    <li><a href="{{ url('/') }}">{{ __('word.home') }}</a></li>
    <li class="active color_777">{{ __('word.product') }}</li>
@endpush


@push('page_content')
    <div class="container-fluid bg-white py-3">
        <div class="row">
            <div class="col-12 text-left mb-3">
                <a href="{{ url('product/create') }}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> {{ ucfirst( __('word.add') ) }}
                </a>
            </div>
            <div class="col-12">
                <table id="tbl_product" class="table table-bordered table-hover dataTable display responsive no-wrap" width="100%">
                    <thead>
                    <tr>
                        <th class="text-center text-middle fs-12px min-width-50px"></th>

                        @for( $i = 0; $i < count( $attributes ); $i ++ )
                            <th class="text-center text-middle fs-12px min-width-50px"></th>
                        @endfor

                        <th class="text-center text-middle fs-12px min-width-50px"></th>
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

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

            $('#tbl_product').dataTable({
                "processing": true,
                "serverSide": true,
                "responsive": true,
                "fixedHeader": true,
                "stateSave": true,

                "ajax": {
                    "url": "{!! url( 'product/ajax/load' ) !!}",
                    "type": "POST",
                    "data": function (d) {
                    }
                },

                language: DataTable.Language,
                "pageLength": 10,
                "searching": true,
                "order": [  ],

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
                    @for( $i = 0; $i < count( $attributes ); $i ++ )
                        {
                            "title": "{!! ucfirst($attributes[$i]->name) !!}",
                            "data": "{!! $attributes[$i]->name !!}",
                            "searchable": false,
                            "orderable": true,
                            "class": "text-center text-middle fs-12px",
                            "type": "string",
                            @if( $attributes[$i]->type === 'file' )
                                "render": function (data, type, row, meta) {
                                    let html = '<img src="{!! asset('/img/product') !!}/' + data + '" width="50px" height="50px"/>';
                                    return html;
                                }
                            @endif
                        },
                    @endfor
                    {
                        "title": "{!! ucfirst(__( 'word.action' )) !!}",
                        "data": null,
                        "searchable": false,
                        "orderable": false,
                        "class": "text-center text-middle fs-12px actions",
                        "type": "html",
                        "render": function (data, type, row, meta) {
                            let html = '';

                            html = '<a href="{!! url('product/edit') !!}/' + row.id + '" class="edit-row mr-3 fs-14px text-decoration-none"><i class="icon-pencil icons"></i></a>' +
                                '<a href="#" class="remove-row fs-14px text-decoration-none"><i class="icon-trash icons"></i></a>';

                            return html;
                        }
                    }
                ]
            });

            let data = null;

            $("#tbl_product").on('click', 'a.remove-row', function (e) {
                e.preventDefault();

                let $row = $(this).closest('tr');
                data = $('#tbl_product').dataTable().api().row($row).data();

                $('#modal_delete').modal('show');
            });

            $(document).on('click', '#modal_delete .modal-confirm', function (e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ url( 'product/ajax/delete' ) }}',
                    method: 'POST',
                    data: {
                        id: data.id
                    },
                    success: function (result, status, xhr) {
                        data = null;
                        $('#modal_delete').modal('hide');
                        $("#tbl_product").dataTable().api().ajax.reload();
                    },
                    error: function (xhr, status, error) {
                        $('#tbl_product').modal('hide');
                    }
                });
            });
        });
    </script>
@endpush