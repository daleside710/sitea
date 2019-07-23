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
        <div class="container">
            <div class="featured-boxes featured-boxes-style-8">
                <div class="row">
                    <div class="col-12">
                        <div class="featured-box featured-box-primary featured-box-text-left mt-0">
                            <div class="box-content p-5">
                                <div class="row">
                                    <div class="col-9">
                                        <h2 class="word-rotator letters scale mb-2">
                                            <span>{{ ucfirst(__('word.attributes')) }} </span>
                                            <span class="word-rotator-words">
											    <b class="is-visible ">{{ ucfirst(__('word.show')) }}</b>
											    <b>{{ ucfirst(__('word.hide')) }}</b>
                                            </span>
                                        </h2>
                                    </div>
                                    <div class="col-3">
                                        <div class="text-right">
                                            <i class="icon-featured far fa-edit"></i>
                                        </div>
                                    </div>
                                </div>
                                @for( $i = 0; $i < count( $attributes ); $i ++ )
                                    @if( $i % 3 === 0 )
                                        <div class="row">
                                            @endif

                                            <div class="col-4">
                                                <div class="custom-control custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="chk_{{ $attributes[$i]->name }}" value="{{ $attributes[$i]->name }}" checked>
                                                    <label class="custom-control-label" for="chk_{{ $attributes[$i]->name }}">{{ ucfirst($attributes[$i]->name) }}</label>
                                                </div>
                                            </div>

                                            @if( $i % 3 === 2 )
                                        </div>
                                    @endif
                                @endfor
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            @if( count($products) > 0 )
                <div class="pricing-table mb-4">

                    @for( $i = 0; $i < count( $products ); $i ++ )

                        @if( $i % 3 === 0 )
                            <div class="col-md-6 col-lg-3">
                                <div class="plan">
                                    <div class="plan-header">
                                        <h3>
                                            {{ ucfirst(__('word.name')) }}
                                        </h3>
                                    </div>
                                    <div class="plan-logo">
                                        {{ ucfirst(__('word.logo')) }}
                                    </div>
                                    <div class="plan-price">
                                        <span class="price">{{ ucfirst(__('word.price')) }}</span>
                                    </div>
                                    <div class="plan-features">
                                        <ul>
                                            @for( $j = 0; $j < count( $attributes ); $j ++ )
                                                @if( $attributes[$j]->name != 'name' &&
                                                $attributes[$j]->name != 'logo' &&
                                                $attributes[$j]->name != 'price' &&
                                                $attributes[$j]->name != 'link_url' )
                                                    <li>{{ $attributes[$j]->name }}</li>
                                                @endif
                                            @endfor
                                        </ul>
                                    </div>
                                    <div class="plan-footer">
                                        <a href="#" class="btn btn-light btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.linked_url')) }}</a>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <div class="col-md-6 col-lg-3">
                            <div class="plan">
                                @if( $i % 3 === 0)
                                    <div class="plan-header bg-primary">
                                @elseif( $i % 3 === 1)
                                    <div class="plan-header bg-success">
                                @elseif( $i % 3 === 2)
                                    <div class="plan-header bg-danger">
                                @endif
                                    <h3>
                                        @if( isset( $products[$i]->name ) )
                                            {{ $products[$i]->name }}
                                        @endif
                                    </h3>
                                </div>
                                <div class="plan-logo">
                                    @if( isset( $products[$i]->logo ) )
                                        <img src="{{ asset('/img/product') }}/{{ $products[$i]->logo }}"/>
                                    @endif
                                </div>
                                <div class="plan-price">
                                    @if( isset( $products[$i]->price ) )
                                        <span class="price"><span class="price-unit">$</span>{{ $products[$i]->price }}</span>
                                    @endif
                                </div>
                                <div class="plan-features">
                                    <ul>
                                        @for( $j = 0; $j < count( $attributes ); $j ++ )
                                            @if( $attributes[$j]->name != 'name' &&
                                            $attributes[$j]->name != 'logo' &&
                                            $attributes[$j]->name != 'price' &&
                                            $attributes[$j]->name != 'link_url' )
                                                <li>{{ $products[$i][$attributes[$j]->name] }}</li>
                                            @endif
                                        @endfor
                                    </ul>
                                </div>
                                <div class="plan-footer">
                                    @if( $i % 3 === 0)
                                        @if( isset( $products[$i]->link_url ) )
                                            <a href="{{ $products[$i]->link_url }}" target="_blank" class="btn btn-primary btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @else
                                            <a href="#" target="_blank" class="btn btn-primary btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @endif
                                    @elseif( $i % 3 === 1)
                                        @if( isset( $products[$i]->link_url ) )
                                            <a href="{{ $products[$i]->link_url }}" target="_blank" class="btn btn-success btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @else
                                            <a href="#" target="_blank" class="btn btn-success btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @endif
                                    @elseif( $i % 3 === 2)
                                        @if( isset( $products[$i]->link_url ) )
                                            <a href="{{ $products[$i]->link_url }}" target="_blank" class="btn btn-danger btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @else
                                            <a href="#" target="_blank" class="btn btn-danger btn-modern btn-outline py-2 px-4">{{ ucfirst(__('word.buy_now')) }}</a>
                                        @endif
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            @endif
        </div>

        <div class="container">
            <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
                <section class="toggle active">
                    <label>Example of Animals</label>
                    <div class="toggle-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. Proin adipiscing porta tellus, ut feugiat nibh adipiscing sit amet. In eu justo a felis faucibus ornare vel id metus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; In eu libero ligula. Fusce eget metus lorem, ac viverra leo. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur pellentesque neque eget diam posuere porta. Quisque ut nulla at nunc <a href="#">vehicula</a> lacinia. </p>
                    </div>
                </section>
                <section class="toggle">
                    <label>Example of Humans</label>
                    <div class="toggle-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.</p>
                    </div>
                </section>
                <section class="toggle">
                    <label>Example of Penguins</label>
                    <div class="toggle-content">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Nullam tortor nunc, bibendum vitae semper a, volutpat eget massa. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer fringilla, orci sit amet posuere auctor, orci eros pellentesque odio, nec pellentesque erat ligula nec massa. Aenean consequat lorem ut felis ullamcorper posuere gravida tellus faucibus. Maecenas dolor elit, pulvinar eu vehicula eu, consequat et lacus. Duis et purus ipsum. In auctor mattis ipsum id molestie. Donec risus nulla, fringilla a rhoncus vitae, semper a massa. Vivamus ullamcorper, enim sit amet consequat laoreet, tortor tortor dictum urna, ut egestas urna ipsum nec libero. Nulla justo leo, molestie vel tempor nec, egestas at massa. Aenean pulvinar, felis porttitor iaculis pulvinar, odio orci sodales odio, ac pulvinar felis quam sit.</p>
                    </div>
                </section>
            </div>
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