<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pharmacy</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{!! asset('bootstrap/css/bootstrap.min.css') !!}">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{!! asset('dist/css/AdminLTE.min.css') !!}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{!! asset('dist/css/skins/_all-skins.min.css') !!}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{!! asset('plugins/iCheck/flat/blue.css') !!}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{!! asset('plugins/morris/morris.css') !!}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css') !!}">
  <!-- Date Picker -->
  <link rel="stylesheet" href="{!! asset('plugins/datepicker/datepicker3.css') !!}">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="{!! asset('plugins/daterangepicker/daterangepicker.css') !!}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{!! asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') !!}">
  <link rel="stylesheet" href="{!! asset('plugins/select2/select2.min.css') !!}">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.2.0/css/select.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.5.4/css/angular-datatables.min.css">

<link rel="stylesheet" href="{!! asset('bootstrap/css/ihover.css') !!}">
  <!-- jQuery 2.2.3 -->
  <script src="{!! asset('plugins/jQuery/jquery-2.2.3.min.js') !!}"></script>
  
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/select/1.2.0/js/dataTables.select.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.5.4/angular-datatables.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/angular-datatables/0.5.4/plugins/select/angular-datatables.select.min.js"></script>

  @include('app_angular')
</head>


<body class="hold-transition skin-blue sidebar-mini" ng-app="pharmacyApp">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>P</b>HC</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">Pharmacy</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">    
 
          
        
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="user-image" alt="User Image">
              <span class="hidden-xs">{!! session('user_full_name') !!}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{!! asset('dist/img/user2-160x160.jpg') !!}" class="img-circle" alt="User Image">

                <p>
                  {!! session('user_full_name') !!}
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{!! url('logout') !!}" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>     
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">      
      <ul class="sidebar-menu">
         <li class="{!! Request::url() == url('home') ? 'active' : '' !!}"><a href="{!! url('home') !!}">Home</a></li>

        <li class="header">TRANSACTION</li>
        @if(session('user_type') == 2)
          <li class="{!! Request::url() == url('order') || Request::url() == url('cart') ? 'active' : '' !!} treeview">
            <a href="#">
              <i class="fa fa-home"></i> <span>HOME</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{!! Request::url() == url('order') ? 'active' : '' !!}"><a href="{!! url('order') !!}"><i class="fa fa-fw fa-cart-plus"></i>Order</a></li>
              <li class="{!! Request::url() == url('cart') ? 'active' : '' !!}"><a href="{!! url('cart') !!}"><i class="fa fa-fw fa-cart-arrow-down"></i>Cart</a></li>
            </ul>
          </li>

        @elseif(session('user_type') == 1)
          <li class="{!! Request::url() == url('transaction') ? 'active' : '' !!} treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>TRANSACTION</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{!! Request::url() == url('transaction') ? 'active' : '' !!}"><a href="{!! url('transaction') !!}"><i class="fa fa-circle-o"></i>Transactions</a></li>            
            </ul>
          </li>      

        
          <li class="header">MAINTENANCE</li>
          <li class="{!! strpos(Request::url(), 'maintenance') == true ? 'active' : '' !!} treeview">
            <a href="#">
              <i class="fa fa-cogs"></i> <span>MAINTENANCE</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li class="{!! Request::url() == url('maintenance/branch') ? 'active' : '' !!}"><a href="{!! url('maintenance/branch') !!}"><i class="fa fa-circle-o"></i>Branch</a></li>
              <li class="{!! Request::url() == url('maintenance/employee') ? 'active' : '' !!}"><a href="{!! url('maintenance/employee') !!}"><i class="fa fa-circle-o"></i>Employee</a></li>
              <li class="{!! Request::url() == url('maintenance/customer') ? 'active' : '' !!}"><a href="{!! url('maintenance/customer') !!}"><i class="fa fa-circle-o"></i>Customer</a></li>            
              <li class="{!! Request::url() == url('maintenance/category') ? 'active' : '' !!}"><a href="{!! url('maintenance/category') !!}"><i class="fa fa-circle-o"></i>Category</a></li>
              <li class="{!! Request::url() == url('maintenance/uom') ? 'active' : '' !!}"><a href="{!! url('maintenance/uom') !!}"><i class="fa fa-circle-o"></i>Unit Of Measurement</a></li>
              <li class="{!! Request::url() == url('maintenance/product') ? 'active' : '' !!}"><a href="{!! url('maintenance/product') !!}"><i class="fa fa-circle-o"></i>Products</a></li>
            </ul>
          </li>
        @endif

      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page D2AKO -->
  <div class="content-wrapper">
<!-- contenct d2 -->
  <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        @yield('content')
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer col-md-12">   
    <strong><a href="#">Pharmacy</a>.</strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.6 -->

<script src="{!! asset('bootstrap/js/bootstrap.min.js') !!}"></script>
<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{!! asset('plugins/morris/morris.min.js') !!}"></script>
<!-- Sparkline -->
<script src="{!! asset('plugins/sparkline/jquery.sparkline.min.js') !!}"></script>
<!-- jvectormap -->
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') !!}"></script>
<script src="{!! asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js') !!}"></script>
<!-- jQuery Knob Chart -->
<script src="{!! asset('plugins/knob/jquery.knob.js') !!}"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{!! asset('plugins/daterangepicker/daterangepicker.js') !!}"></script>
<!-- datepicker -->
<script src="{!! asset('plugins/datepicker/bootstrap-datepicker.js') !!}"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{!! asset('plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') !!}"></script>
<!-- Slimscroll -->
<script src="{!! asset('plugins/slimScroll/jquery.slimscroll.min.js') !!}"></script>
<!-- FastClick -->
<script src="{!! asset('plugins/fastclick/fastclick.js') !!}"></script>
<!-- AdminLTE App -->
<script src="{!! asset('dist/js/app.min.js') !!}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{!! asset('dist/js/pages/dashboard.js') !!}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{!! asset('dist/js/demo.js') !!}"></script>

<!-- asssssssssssssssssssss -->
<script src="{!! asset('plugins/select2/select2.full.min.js') !!}"></script>
<script src="{!! asset('bootstrap/js/validator.js') !!}"></script>
<script src="{!! asset('bootstrap/js/jquery.validate.min.js') !!}"></script>
</body>


<script type="text/javascript">
     //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    $(".select2").select2();

</script>

</html>
