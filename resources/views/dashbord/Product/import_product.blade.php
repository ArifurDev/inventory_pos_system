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
                            <div class="col-md-3"></div>
                            <!-- Basic example -->
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading ">
                                        <h3 class="panel-title">Product Import & Export</h3>
                                        <a href="{{ route('export.product') }}" class="btn btn-danger" style="float: right; ">
                                            <i class="mdi md-file-download"></i> Export Product
                                        </a>
                                    </div>

                                    <div class="panel-body">
                                        @if ($errors->any())
                                        @foreach ($errors->all() as $error)
                                                <ul>
                                                    <li>
                                                        <p class="text-light">{{ $error }}</p>
                                                    </li>
                                                </ul>
                                        @endforeach
                                       @endif

                                        <form role="form"  action="{{ route('Product.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group">
                                                    <label for="Import">Xlsx File Import</label>
                                                    <input type="file" class="form-control" id="Import" name="Import" >
                                                </div>
                                            </div>



                                            <button type="submit" class="btn btn-primary waves-effect waves-light"><i class="mdi md-file-upload"></i> Import Product</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
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
