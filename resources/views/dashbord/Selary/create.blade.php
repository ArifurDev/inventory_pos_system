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
                                    <div class="panel-heading"><h3 class="panel-title">Pay Empolyee Selary</h3></div>

                                    <div class="panel-body">

                                        <form role="form"  action="" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="name">Empolyee Name</label>
                                                        <input type="text" class="form-control" id="name" placeholder="Enter Full Name" name="name">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">Empolyee Email</label>
                                                        <select class="form-control form-white" data-placeholder="Supplier Type" name="type">
                                                            @foreach ($empolyee as $emp_mail)
                                                            <option value="distributor">{{ $emp_mail->email }}</option>
                                                            @endforeach
                                                         </select>
                                                        </div>
                                                    <div class="form-group">
                                                        <label for="phone">Empolyee Phone</label>
                                                        <input type="text" class="form-control" id="phone" placeholder="Enter valide Number" name="phone" min="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="phone">Empolyee Selary</label>
                                                        <input type="text" class="form-control" id="phone" placeholder="Enter valide Number" name="selary" min="0" >
                                                    </div>
                                                    <div class="form-group ">
                                                        <label for="advanch">Advanch Selary</label>
                                                        <input type="text" class="form-control" id="advanch" placeholder="Advanch"  name="advanch">
                                                    </div>
                                                    <label for="datepicker">Advanch Selary</label>
                                                    <div class="input-group">

                                                        <input type="text" class="form-control" placeholder="mm/dd/yyyy" id="datepicker">
                                                        <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                    </div>


                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="account_holder">Account Holder</label>
                                                        <input type="text" class="form-control" id="account_holder" placeholder="Account Holder" name="account_holder">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="account_number">Account Number</label>
                                                        <input type="number" class="form-control" id="account_number" placeholder="Account Number" name="account_number" min="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_name">Bank Name</label>
                                                        <input type="text" class="form-control" id="bank_name" placeholder="Bank Name" name="bank_name" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="bank_branch">Bank Branch</label>
                                                        <input type="text" class="form-control" id="bank_branch" placeholder="Bank Branch" name="bank_branch">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="city">City</label>
                                                        <input type="text" class="form-control" id="city" placeholder="City" name="city">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="Address">Address</label>
                                                        <input type="text" class="form-control" id="Address" placeholder="Address" name="address">
                                                    </div>
                                                     <div class="form-group">
                                                        <img  style="width: 70px; height: 70px; " src="" id="image" ><br>
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
