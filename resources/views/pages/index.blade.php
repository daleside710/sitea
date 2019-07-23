@extends('layouts.front')

@push('page_css')
@endpush

@push('menu_name')
    <h1 data-title-border>{{ucfirst(__('word.home'))}}</h1>
@endpush

@push('menu_path')
@endpush

@push('page_content')

    <div class="container-fluid">
        <div class="container border-all-light">
            @for( $i = 0; $i < count( $attributes ); $i ++ )
                @if( $i % 3 === 0 )
                    <div class="row">
                @endif

                <div class="col-4">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                        <label class="custom-control-label" for="customCheck1">{{ $attributes[$i]->name }}</label>
                    </div>
                </div>

                @if( $i % 3 === 2 )
                    </div>
                @endif
            @endfor
        </div>
    </div>

@endpush

@push('page_js')
@endpush

@push('script')
    <script type="text/javascript" defer>

        $(document).ready(function () {
            'use strict';


        });

    </script>
@endpush