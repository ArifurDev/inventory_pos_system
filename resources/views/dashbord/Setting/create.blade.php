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
                            <div class="col-md-2"></div>
                            <!-- Basic example -->
                            <div class="col-md-8 ">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">System Setting</h3></div>

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
                                        <form role="form"  action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Site Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Site Name" name="name">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Site Phone</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Phone" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <input type="text" class="form-control" id="address" placeholder="Address" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label for="City">City</label>
                                                <input type="text" class="form-control" id="City" placeholder="City" name="city">
                                            </div>
                                            <div class="form-group">
                                                <label for="color">Color</label>
                                                <input type="color" class="form-control" id="color" placeholder="City" name="color">
                                            </div>
                                             <div class="form-group">
                                                <img  style="width: 70px; height: 70px; " src="" id="image" ><br>
                                                <label for="Photo">System Logo</label>
                                                <input type="file" class="form-control" id="photo"  name="logo" accept="image/*" onchange="readURL(this)">
                                            </div>

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
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
