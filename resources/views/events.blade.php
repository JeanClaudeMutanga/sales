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
            <a class="collapse-item" href="#">Open Calender</a>
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
                 <div class="d-flex">
                     <a href="/events/edit"  class="btn btn-success btn-sm mt-4 mb-4 mr-3">Edit Appointment</a>
                 
                    <a href="#Book" data-target="#Book" data-toggle="modal" class="btn btn-success btn-sm mt-4 mb-4">Book Appointment</a>
                 </div>
                 </div>
                 <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="font-weight-bold text-primary">Booked Appointments</h6>
              </div>
              <div class="mt-1" id='calendar'></div>
        </div>

      </div>
      <!-- End of Main Content -->

      <script>

      document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');

        var calendar = new FullCalendar.Calendar(calendarEl, {
          headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
          },
          initialDate: '<?php echo $date; ?>',
          navLinks: true, // can click day/week names to navigate views
          selectable: true,
          selectMirror: true,
          select: function(arg) {
            var title = prompt('Event Title:');
            if (title) {
              calendar.addEvent({
                title: title,
                start: arg.start,
                end: arg.end
              })
            }
            calendar.unselect()
          },
          
          editable: true,
          dayMaxEvents: true, // allow "more" link when too many events
          events: [
            <?php foreach($events as $event){
                    echo $event.',';
                  } ?>
          ]
        });

        calendar.render();
  });

</script>
     
      <style>

        body {
          
          padding: 0;
          font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
          font-size: 14px;
        }

        #calendar {
          height: 200px;
          max-width: 1400px;
          margin: 0 auto;
        }

      </style>

<!---Modal--->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="Book">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content card w-100">
                        <div class="modal-body">
                            <form id="CustomerForm" name="CustomerForm" class="form-horizontal" action ="/calender/create/" method="get">
                                @method('POST')
                                @csrf
                                <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label">Title</label>

                                    <div class="col-sm-12">
                                        <input type="text" name="title" id="ttle" class="form-control" required placeholder="e.g Primrose School By Lucky">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label">Start</label>

                                    <div class="col-sm-12">
                                        <input type="datetime-local" name="start" id="start" class="form-control" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="type" class="col-sm-2 control-label">End</label>

                                    <div class="col-sm-12">
                                        <input type="datetime-local" name="end" id="end" class="form-control" required>
                                    </div>
                                </div>
                               

                                <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Create
                                </button>
                                </div>
                            </form>
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
