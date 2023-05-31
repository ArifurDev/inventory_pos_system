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
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Pay Empolyee Selary Edit</h3></div>

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

                                        <form role="form"  action="{{ route('empolyee.Selary.update',$selary->id) }}" method="POST">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md">
                                                    <div class="form-group ">
                                                        <label for="advanch">Email</label>
                                                        <p>{{ $selary->email }}</p>
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="advanch">Advanch Selary</label>
                                                        <input type="text" class="form-control" id="advanch" placeholder="Advanch"  name="advanch" value="{{ $selary->advanch }}">
                                                    </div>

                                                    <div class="form-group ">
                                                        <label for="bdaymonth">Month & Year</label>
                                                        <input type="month" id="bdaymonth" name="salary_date" value="{{ $selary->salary_date }}">
                                                    </div>

                                                </div>

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
