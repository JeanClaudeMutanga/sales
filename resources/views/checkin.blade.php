@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="" href="#">
        <p style="color:white; margin-left:20px; margin-top:20px;"><strong>{{auth::user()->name}}</strong></p>
      </a>
      
   
      

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/home">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Options
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         
          <span>Opportunities</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opportunity Options:</h6>
            <a class="collapse-item" href="/opportunity/create">Add New</a>
            <a class="collapse-item" href="#">View All</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
      
          <span>Tasks</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tasks:</h6>
            <a class="collapse-item" href="#">#</a>

          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
       <!-- Addons -->
      </div>

      <!-- Nav Item - Pages Collapse Menu --
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.html">Login</a>
            <a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>
          </div>
        </div>
      </li>

     
      <li class="nav-item">
        <a class="nav-link" href="charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      
      <li class="nav-item">
        <a class="nav-link" href="tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

       Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
            <div class="">
            <div class="d-flex justify-content-between">
                 <h1 class="h3 mb-4 text-gray-800 mt-4">Red Heart Appointments</h1>
                 <a href="#Book" data-target="#CheckIns" data-toggle="modal" class="btn btn-success btn-sm mt-4 mb-4">Check-In/Out</a>
                 </div>
                 <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">My Clocking-In Times</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Date</th>
                        <th>Check In Time</th>
                        <th>Check Out Time</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>Date</th>
                        <th>Check In Time</th>
                        <th>Check Out Time</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($times as $time)
                      <tr>
                        <td>{{$time->day}}</td>
                        <td>{{$time->checkIn ?? "--"}}</td>
                        <td>{{$time->checkOut ?? "--"}}</td>
                      </tr>
                    @endforeach  
                    </tbody>
                </table>
                </div>
            </div>
            </div>
            </div>
        </div>

      </div>
      <!-- End of Main Content -->

        <!---Modal--->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="CheckIns">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content card w-100">
                        <div class="modal-body">
                            
                            @if(auth()->user()->clocking->where('day',$today)->count()=="0")
                            <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/clock/in/" method="get">
                                @method('POST')
                                @csrf
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="saveBtn" value="create">Check-In
                                    </button>
                                </div>
                            </form>
                            @else
                            <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/clock/out/" method="get">
                                @method('POST')
                                @csrf
                                <div class="col-sm-offset-2 col-sm-12">
                                    <button type="submit" class="btn btn-primary btn-block" id="saveBtn" value="create">Check-Out
                                    </button>
                                </div>
                            </form> 
                            @endif
                        </div>
                    </div>
                </div>
          </div>    
        <!---Modal--->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Afrigotel Tech</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
@endsection
