<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title> {{config('app.name') }}</title>

  <!-- Google Font: Source Sans Pro -->
<!--   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"> -->

  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.rawgit.com/tonystar/bootstrap-float-label/v4.0.2/bootstrap-float-label.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- fulcalendar -->
  <link rel="stylesheet" href="plugins/fullcalendar/main.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">

   <!-- chartJS -->
  <link rel="stylesheet" href="{{ asset('plugins/chart.js/Chart.min.css') }}">

  <!-- chartJS -->
  <link rel="stylesheet" href="{{ asset('plugins/chart.js/Chart.css') }}">

  <!-- JQVMap -->
  <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
</head>
<body class="hold-transition sidebar-mini layout-fixed">

 <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('dashboard') }}" class="nav-link">Home</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="" class="nav-link" data-toggle="modal" data-target="#modal-default">Contact</a>
      </li>
    </ul>



      
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->


      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-user"></i>
         <b> Hi, {{ Auth::user()->name }} </b>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> User profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-lock mr-2"></i> Change password
            
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout')}}" class="dropdown-item">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
            
          </a>
         
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

    <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <span class="brand-text font-weight-light">Cashflow Management</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
             <p style="color: white">{{ Auth::user()->name }}</p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

          <li class="nav-item">
            <a href="{{ route('dashboard')}}" class="nav-link">
              <i class="nav-icon fa fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-chart-line"></i>
              <p>
                Income
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Income</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Income</p>
                </a>
              </li>
            </ul>
          </li>

        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-arrow-down"></i>
              <p>
                Expenses
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Expenses</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Expenses</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-money-bill"></i>
              <p>
                Accounts
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Accounts</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('account.index')}}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Accounts</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Transaction Categories
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Income Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Expense Category</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-briefcase"></i>
              <p>
                Budgets
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Burget</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Budget</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-battery-half"></i>
              <p>
                Debt Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-plus nav-icon"></i>
                  <p>Add Debt</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Debt</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-chart-bar"></i>
              <p>
                Reports
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Income Summary</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Expense Summary</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Debt Summary</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Income vs Expense</p>
                </a>
              </li>
                 <li class="nav-item">
                <a href="pages/mailbox/compose.html" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Userlog Trails</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                User Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="users#add-user" data-toggle="modal" data-target="#add-user" class="nav-link">
                  <i class="fa fa-user-plus nav-icon"></i>
                  <p>Add users</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('user.index') }}" class="nav-link">
                  <i class="fa fa-list nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>
          </li>

           <li class="nav-item">
	            <a href="{{ route('logout') }}" class="nav-link">
	              <i class="nav-icon fa fa-sign-out-alt"></i>
	              	<p>Logout</p>
	            </a>
	       </li>


          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cogs"></i>
              <p>
                Administration
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-envelope nav-icon"></i>
                  <p>Email Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('transaction_category.index') }}" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Transaction Category</p>
                </a>
              </li>
               <li class="nav-item">
                <a href="{{ route('account_type.index') }}" class="nav-link">
                  <i class="fa fa-cog nav-icon"></i>
                  <p>Account Types</p>
                </a>
              </li>

               <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p>Roles Managements</p>
                </a>
              </li>

                <li class="nav-item">
                <a href=" {{ route('payment_methods.index') }}" class="nav-link">
                  <i class="fa fa-money-bill nav-icon"></i>
                  <p>Payment Methods</p>
                </a>
              </li>

                <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="fa fa-database nav-icon"></i>
                  <p>Database Backup</p>
                </a>
              </li>

              	  <li class="nav-item">
	            <a href="{{ route('logout') }}" class="nav-link">
	              <i class="nav-icon fa fa-sign-out-alt"></i>
	              	<p>Logout</p>
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

  <!-- ./main sidebar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Dashboard
                <small>Cashflow Management System</small>
            </h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
  
		  <!-- summary here -->


		  <!-- Contact Dialog -->

        <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Cashflow Management System</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Contact the system admin at <br>
                <b>(254)708 920 430 or email: sos@cashflow.co.ke</b>
              </p>
            </div>
            <div class="modal-footer">
             <!--  <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button> -->
              <button type="button" class="btn btn-danger pull-right" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->


     <!-- Put div row here -->
     	@yield('content')



   </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; {{ now()->year }} <a href="">{{ config('app.name')}}</a></strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b>1.0 BETA
    </div>
  </footer>

  <!-- Control Sidebar -->
 <aside class="control-sidebar control-sidebar-dark"> 
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


@include('layouts.footer')


</body>
</html>
