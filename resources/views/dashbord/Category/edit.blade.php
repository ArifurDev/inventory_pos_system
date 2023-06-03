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
                            <div class="col-md-6">
                                <div class="panel panel-default">
                                    <div class="panel-heading"><h3 class="panel-title">Edit Category</h3></div>

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

                                                        <form class="form-horizontal" role="form" action="{{ route('Category.update',$category->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="form-group">
                                                                <label for="inputName" class="col-sm-3 control-label">Category Name</label>
                                                                <div class="col-sm-9">
                                                                  <input type="text" class="form-control" id="inputName" placeholder="Category Name" name="category_name" value="{{ $category->category_name }}">
                                                             
                                                                </div>
                                                            </div>
                                                            <div class="form-group">

                                                                <label for="photo" class="col-sm-3 control-label">Image</label>
                                                                <div class="col-sm-9">
                                                                    <img  style="width: 70px; height: 70px; margin-right: 50px;" src="{{ asset('upload/category_image') }}/{{ $category->image }}" id="image" ><br>
                                                                    <input type="file" class="form-control" id="photo"  name="image" accept="image/*" onchange="readURL(this)">
                                                                </div>
                                                            </div>

                                                            <div class="form-group m-b-0">
                                                                <div class="col-sm-offset-3 col-sm-9">
                                                                  <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                                                                </div>
                                                            </div>
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
