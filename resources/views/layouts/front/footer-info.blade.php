<!-- Vendor -->
<script src="{{ asset('themes/porto_v7.5/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.easing/jquery.easing.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.cookie/jquery.cookie.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/popper/umd/popper.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/common/common.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.gmap/jquery.gmap.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.lazyload/jquery.lazyload.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/isotope/jquery.isotope.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/owl.carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/vide/jquery.vide.min.js') }}"></script>
<script src="{{ asset('themes/porto_v7.5/vendor/vivus/vivus.min.js') }}"></script>
<script src="https://unpkg.com/pnotify@4.0.0/dist/umd/PNotify.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="{{ asset('themes/porto_v7.5/js/theme.js') }}"></script>

<!-- User JS -->
<script src="{{ asset( 'js/global.js' ) }}"></script>

<!-- Current Page Vendor and Views -->
@stack('page_js')

<!-- Conflict JS -->
<script src="{{ asset('themes/porto_v7.5/vendor/jquery.validation/jquery.validate.min.js') }}"></script>
@if( app()->getLocale() === 'es' )
    <script src="{{ asset('themes/porto_v7.5/vendor/jquery.validation/localization/messages_es.js') }}"></script>
@endif

<!-- Theme Custom -->
<script src="{{ asset('themes/porto_v7.5/js/custom.js') }}"></script>

<!-- Theme Initialization Files -->
<script src="{{ asset('themes/porto_v7.5/js/theme.init.js') }}"></script>

<!-- Stack JS -->
@stack('script')