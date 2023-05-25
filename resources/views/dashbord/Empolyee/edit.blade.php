
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
                                    <div class="panel-heading"><h3 class="panel-title">Edit Empolyee info</h3></div>

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
                                        <form role="form"  action="{{ route('update.empolyee',['id' => $empolyee->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{ $empolyee->name }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $empolyee->email }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="number" class="form-control" id="phone" placeholder="Enter valide Number" name="phone" min="0" value="{{ $empolyee->phone }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="number">NID Number</label>
                                                <input type="number" class="form-control" id="number" placeholder="NID Number"  name="nid_number" min="0"  value="{{ $empolyee->nid_number }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="salary">Salary</label>
                                                <input type="number" class="form-control" id="salary" placeholder="Salary" name="salary" min="0" value="{{ $empolyee->salary }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="vacation">Vacation</label>
                                                <input type="number" class="form-control" id="vacation" placeholder="Vacation" name="vacation" min="0" value="{{ $empolyee->vacation }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="experience">Experience</label>
                                                <input type="text" class="form-control" id="experience" placeholder="Experience" name="experience" value="{{ $empolyee->experience }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="City">City</label>
                                                <input type="text" class="form-control" id="City" placeholder="City" name="city" value="{{ $empolyee->city }}">
                                            </div>
                                            <div class="form-group">
                                                <label for="Address">Address</label>
                                                <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ $empolyee->address }}">
                                            </div>
                                             <div class="form-group">
                                                <img  style="width: 70px; height: 70px; " src="{{ asset('upload/empolyee_image') }}/{{ $empolyee->photo }}" id="image" ><br>
                                                <label for="Photo">Photo</label>
                                                <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)">
                                            </div>

                                            <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                        </form>
                                    </div><!-- panel-body -->
                                </div> <!-- panel -->
                            </div> <!-- col-->
                        </div>
                    </div> <!-- container -->



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
        <!--datatables-->
         <script src="{{ asset('dashbord') }}/assets/datatables/jquery.dataTables.min.js"></script>
         <script src="{{ asset('dashbord') }}/assets/datatables/dataTables.bootstrap.js"></script>


         <script type="text/javascript">
             $(document).ready(function() {
                 $('#datatable').dataTable();
             } );
         </script>
    </body>
</html>
