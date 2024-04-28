
<aside class="main-sidebar" style="height: 100vh; background-color:black; position:fixed;">
    <a href="dashboard.php" class="brand-link logo-switch">
      <h4 class="brand-image-xl logo-xl mb-0 text-center"><b>Menu</b></h4>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#"></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item" id="mnu_dashboard">
            <a href="dashboard.php" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          
          <li class="nav-item" id="mnu_patients">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-injured"></i>
              <p>
                <i class="fas "></i>
                Patients
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="new_prescription.php" class="nav-link" 
                id="mi_new_prescription">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Prescription</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="patient.php" class="nav-link" 
                id="mi_patients">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Patients</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Videocall.html" class="nav-link" 
                id="mi_patient_history" target=_blank>
                  <i class="far fa-circle nav-icon"></i>
                  <p>Video Call</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="Feedback_admin.php" class="nav-link" 
                id="mi_patient_history">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Feedback</p>
                </a>
              </li>
              
            </ul>
        </li>
        <li class="nav-item" id="mnu_users">
            <a href="today_appointment.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Today's Appointment
              </p>
            </a>
          </li>


          <li class="nav-item" id="mnu_users">
            <a href="Query_admin.php" class="nav-link">
              <i class="nav-icon fa fa-users"></i>
              <p>
                Queries
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="index.php" class="nav-link">
              <i class="nav-icon fa fa-sign-out-alt"></i>
              <p>
                Logout
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>