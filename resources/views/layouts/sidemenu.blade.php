@section('sidemenu')
	<!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-crm navbar-dark border-bottom-0">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item d-none d-sm-inline-block">
	           <span class="  font-weight-light text-uppercase text-light font-weight-bold "><strong> Student Management System</strong></span>
	        </li>
    	</ul>
    	<ul class="navbar-nav ml-auto">
	      	<li class="nav-item dropdown">
	        	<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
	            	{{ Auth::user()->name }} <span class="caret"></span>
	          	</a>

	          	<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
	            	<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>

	            	<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
	              		@csrf
	            	</form>
	          	</div>
	        </li>
	    </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
	<aside class="main-sidebar sidebar-dark-crm elevation-4">
        <!-- Brand Logo -->
        <a href="#" class="brand-link text-center">
            {{-- <img src="{{ asset('assets/dist/img/logo/Logo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
            <span class="brand-text font-weight-light">StudentManagementSystem</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-legacy nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                	<!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                	<li class="nav-item {{ (Route::is('home') ? 'menu-open' : '') }}">
                        <a href="{{ route('home') }}" class="nav-link {{ (Route::is('home') ? 'active' : '') }}">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                              Home
                            </p>
                        </a>
                    </li>
                       
                    <li class="nav-item has-treeview {{ (Route::is('students.list') || Route::is('students.create') || Route::is('students.edit') || Route::is('marks.list') || Route::is('marks.create') || Route::is('marks.edit') ? 'menu-open' : '') }}">
                        <a href="#" class="nav-link {{ (Route::is('students.list') || Route::is('students.create') || Route::is('students.edit') || Route::is('marks.list') || Route::is('marks.create') || Route::is('marks.edit') ? 'active' : '') }}">
                            <i class="nav-icon fas fa-user-tie"></i>
                            <p>
                                Administration
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item {{ (Route::is('students.list') ? 'menu-open' : '') }}">
                                <a href="{{ route('students.list') }}" class="nav-link {{ (Route::is('students.list') ? 'active' : '') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Students</p>
                                </a>
                            </li>
                            <li class="nav-item {{ (Route::is('marks.list') ? 'menu-open' : '') }}">
                                <a href="{{ route('marks.list') }}" class="nav-link {{ (Route::is('marks.list') ? 'active' : '') }}">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>List Student Marks</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
@endsection