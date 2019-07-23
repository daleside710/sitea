@extends('layouts.front')

@push('page_css')

@endpush

@push('menu_name')
    <h1 data-title-border>{{__('word.sign_up')}}</h1>
@endpush

@push('menu_path')
    <li><a href="{{ url('/') }}">{{__('word.home')}}</a></li>
    <li class="active">{{__('word.sign_up')}}</li>
@endpush

@push('page_content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="featured-box featured-box-primary text-left mt-0">
                    <div class="box-content">
                        <form action="{{ url('/register') }}" id="frmSignUp" method="post" class="needs-validation">
                            @csrf

                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="font-weight-bold text-dark text-2">{{__('word.username')}}</label>
                                    <input type="text" class="form-control form-control-lg" name="user_id" value="{{ old('user_id') }}" required autocomplete="user_id" autofocus>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label class="font-weight-bold text-dark text-2">{{__('word.email_address')}}</label>
                                    <input type="email" class="form-control form-control-lg" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label class="font-weight-bold text-dark text-2">{{__('word.password')}}</label>
                                    <input type="password" class="form-control form-control-lg" name="password" required autocomplete="new-password">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label class="font-weight-bold text-dark text-2">{{__('word.reenter_password')}}</label>
                                    <input type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-9">
                                    {{--<div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="terms">
                                        <label class="custom-control-label text-2" for="terms">I have read and agree to the <a href="#">terms of service</a></label>
                                    </div>--}}
                                </div>
                                <div class="form-group col-lg-3">
                                    <input type="submit" value="{{__('word.register')}}" class="btn btn-primary btn-modern float-right" data-loading-text="Loading...">
                                </div>
                            </div>

                            @error('user_id')
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="alert alert-primary">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @enderror

                            @error('email')
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="alert alert-secondary">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @enderror

                            @error('password')
                                <div class="form-row">
                                    <div class="form-group col">
                                        <div class="alert alert-quaternary">
                                            <strong>{{ $message }}</strong>
                                        </div>
                                    </div>
                                </div>
                            @enderror

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endpush

@push('page_js')

    <script type="text/javascript">
        $(document).ready(function() {
            'use strict';

            $('input[name="user_id"], input[name="email"], input[name="password"]').on("keyup", function(e){
                $('.alert').parent().parent().remove();
            });
        });
    </script>

@endpush