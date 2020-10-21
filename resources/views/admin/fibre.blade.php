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
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Opportunities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Add Opportunity:</h6>
            <a class="collapse-item" href="/redheart">Red Heart</a>
            <a class="collapse-item" href="/fibre">Fibre</a>
            <a class="collapse-item" href="/opportunity/create">TMT</a>
          </div>
        </div>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities1" aria-expanded="true" aria-controls="collapseUtilities">
          <span>My Opportunities</span>
        </a>
        <div id="collapseUtilities1" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View Opportunites:</h6>
            <a class="collapse-item" href="/total/redheart">Red Heart</a>
            <a class="collapse-item" href="/total/fibre">Fibre</a>
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
    <div id="content-wrapper" class="d-flex flex-column pt-4">

      <!-- Main Content -->
      <div id="content">
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          
            <div class="">
                 <h1 class="h3 mb-4 text-gray-800 pt-1">{{$fibre->name}}</h1>
                 <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">{{$fibre->name}}: Profile</h6>
                      </div>
                        <div class="card-body">
                              <!------Card---->
                                  <div class="row d-flex justify-content-between ml-2 mr-2">
                                  <div class="card col-lg-6">
                                      <div class="card-body">
                                          <p><strong>Account Number </strong>: {{$fibre->account}}</p>
                                              <hr>
                                          <p><strong>Client Name</strong>: {{$fibre->name}}</p>
                                              <hr>
                                          <p><strong>Company Trading Name</strong> : {{$fibre->company}}</p>
                                              <hr>
                                          <p><strong>Address</strong> : {{$fibre->address}}</p>
                                              <hr>
                                          <p><strong>State</strong> : {{$fibre->state}}</p>
                                          <hr>
                                          <p><strong>Post Code</strong> : {{$fibre->postcode}}</p>
                                          <hr>
                                      </div>
                                  </div>
                      
                                  <div class="card col-lg-6 ">
                                      <div class="card-body">
                                          <p><strong>Email </strong>: {{$fibre->email}}</p>
                                              <hr>
                                          <p><strong>Phone Number </strong>: {{$fibre->phone}}</p>
                                              <hr>
                                          <p><strong>Service </strong>: {{$fibre->service}}</p>
                                              <hr>
                                      </div>
                                  </div>
                              </div>
                              <!------End Card---->
                        </div>
                  </div>
            </div>
                  @include('layouts.messages')
                  <div class="card shadow mb-4">
                      <div class="card-header py-3">
                          <h6 class="m-0 font-weight-bold text-primary">Attachments</h6>
                      </div>
                        <div class="card-body">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                          <tr>
                              <th>Document Title</th>
                              <th>Options</th>
                          </tr>
                          </thead>
                          <tfoot>
                          <tr>
                              <th>Document Title</th>
                              <th>Options</th>
                          </tr>
                          </tfoot>
                          <tbody>
                          
                          <tr>
                          @foreach($fibre->docs as $doc)
                          <td>{{$doc->title}}</td>
                          <td><a href="/storage/{{$doc->url}}" target="_blank" class="btn btn-primary btn-sm">Open</a></td>
                          </tr>
                          @endforeach
                          </tbody>
                          
                      </table>
                      <form action="#bd-example-modal-lg" method="get">
                                    <button data-toggle="modal" data-target=".bd-example-modal-lg" class="btn btn-success btn-sm ml-1">Add Attachment</button>
                          </form>
                        </div>
                  </div>

        </div>

        <!---Modal--->
          <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content card w-100">
                        <div class="modal-body">
                            <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/attachments/fibre/{{$fibre->id}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label">Tittle</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="title" id="ttle" class="form-control" required>
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="name" class="col-sm-12 control-label">Upload Document</label>
                                    <div class="col-sm-12">
                                        <input type="file" id="age" name="url" required="">
                                    </div>
                                </div>

                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Save
                                </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
          </div>    
        <!---Modal--->

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
