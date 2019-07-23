<section class="page-header page-header-classic page-header-sm">
    <div class="container">
        <div class="row">
            <div class="col-md-8 order-2 order-md-1 align-self-center p-static">
                @stack('menu_name')
            </div>
            <div class="col-md-4 order-1 order-md-2 align-self-center">
                <ul class="breadcrumb d-block text-md-right">
                    @stack('menu_path')
                </ul>
            </div>
        </div>
    </div>
</section>