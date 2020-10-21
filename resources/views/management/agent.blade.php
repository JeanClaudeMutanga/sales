@extends('layouts.app')

@section('content')
<!---
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
--->

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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseTwo">
         
          <span>Sales Team</span>
        </a>
        <div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Team Options:</h6>
            <a class="collapse-item" href="/reporting/team/total">View Team</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#Reporting" aria-expanded="true" aria-controls="collapseTwo">
         
          <span>Reporting</span>
        </a>
        <div id="Reporting" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Report Options:</h6>
            <a class="collapse-item" data-toggle="modal" data-target="#Filter" href="#Filer">Filter</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
         
          <span>Opportunities</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Opportunity Options:</h6>
            <a class="collapse-item" href="/opportunity/reporting/redheart">View Red Heart</a>
            <a class="collapse-item" href="/opportunity/reporting/fibre">View Fibre</a>
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
                 <h1 class="h3 mb-4 text-gray-800 pt-1 mt-3 ml-3">{{$user->name}}</h1>
                 <!----Blocks----->
                 <div class="d-flex justify-content-between ">
                  <div class="col-xl-4 col-md-6 mb-4">
                    
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">All Opportunities</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Current</div>
                            </div>
                            <button class="btn btn-primary btn-sm" >{{$user->opportunity->count()}}</button>
                          </div>
                        </div>
                      </div>
                     
                     
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4">
                  
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Open Opportunities</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Current</div>
                            </div>
                            <button class="btn btn-primary btn-sm">{{$user->opportunity->where('status','Opened')->count()}}</button>
                          </div>
                        </div>
                      </div>
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4">
                   
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Closed Opportunities</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Current</div>
                            </div>
                            <button class="btn btn-primary btn-sm">{{$user->opportunity->where('status','Closed')->count()}}</button>
                          </div>
                        </div>
                      </div>
                  </div>
                  </div>
                 <!----Blocks----->
                 <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s  Red Heart Opportunities</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>School Name</th>
                        <th>School Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Total Learners</th>
                        <th>Contact Person</th>
                        <th>Phone Number</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                    <th>School Name</th>
                        <th>School Address</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Total Learners</th>
                        <th>Contact Person</th>
                        <th>Phone Number</th>
                        <th>Option</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($schools as $school)
                    <tr>
                    <td>{{$school->name}}</td>
                        <td>{{$school->address}}</td>
                        <td>{{$school->city}}</td>
                        <td>{{$school->state}}</td>
                        <td>{{$school->learners}}</td>
                        <td>{{$school->contact}}</td>
                        <td>{{$school->phone}}</td>
                        <td>
                           <form action="/reporting/school/{{$school->id}}" method="get">
                              <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-sm ml-1">Open</button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$schools->links()}}
                </div>
            </div>
            </div>
            </div>


            <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">{{$user->name}}'s Fibre Opportunities</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                    <th>Client Name</th>
                        <th>Account Number</th>
                        <th>Company Trading Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Service</th>
                        <th>Option</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>Client Name</th>
                        <th>Account Number</th>
                        <th>Company Trading Name</th>
                        <th>Address</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Service</th>
                        <th>Option</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    @foreach($fibres as $fibre)
                    <tr>
                        <td>{{$fibre->fibre}}</td>
                        <td>{{$fibre->account}}</td>
                        <td>{{$fibre->company}}</td>
                        <td>{{$fibre->address}}</td>
                        <td>{{$fibre->email}}</td>
                        <td>{{$fibre->phone}}</td>
                        <td>{{$fibre->service}}</td>
                        <td>
                           <form action="/fibre/{{$fibre->id}}" method="get">
                              <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-sm ml-1">Open</button>
                           </form>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$fibres->links()}}
                </div>
            </div>
            </div>

            
        </div>

      </div>
      <!-- End of Main Content -->

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
