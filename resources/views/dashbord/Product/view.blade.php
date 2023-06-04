<!DOCTYPE html>
<html>
    <head>
        @include('dashbord.header')
    </head>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
             @include('dashbord.navbar')
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
            @include('dashbord.left_sife_menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row ">
                            <div class="col-md-6 col-sm-6 col-lg-6">
                                <div class="mini-stat clearfix bx-shadow">
                                    {{-- <span class="mini-stat-icon"><img  src="{{ asset('upload/product_image') }}/{{ $product->product_image }}" alt="" class="img-circle img-responsive"></span> --}}
                                    <img  src="{{ asset('upload/product_image') }}/{{ $product->product_image }}" alt="" class="img-responsive">

                                    <div class="mini-stat-info text-left text-muted">
                                        <span class="name">{{ $product->product_name }}</span>
                                        {{ $product->product_code }}
                                    </div>
                                    <br>
                                    <hr class="m-t-10">
                                    <ul class="">
                                        <li>Supplier Nmae : {{ $product->supplier_name }}</li>
                                        <li>Category Name : {{ $product->category_name }}</li>
                                        <li>Product Name : {{ $product->product_name }}</li>
                                        <li>Product Code : {{ $product->product_code }}</li>
                                        <li>Storehouse : {{ $product->product_storehouse }}</li>
                                        <li>Route : {{ $product->product_route }}</li>
                                        <li>Buy Date{{ $product->buy_date }}</li>
                                        <li>Expaire Date{{ $product->expaire_date }}</li>
                                        <li>Buying Price{{ $product->buying_price }}</li>
                                        <li>Seling Price{{ $product->seling_price }}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- content -->
                <footer class="footer text-right">
                    2015 © Moltran.
                </footer>
            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->

            <!-- ============================================================== -->
            <!-- Right Sidebar -->
             @include('dashbord.right_slider')
            <!-- /Right-bar -->

        </div>

        <!-- END wrapper -->
       @include('dashbord.script')<!--script link-->
        <!-- COPY TO JAVASCRIPT SECTION  -->
        <script type="text/javascript">
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#image')
                            .attr('src', e.target.result);
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            }

        </script>
    </body>
</html>
