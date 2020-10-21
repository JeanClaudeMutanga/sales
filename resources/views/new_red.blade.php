@extends('layouts.app')

@section('content')

<!-- Page Wrapper -->
  <div id="wrapper" class="pt-1">

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
     

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities3" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Check-In</span>
        </a>
        <div id="collapseUtilities3" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Clock Ins :</h6>
            <a class="collapse-item" href="/checkIn">Check In / Out</a>
          </div>
        </div>
      </li>
      
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities4" aria-expanded="true" aria-controls="collapseUtilities">
          <span>Appointments</span>
        </a>
        <div id="collapseUtilities4" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Calender :</h6>
            <a class="collapse-item" href="/calender/open">Open Calender</a>
          </div>
        </div>
      </li>
      
      
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
          
            <div class="container">
                 <h1 class="text-center h3 mb-4 text-gray-800 mt-4">New Red Heart School</h1>
                 @include('layouts.messages')
                 <form method="POST" action="/redheart/create">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">School Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="learners" class="col-md-4 col-form-label text-md-right">Number of learners</label>

                            <div class="col-md-6">
                                <input id="learners" type="text" class="form-control @error('learners') is-invalid @enderror" name="learners" value="{{ old('learners') }}" required autocomplete="learners" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="contact" class="col-md-4 col-form-label text-md-right">Contact Person</label>

                            <div class="col-md-6">
                                <input id="contact" type="text" class="form-control @error('contact') is-invalid @enderror" name="contact" value="{{ old('contact') }}" required autocomplete="contact" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone Number') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="phone" class="form-control @error('phone') is-invalid @enderror" name="phone" required autocomplete="phone">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="city" class="col-md-4 col-form-label text-md-right">City</label>

                            <div class="col-md-6">
                                <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-group row d-flex justify-content-center offset-1" style="margin-left:100px;">
                        
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">State</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="state" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">Post Code</label>

                            <div class="col-md-6 col-sm-8">
                                <input id="postcode" type="text" class="form-control @error('postcode') is-invalid @enderror" name="postcode" value="{{ old('postcode') }}"  autocomplete="postcode" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="form-group row">
                            <label for="start" class="col-md-4 col-form-label text-md-right">In Business Since</label>

                            <div class="col-md-6">
                                <input id="start" type="text" class="form-control @error('start') is-invalid @enderror" name="start" value="{{ old('start') }}"  autocomplete="start" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                      </div>

                      <div class="form-group row">
                            <label for="access" class="col-md-4 col-form-label text-md-right">Internet Access</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="access" name="access" >
                                    <option value="">Choose...</option>
                                    <option value="Yes"> Yes</option>
                                    <option value="No">No</option>
                                    
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="isp" class="col-md-4 col-form-label text-md-right">I.S.P</label>

                            <div class="col-md-6">
                                <input id="isp" type="text" class="form-control @error('isp') is-invalid @enderror" name="isp" value="{{ old('isp') }}"  autocomplete="isp" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ispcontact" class="col-md-4 col-form-label text-md-right">I.S.P Contact</label>

                            <div class="col-md-6">
                                <input id="ispcontact" type="text" class="form-control @error('ispcontact') is-invalid @enderror" name="ispcontact" value="{{ old('ispcontact') }}"  autocomplete="ispcontact" >

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">School Type</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="inputGroupSelect02" name="type" required>
                                    <option value="">Choose...</option>
                                    <option value="Public">Public</option>
                                    <option value="Private">Private</option>
                                    <option value="N.G.O">N.G.O</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <div class="card-header text-center mb-3">Tuck Shop Information</div>

                        <div class="form-group row">
                            <label for="owner" class="col-md-4 col-form-label text-md-right">Shop Ownership</label>
                            <div class="ml-2 mt-2">
                              <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline1" name="ownership" class="custom-control-input" value="School">
                                  <label class="custom-control-label" for="customRadioInline1">School</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                  <input type="radio" id="customRadioInline2" name="ownership" class="custom-control-input" value="Outsourced" data-toggle="collapse" data-target="#outsourced">
                                  <label class="custom-control-label" for="customRadioInline2">Outsourced</label>
                                </div>
                            </div>
                        </div>
                        <!---<button class="btn btn-warning btn-sm" data-target="#outsourced" data-toggle="collapse">Test</button> --->
                        
                        <div class="collapse" id="outsourced">
                            <div class="form-group row">
                                <label for="ownername" class="col-md-4 col-form-label text-md-right">Contact Name</label>

                                <div class="col-md-6">
                                    <input id="ownername" type="text" class="form-control @error('ownername') is-invalid @enderror" name="ownername" value="{{ old('ownername') }}"  autocomplete="ownername" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owneraddress" class="col-md-4 col-form-label text-md-right">Contact Address</label>

                                <div class="col-md-6">
                                    <input id="owneraddress" type="text" class="form-control @error('owneraddress') is-invalid @enderror" name="owneraddress" value="{{ old('owneraddress') }}"  autocomplete="ownername" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ownercity" class="col-md-4 col-form-label text-md-right">City</label>

                                <div class="col-md-6">
                                    <input id="ownercity" type="text" class="form-control @error('ownercity') is-invalid @enderror" name="ownercity" value="{{ old('ownercity') }}"  autocomplete="ownercity" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="ownerpostcode" class="col-md-4 col-form-label text-md-right">Post Code</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="ownerpostcode" type="text" class="form-control @error('ownerpostcode') is-invalid @enderror" name="ownerpostcode" value="{{ old('ownerpostcode') }}"  autocomplete="ownerpostcode" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ownerphone" class="col-md-4 col-form-label text-md-right">Phone</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="ownerphone" type="text" class="form-control @error('ownerphone') is-invalid @enderror" name="ownerphone" value="{{ old('ownerphone') }}"  autocomplete="ownerphone" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ownerfax" class="col-md-4 col-form-label text-md-right">Fax</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="ownerfax" type="text" class="form-control @error('ownerfax') is-invalid @enderror" name="ownerfax" value="{{ old('ownerfax') }}"  autocomplete="ownerfax" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="owneremail" class="col-md-4 col-form-label text-md-right">Email</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="owneremail" type="email" class="form-control @error('owneremail') is-invalid @enderror" name="owneremail" value="{{ old('owneremail') }}"  autocomplete="owneremail" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center mb-3">Banking Details</div>

                        <div class="form-group row">
                                <label for="bank" class="col-md-4 col-form-label text-md-right">Bank</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank') }}" autocomplete="bank" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>

                          <div class="form-group row">
                                <label for="account" class="col-md-4 col-form-label text-md-right">Account Number</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="account" type="text" class="form-control @error('account') is-invalid @enderror" name="account" value="{{ old('account') }}" autocomplete="account" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>

                          <div class="form-group row">
                                <label for="accountype" class="col-md-4 col-form-label text-md-right">Account Type</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="accountype" type="text" class="form-control @error('accountype') is-invalid @enderror" name="accountype" value="{{ old('accountype') }}" autocomplete="accountype" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>

                        <div class="form-group row">
                                <label for="branch" class="col-md-4 col-form-label text-md-right">Branch Name</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}" autocomplete="branch" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>

                          <div class="form-group row">
                                <label for="code" class="col-md-4 col-form-label text-md-right">Branch Code</label>

                                <div class="col-md-6 col-sm-8">
                                    <input id="code" type="text" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" autocomplete="code" >

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                          </div>

                          <div class="form-group row">
                            <label for="method" class="col-md-4 col-form-label text-md-right">Payment Method</label>

                            <div class="col-md-6">
                                <select class="custom-select" id="inputGroupSelect02" name="method">
                                    <option value="">Choose...</option>
                                    <option value="Public">Weekly</option>
                                    <option value="Private">Monthly</option>
                                    <option value="Other">FourthNight</option>
                                </select>
                            </div>
                        </div>
                          <div class="form-group row mb-0">
                              <div class="col-md-6 offset-md-4">
                                  <button type="submit" class="btn btn-primary">
                                      {{ __('Register') }}
                                  </button>
                              </div>
                          </div>
                    </form>
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
