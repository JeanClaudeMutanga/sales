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
            <a class="collapse-item" href="#">Colors</a>
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
            
            <form action="/opportunity/total" method="get">
            
            <button class="btn btn-success btn-lg mb-3 mt-2 ml-3 shadow" style="color:black;"><i class='bx bx-arrow-back'></i><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAA4klEQVRIS+2V3Q3CMAyEr5vBBrABTFbYgBEYATZhBOQqQZGV1j91Gh5aqS9p48/n+JwBnZ6hExc7eLPKe0p9AfBKrztRK5igI4APgOMauAWcoVnlFcDNK1kLDoVSshpwOFQDbgKVwM2gS+Cm0Dkwh1Lnuru36Pp3suG0xJuLQ71uqe0j3z/zh78BU0Jc9T2o1DRmaeJVS53XuzTXJnBpcjVTLoFrZ77qcpDOmNshXLlG8dyZnwE8vEa3gMuy0xQ6lPawJmAFU/xTmkA/T1qh0u3kiafe41GsDr704w4OKaMmyBeGgy4fPcTckwAAAABJRU5ErkJggg=="/><strong>Opportunities</strong></button>
            </form>
            </div>

               <div class="d-flex justify-content-between ">
                  <div class="col-xl-4 col-md-6 mb-4">
                    @if($opportunity->ReceiveCof->status == 0)
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Receive C.O.F</div>
                              <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                              
                            </div>
                            <button class="btn btn-danger btn-sm" data-target="#ReceiveCof" data-toggle="modal" type="submit">Update</button>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Receive C.O.F</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Done</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4">
                    @if($opportunity->Cof2Client->status == 0)
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Send C.O.F to client</div>
                              <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                              
                            </div>
                            <button class="btn btn-danger btn-sm" data-target="#Cof2Client" data-toggle="modal" type="submit">Update</button>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Send C.O.F to client</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Done</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                  </div>

                  <div class="col-xl-4 col-md-6 mb-4">
                    @if($opportunity->FollowUp->status == 0)
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Follow Up with Client</div>
                              <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                              
                            </div>
                            <button class="btn btn-danger btn-sm" data-target="#FollowUp" data-toggle="modal" type="submit">Update</button>
                          </div>
                        </div>
                      </div>
                      @else
                      <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Follow Up with Client</div>
                              <div class="h5 mb-0 font-weight-bold text-success">Done</div>
                            </div>
                          </div>
                        </div>
                      </div>
                      @endif
                  </div>
            </div>

            <div class="d-flex justify-content-between">

               <div class="col-xl-6 col-md-6 mb-4">
                      @if($opportunity->Cof2Admin->status == 0)
                        <div class="card border-left-danger shadow h-100 py-2">
                          <div class="card-body">
                            <div class="d-flex row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Send C.O.F to Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                                
                              </div>
                              <button class="btn btn-danger btn-sm" data-target="#Cof2Admin" data-toggle="modal" type="submit">Update</button>
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="d-flex row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Send C.O.F to Admin</div>
                                <div class="h5 mb-0 font-weight-bold text-success">Done</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                    </div>

                    <div class="col-xl-6 col-md-6 mb-4">
                      @if($opportunity->InformClient->status == 0)
                        <div class="card border-left-danger shadow h-100 py-2">
                          <div class="card-body">
                            <div class="d-flex row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Inform Client on Credit Vetting Outcome</div>
                                <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                                
                              </div>
                              <button class="btn btn-danger btn-sm" data-target="#InformClient" data-toggle="modal" type="submit">Update</button>
                            </div>
                          </div>
                        </div>
                        @else
                        <div class="card border-left-success shadow h-100 py-2">
                          <div class="card-body">
                            <div class="d-flex row no-gutters align-items-center">
                              <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Inform Client on Credit Vetting Outcome</div>
                                <div class="h5 mb-0 font-weight-bold text-success">Done</div>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                    </div>

            </div>

                <!---Modal ReceiveCof--->
                <div class="modal fade bd-example-modal-lg" id="ReceiveCof" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2">Update Receiving C.O.F Task</div>
                                <form action="/task/update/status/receivecof" method="post">
                                      @csrf
                                      <select class="custom-select" id="inputGroupSelect02" name="status" required>
                                          <option value="">Choose...</option>
                                          <option value="1">Done</option>
                                          <option value="0">Pending</option>
                                      </select>
                                      <input type="hidden" name="opportunity_id" value="{{$opportunity->id}}">
                                      <input type="hidden" name="user_id" value="{{$opportunity->user->id}}">
                                      <textarea name="comments" id="" cols="30" rows="10" class="form-control mt-2" required></textarea>
                                      <button type="submit" role="button" class="btn btn-primary btn-md mt-2">Update</button>
                                </form>
                             </div>
                          </div>
                      </div>
                  </div>    
              <!---Modal--->

              <!---Modal Cof2Client--->
              <div class="modal fade bd-example-modal-lg" id="Cof2Client" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2">Update C.O.F To Client Task</div>
                                <form action="/task/update/status/Cof2Client" method="post">
                                      @csrf
                                      <select class="custom-select" id="inputGroupSelect02" name="status" required>
                                          <option value="">Choose...</option>
                                          <option value="1">Done</option>
                                          <option value="0">Pending</option>
                                      </select>
                                      <input type="hidden" name="opportunity_id" value="{{$opportunity->id}}">
                                      <input type="hidden" name="user_id" value="{{$opportunity->user->id}}">
                                      <textarea name="comments" id="" cols="30" rows="10" class="form-control mt-2" required></textarea>
                                      <button type="submit" role="button" class="btn btn-primary btn-md mt-2">Update</button>
                                </form>
                             </div>
                          </div>
                      </div>
                  </div>    
              <!---Modal--->

              <!---Modal FollowUp--->
              <div class="modal fade bd-example-modal-lg" id="FollowUp" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2">Update Follow Up with Client Task</div>
                                <form action="/task/update/status/FollowUp" method="post">
                                      @csrf
                                      <select class="custom-select" id="inputGroupSelect02" name="status" required>
                                          <option value="">Choose...</option>
                                          <option value="1">Done</option>
                                          <option value="0">Pending</option>
                                      </select>
                                      <input type="hidden" name="opportunity_id" value="{{$opportunity->id}}">
                                      <input type="hidden" name="user_id" value="{{$opportunity->user->id}}">
                                      <textarea name="comments" id="" cols="30" rows="10" class="form-control mt-2" required></textarea>
                                      <button type="submit" role="button" class="btn btn-primary btn-md mt-2">Update</button>
                                </form>
                             </div>
                          </div>
                      </div>
                  </div>    
              <!---Modal--->

                <!---Modal Cof2Admin--->
                <div class="modal fade bd-example-modal-lg" id="Cof2Admin" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2">Update C.O.F To Admin Task</div>
                                <form action="/task/update/status/Cof2Admin" method="post">
                                      @csrf
                                      <select class="custom-select" id="inputGroupSelect02" name="status" required>
                                          <option value="">Choose...</option>
                                          <option value="1">Done</option>
                                          <option value="0">Pending</option>
                                      </select>
                                      <input type="hidden" name="opportunity_id" value="{{$opportunity->id}}">
                                      <input type="hidden" name="user_id" value="{{$opportunity->user->id}}">
                                      <textarea name="comments" id="" cols="30" rows="10" class="form-control mt-2" required></textarea>
                                      <button type="submit" role="button" class="btn btn-primary btn-md mt-2">Update</button>
                                </form>
                             </div>
                          </div>
                      </div>
                  </div>    
              <!---Modal--->

              <!---Modal InformClient--->
              <div class="modal fade bd-example-modal-lg" id="InformClient" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2">Update Inform Client outcome of credit vetting task</div>
                                <form action="/task/update/status/InformClient" method="post">
                                      @csrf
                                      <select class="custom-select" id="inputGroupSelect02" name="status" required>
                                          <option value="">Choose...</option>
                                          <option value="1">Done</option>
                                          <option value="0">Pending</option>
                                      </select>
                                      <input type="hidden" name="opportunity_id" value="{{$opportunity->id}}">
                                      <input type="hidden" name="user_id" value="{{$opportunity->user->id}}">
                                      <textarea name="comments" id="" cols="30" rows="10" class="form-control mt-2" required></textarea>
                                      <button type="submit" role="button" class="btn btn-primary btn-md mt-2">Update</button>
                                </form>
                             </div>
                          </div>
                      </div>
                  </div>    
              <!---Modal--->

                  <div class="row d-flex justify-content-between shadow ml-2 mr-2">
                            <div class="card col-lg-6">
                                <h5 class="text-center">Opportunity Details</h5>
                                <div class="card-header">Client Details</div>
                                <div class="card-body">
                                    <p><strong>Client Name </strong>: {{$opportunity->clientName}}</p>
                                        <hr>
                                    <p><strong>Company Trading Name</strong>: {{$opportunity->companyName}}</p>
                                        <hr>
                                    <p><strong>Company Reg ID</strong> :{{$opportunity->companyRegId}}</p>
                                        <hr>
                                    <p><strong>V.A.T Number</strong> : {{$opportunity->vat}}</p>
                                        <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6" style="padding-top:29px;">
                                <div class="card-header">Client Details</div>
                                <div class="card-body">
                                    <p>Company Name : {{$opportunity->companyName}}</p>
                                    <hr>
                                    <p><strong>Physical Address</strong> : {{$opportunity->physicalAddress}}</p>
                                        <hr>
                                    <p><strong>Postal Address </strong>: {{$opportunity->postalAddress}}</p>
                                        <hr>
                                    <p><strong>Billing Address </strong>: {{$opportunity->billingAddress}}</p>
                                    <hr>
                                </div>
                            </div>
                        </div>

                        <div class="row d-flex justify-content-between ml-2 mr-2">
                            <div class="card col-lg-6">
                                <div class="card-header">Past Credit History (Existing Customers)</div>
                                <div class="card-body">
                                    <p><strong>Types of Services Requested </strong>: {{$opportunity->CreditHistory->servicesRequested}}</p>
                                        <hr>
                                    <p><strong>Has Quote Been Signed</strong>: {{$opportunity->CreditHistory->quoteSigned}}</p>
                                        <hr>
                                    <p><strong>Name of Signer</strong> :{{$opportunity->CreditHistory->quoteSigner}}</p>
                                        <hr>
                                    <p><strong>Authorized Signer</strong> : {{$opportunity->CreditHistory->authorizedSigner}}</p>
                                        <hr>
                                    <p><strong>Custom Order Form</strong> : {{$opportunity->CreditHistory->customOrderForm}}</p>
                                     <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6">
                                <div class="card-header">Payment Profile</div>
                                <div class="card-body">
                                    <p><strong>MRC </strong>: {{$opportunity->CreditHistory->MRC}}</p>
                                        <hr>
                                    <p><strong>Proposed Credit Limit </strong>: {{$opportunity->CreditHistory->creditLimit}}</p>
                                        <hr>
                                </div>
                            </div>
                        </div>
                        <!--New Clients--->
                        <div class="row d-flex justify-content-between ml-2 mr-2">
                            <div class="card col-lg-6">
                                <div class="card-header">Past Credit History (New Customers)</div>
                                <div class="card-body">
                                    <p><strong>Types of Services Requested </strong>: {{$opportunity->CustomerOrder->servicesRequested}}</p>
                                        <hr>
                                    <p><strong>Has Quote Been Signed</strong>: {{$opportunity->CustomerOrder->quoteSigned}}</p>
                                        <hr>
                                    <p><strong>Name of Signer</strong> :{{$opportunity->CustomerOrder->quoteSigner}}</p>
                                        <hr>
                                    <p><strong>Authorized Signer</strong> : {{$opportunity->CustomerOrder->authorizedSigner}}</p>
                                        <hr>
                                    <p><strong>Custom Order Form</strong> : {{$opportunity->CustomerOrder->customOrderForm}}</p>
                                     <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6">
                                <div class="card-header">Payment Profile</div>
                                <div class="card-body">
                                    <p><strong>MRC </strong>: {{$opportunity->CustomerOrder->MRC}}</p>
                                        <hr>
                                    <p><strong>Proposed Credit Limit </strong>: {{$opportunity->CustomerOrder->creditLimit}}</p>
                                        <hr>
                                </div>
                            </div>
                        </div>

                        <!---Credit Manager---->
                        <div class="row d-flex justify-content-between ml-2 mr-2">
                            <div class="card col-lg-6">
                                <div class="card-header">Credit Manager</div>
                                <div class="card-body">
                                    <p><strong>Name od Credit Manager </strong>: {{$opportunity->CustomerOrder->servicesRequested}}</p>
                                        <hr>
                                    <p><strong>Credit check Ref No</strong>: {{$opportunity->CustomerOrder->quoteSigned}}</p>
                                        <hr>
                                    <p><strong>Credit Vetting Successful</strong> :{{$opportunity->CustomerOrder->quoteSigner}}</p>
                                        <hr>
                                    <p><strong>Deposit Required</strong> : {{$opportunity->CustomerOrder->authorizedSigner}}</p>
                                        <hr>
                                    <p><strong>Customer Credit Limit</strong> : {{$opportunity->CustomerOrder->customOrderForm}}</p>
                                     <hr>
                                     <p><strong>Comments</strong> : {{$opportunity->CustomerOrder->customOrderForm}}</p>
                                     <hr>
                                </div>
                            </div>
                
                            <div class="card col-lg-6">
                                <div class="card-header">Credit Vetting Escalations</div>
                                <div class="card-body">
                                    <p><strong>Reason For Escalation </strong>: {{$opportunity->CustomerOrder->MRC}}</p>
                                        <hr>
                                    <p><strong>Approval Of CFO </strong>: {{$opportunity->CustomerOrder->creditLimit}}</p>
                                        <hr>

                                        <p><strong>Approval by MD </strong>: {{$opportunity->CustomerOrder->creditLimit}}</p>
                                        <hr>
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
