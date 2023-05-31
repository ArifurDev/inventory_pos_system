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
                        <li><a href="javascript:void(0)"><i class="md md-face-unlock"></i> Profile<div class="ripple-wrapper"></div></a></li>
                        <li><a href="javascript:void(0)"><i class="md md-settings"></i> Settings</a></li>
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
                        <li><a href="{{ route('Selary.create') }}">Pay Empolyee selary</a></li>
                        <li><a href="{{ route('Selary.index') }}">All Empolyee selary</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-now-widgets"></i><span> Forms </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="form-elements.html">General Elements</a></li>
                        <li><a href="form-validation.html">Form Validation</a></li>
                        <li><a href="form-advanced.html">Advanced Form</a></li>
                        <li><a href="form-wizard.html">Form Wizard</a></li>
                        <li><a href="form-editor.html">WYSIWYG Editor</a></li>
                        <li><a href="code-editor.html">Code Editors</a></li>
                        <li><a href="form-uploads.html">Multiple File Upload</a></li>
                        <li><a href="form-xeditable.html">X-editable</a></li>
                    </ul>
                </li>

                <li class="has_sub">
                    <a href="#" class="waves-effect"><i class="md md-view-list"></i><span> Data Tables </span><span class="pull-right"><i class="md md-add"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="tables.html">Basic Tables</a></li>
                        <li><a href="table-datatable.html">Data Table</a></li>
                        <li><a href="tables-editable.html">Editable Table</a></li>
                        <li><a href="responsive-table.html">Responsive Table</a></li>
                    </ul>
                </li>

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>






















