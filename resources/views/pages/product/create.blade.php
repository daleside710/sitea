@extends('layouts.front')

@push('page_css')
@endpush

@push('menu_name')
    <h1 data-title-border>{{ ucfirst(__('word.product')) }}</h1>
@endpush

@push('menu_path')
    <li><a href="{{ url('/') }}">{{ __('word.home') }}</a></li>
    <li class="active color_777">{{ __('word.product') }}</li>
@endpush


@push('page_content')
    <div class="container">
        <form class="float-left form-horizontal container-fluid mb-5" method="POST"
              action="{{ url( 'product/ajax/create' ) }}" autocomplete="off" enctype="multipart/form-data">
            @csrf
            <div class="card bg-light">
                <div class="card-header">
                    <h2 class="float-left card-title lh-30px mb-0">{{ ucfirst(__( 'word.add' )) }}</h2>
                    <a href="{{ url('product') }}" class="float-right btn btn-primary">
                        <i class="fas fa-reply"></i> {{ ucfirst(__('word.back')) }}
                    </a>
                </div>
                <div class="card-body">
                    <div class="form-row error-alert">
                        @if($errors->any())
                            <div class="col-12">
                                <div class="alert alert-quaternary">
                                    {{$errors->first()}}
                                </div>
                            </div>
                        @endif
                    </div>

                    @for( $i = 0; $i < count( $attributes ); $i ++ )
                        @if( $i % 2 == 0 )
                            <div class="form-row">
                        @endif

                        <div class="col-6">
                            <div class="form-group">
                                <label class="required font-weight-bold text-dark text-2">{{ ucfirst( $attributes[$i]->name ) }}</label>

                                @if( $attributes[$i]->type === 'text' )
                                    <input type="text" name="{{ $attributes[$i]->name }}" class="form-control"/>
                                @elseif( $attributes[$i]->type === 'number' )
                                    <input type="number" name="{{ $attributes[$i]->name }}" class="form-control" step="0.01"/>
                                @elseif( $attributes[$i]->type === 'file' )
                                    <input type="file" class="form-control-file" name="{{ $attributes[$i]->name }}">
                                @endif
                            </div>
                        </div>

                        @if( $i % 2 == 1 )
                            </div>
                        @endif
                    @endfor

                    @if( count( $attributes ) % 2 == 0 )
                        </div>
                    @endif
                </div>
                <div class="card-footer text-muted text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> {{ ucfirst(__('word.save')) }}</button>
                    <a href="{{ url('product') }}" class="btn btn-default">{{ ucfirst(__('word.cancel')) }} <i class="fas fa-reply"></i></a>
                </div>
            </div>
        </form>
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