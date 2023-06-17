<div class="left side-menu">
    <div class="sidebar-inner slimscrollleft">
        <div class="user-details">
            <div class="pull-left">
                <img src="{{ asset('dashbord') }}/images/users/avatar-1.jpg" alt="" class="thumb-md img-circle">
            </div>
            <div class="user-info">
                <div class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">John Doe <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile.edit') }}"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="{{ route('setting.index') }}"><i class="md md-settings"></i> Settings</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-lock"></i> Lock screen</a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings-power"></i> Logout</a></li>
                    </ul>
                </div>

                <p class="text-muted m-0">Administrator</p>
            </div>
        </div>
        <!--- Divider -->
        <div id="sidebar-menu">
            <ul>
                <li>
                    <a href="{{ url('/dashboard') }}" class="waves-effect active"><i class="md md-home"></i><span> Dashboard </span></a>
                </li>

                <li>
                    <a href="{{ route('pos.index') }}" class="waves-effect"><i class="md md-add-shopping-cart"></i><strong> Pos </strong><span class="pull-right"><i class="md md-add"></i></span></a>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-group-add"></i><span> Empolyee </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('create.empolyee') }}">Create Empolyee</a></li>
                        <li><a href="{{ route('show.empolyee') }}">All Empolyee</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-person-add"></i> <span> Cutomer </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('customer.create') }}">Add Customer</a></li>
                        <li><a href="{{ route('customer.index') }}">All Customer</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-share"></i><span> Supplier </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('supplier.create') }}">Add Supplier</a></li>
                        <li><a href="{{ route('supplier.index') }}">All Supplier</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="fa fa-money"></i> <span> Empolyee selary </span> <span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('Selary.create') }}">Advance Empolyee selary</a></li>
                        <li><a href="{{ route('Selary.index') }}">All Advance Empolyee selary</a></li>

                        <li><a href="">Pay Empolyee selary</a></li>
                        <li><a href="">All Empolyee selary</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-playlist-add"></i><span> Category </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('Category.create') }}">Create a Category</a></li>
                        <li><a href="{{ route('Category.index') }}">All Category</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Product </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('Product.create') }}">Add Product</a></li>
                        <li><a href="{{ route('Product.index') }}">Show Product</a></li>
                        <li><a href="{{ route('import_Export_product_page') }}">Import Product</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-assignment"></i><span> Expense </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('expense.create') }}">Add Expense</a></li>
                        <li><a href="{{ route('expense.index') }}">Show Expense</a></li>
                    </ul>
                </li>


                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md  md-assignment-turned-in"></i><span> Attendance  </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('attendance.create') }}">Add Attendance</a></li>
                        <li><a href="{{ route('attendance.index') }}">Show Attendance</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-settings"></i><span>Setting</span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('setting.create') }}">Setting Setup</a></li>
                        <li><a href="{{ route('setting.index') }}">Setting Check</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>






















