<ul class="navbar-nav bg-info sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Admin</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-user-md"></i>
            <span>Doctor</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Doctor</h6>
                <a class="collapse-item" href="{{route('doctor.index')}}">New Doctor</a>
                <a class="collapse-item" href="{{route("appointment.index")}}">Appointments Doctor</a>
                <a class="collapse-item" href="">Best Doctor</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Diagnostic Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-diagnoses"></i>
            <span>Diagnostic</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Diagnostic</h6>
                <a class="collapse-item" href="{{route('diagnostic.index')}}">New Diagnostic</a>
                {{-- <a class="collapse-item" href="utilities-border.html">Diagnostic List</a> --}}
            </div>
        </div>
    </li>

      <!-- Nav Item - Ambulance Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAmbulance"
            aria-expanded="true" aria-controls="collapseAmbulance">
            <i class="fa fa-ambulance"></i>
            <span>Ambulance</span>
        </a>
        <div id="collapseAmbulance" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Ambulance</h6>
                <a class="collapse-item" href="{{route("ambulance.index")}}">New Ambulance</a>
                {{-- <a class="collapse-item" href="utilities-border.html">Ambulance</a> --}}
            </div>
        </div>
    </li>

          <!-- Nav Item - Blood Doner Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDoner"
                aria-expanded="true" aria-controls="collapseDoner">
                <i class="	fa fa-medkit"></i>
                <span>Blood Donaer</span>
            </a>
            <div id="collapseDoner" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Doner</h6>
                    <a class="collapse-item" href="{{route("doner.index")}}">New Doner</a>
                    {{-- <a class="collapse-item" href="utilities-border.html">Donaer List</a> --}}
                </div>
            </div>
        </li>

        
          <!-- Nav Item - Seeting Collapse Menu -->
          <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#headingSetting"
                aria-expanded="true" aria-controls="headingSetting">
                <i class="fa fa-cog"></i>
                <span>Setting</span>
            </a>
            <div id="headingSetting" class="collapse" aria-labelledby="headingSetting"
                data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Setting</h6>
                    <a class="collapse-item" href="{{route("division.index")}}">Division</a>
                    <a class="collapse-item" href="{{route("district.index")}}">District</a>
                    <a class="collapse-item" href="{{route("upzila.index")}}">Upzila</a>
                    <a class="collapse-item" href="utilities-border.html">User</a>
                    <a class="collapse-item" href="utilities-border.html">Basic Setting</a>
                </div>
            </div>
        </li>

   

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  

</ul>