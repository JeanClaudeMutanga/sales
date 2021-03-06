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
            <h6 class="collapse-header">Custom Utilities:</h6>
            <a class="collapse-item" href="utilities-color.html">Colors</a>
            <a class="collapse-item" href="utilities-border.html">Borders</a>
            <a class="collapse-item" href="utilities-animation.html">Animations</a>
            <a class="collapse-item" href="utilities-other.html">Other</a>
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
          
               <div class="d-flex justify-content-between pt-4">
                  <div class="col-xl-4 col-md-6 mb-4">
                    @if($opportunity->ReceiveCof->status == 0)
                      <div class="card border-left-danger shadow h-100 py-2">
                        <div class="card-body">
                          <div class="d-flex row no-gutters align-items-center">
                            <div class="col mr-2">
                              <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Receive C.O.F</div>
                              <div class="h5 mb-0 font-weight-bold text-danger">Pending</div>
                              
                            </div>
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
                                <div class="p mb-0 font-weight-bold text-danger">{{$opportunity->Cof2Admin->expiry}}</div>
                                
                              </div>
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
                <div class="modal fade bd-example-modal-lg" id="UpdateOpportunity" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-lg">
                          <div class="modal-content w-100">
                             <div class="modal-body">
                             <div class="modal-header mb-2"><strong>Update Opportunity</strong></div>
                                <form action="/admin/opportunity/update/{{$opportunity->id}}" method="post">
                                      @csrf
                                      <input type="text" name="opportunity_no" class="form-control" placeholder="Opportunity Number" required>
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
                                    <p><strong>Opportunity Number </strong>:@if($opportunity->opportunity_no == "") Not Updated <button data-target="#UpdateOpportunity" data-toggle="modal" class="btn btn-primary btn-sm">Update</button> @else {{$opportunity->opportunity_no}} @endif</p>
                                        <hr>
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
