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
                                    <div class="panel-heading"><h3 class="panel-title">Add Customer</h3></div>

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
                                        <form role="form"  action="{{ route('customer.update',['customer'=>$customer->id]) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name" value="{{ $customer->name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{ $customer->email }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" class="form-control" id="phone" placeholder="Enter valide Number" name="phone"  value="{{ $customer->phone }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="shopName">Shop Name</label>
                                                        <input type="text" class="form-control" id="shopName" placeholder="shopName"  name="shopName" value="{{ $customer->shopName }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="account_holder">Account Holder</label>
                                                        <input type="text" class="form-control" id="account_holder" placeholder="Account Holder" name="account_holder" value="{{ $customer->account_holder }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="account_number">Account Number</label>
                                                        <input type="number" class="form-control" id="account_number" placeholder="Account Number" name="account_number" min="0" value="{{ $customer->account_number }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="bank_name">Bank Name</label>
                                                        <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" value="{{ $customer->bank_name }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_branch">Bank Branch</label>
                                                        <input type="text" class="form-control" id="bank_branch" placeholder="Bank Branch" name="bank_branch" value="{{ $customer->bank_branch }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" placeholder="City" name="city" value="{{ $customer->city }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Address">Address</label>
                                                        <input type="text" class="form-control" id="Address" placeholder="Address" name="address" value="{{ $customer->address }}">
                                                    </div>
                                                     <div class="form-group">
                                                        <img  style="width: 70px; height: 70px; " src="{{ asset('upload/customer_image') }}/{{ $customer->photo }}" id="image" ><br>
                                                        <label for="Photo">Photo</label>
                                                        <input type="file" class="form-control" id="photo"  name="photo" accept="image/*" onchange="readURL(this)">
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
