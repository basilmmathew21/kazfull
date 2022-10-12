<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Karzool Admin <sup>2</sup></div>
      </a>
	 <?php
	   use App\Http\Controllers\Controller;
	   $userPermission = Controller::resourceInfo();
	  ?>
      <!-- Divider -->
      <hr class="sidebar-divider my-0">
	
      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="/">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
		
	   @if($userPermission['Branches']['view'] == 1)
	   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-building"></i>
          <span>Branches</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
			@if($userPermission['Branches']['add'] == 1)
            <a class="collapse-item" href="/addBranch">Add Branch</a>
			@endif
			@if($userPermission['Branches']['view'] == 1)
			<a class="collapse-item" href="/Branch">View Branches</a>
			@endif
			 <!--<a class="collapse-item" href="register.html">Register</a>
            <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
            <div class="collapse-divider"></div>
            <h6 class="collapse-header">Other Pages:</h6>
            <a class="collapse-item" href="404.html">404 Page</a>
            <a class="collapse-item" href="blank.html">Blank Page</a>-->
          </div>
        </div>
      </li>
	  @endif
	  
	  @if($userPermission['Drivers']['view'] == 1)
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-car"></i>
          <span>Driver Management</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		     @if($userPermission['Drivers']['add'] == 1)
			 <a class="collapse-item" href="/addDriver">Add Driver</a>
			 @endif	 
			 @if($userPermission['Drivers']['view'] == 1)
             <a class="collapse-item" href="/Driver">View Drivers</a>
			 @endif
			 <a class="collapse-item" href="/DriverPending">Pending Request</a>
          </div>
        </div>
      </li>
	  @endif
	  
	  
	  @if($userPermission['Customers']['view'] == 1)
	    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUsers" aria-expanded="true" aria-controls="collapseUsers">
          <i class="fas fa-fw fa-users"></i>
          <span>Passenger Management</span></a>
		  <div id="collapseUsers" class="collapse" aria-labelledby="collapseUsers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		  @if($userPermission['Customers']['add'] == 1)
		    <a class="collapse-item" href="/addCustomers">Add Passenger</a>
		  @endif
		  
		  @if($userPermission['Customers']['view'] == 1)
            <a class="collapse-item" href="/Customers">View Passengers</a>
		  @endif
          </div>
        </div>
      </li>
	  @endif
	  
	  @if($userPermission['Jobs']['view'] == 1)
	  
	   <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseJobs" aria-expanded="true" aria-controls="collapseJobs">
          <i class="fas fa-fw fa-tasks"></i>
          <span>Job Request</span>
		</a>
		  <div id="collapseJobs" class="collapse" aria-labelledby="collapseJobs" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <a class="collapse-item" href="/Jobslist">View Jobs</a>
          </div>
        </div>
      </li>
	  @endif
	  
	  @if($userPermission['Promotion']['view'] == 1)
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePromotion" aria-expanded="true" aria-controls="collapsePromotion">
          <i class="fas fa-fw fa-qrcode"></i>
          <span>Promotion</span></a>
		  <div id="collapsePromotion" class="collapse" aria-labelledby="collapsePromotion" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		  @if($userPermission['Promotion']['add'] == 1)
			 <a class="collapse-item" href="/addPromotion">Add Promotion</a>
		  @endif
		  @if($userPermission['Promotion']['view'] == 1)
			 <a class="collapse-item" href="/Promotion">View Promotions</a>
		  @endif
           
          </div>
        </div>
      </li>
	  @endif
	  
	  @if($userPermission['Notification']['view'] == 1)
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotify" aria-expanded="true" aria-controls="collapseNotify">
          <i class="fas fa-fw fa-flag"></i>
          <span>Notification</span></a>
		  <div id="collapseNotify" class="collapse" aria-labelledby="collapseNotify" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		  @if($userPermission['Notification']['add'] == 1)
			 <a class="collapse-item" href="/addNotification">Add Notification</a>
		  @endif
		  @if($userPermission['Notification']['view'] == 1)
            <a class="collapse-item" href="/Notification">View Notifications</a>
		  @endif
          </div>
        </div>
      </li>
	 @endif
	
	  @if($userPermission['Generate New Cards']['view'] == 1 || 
	      $userPermission['All Cards']['view'] == 1 ||
		  $userPermission['Used Cards']['view'] == 1 ||
		  $userPermission['Unused Cards']['view'] == 1 ||
		  $userPermission['Printed Cards']['view'] == 1
		  )
			
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTopup" aria-expanded="true" aria-controls="collapseTopup">
          <i class="fas fa-fw fa-comments-dollar"></i>
          <span>Vouchers</span>
		</a>
		  <div id="collapseTopup" class="collapse" aria-labelledby="collapseJobs" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		    @if($userPermission['Generate New Cards']['view'] == 1)
				<a class="collapse-item" href="/TopupCards">Generate New Cards</a>
			@endif
			@if($userPermission['All Cards']['view'] == 1)
				<a class="collapse-item" href="/AllCards">All Cards</a>
			@endif
			@if($userPermission['Used Cards']['view'] == 1)
				<a class="collapse-item" href="/UsedCards">Used Cards</a>
			@endif
			@if($userPermission['Unused Cards']['view'] == 1)
				<a class="collapse-item" href="/UnUsedCards">Unused Cards</a>
			@endif
			@if($userPermission['Printed Cards']['view'] == 1)
				<a class="collapse-item" href="/PrintedCards">Printed Cards</a>
			@endif
          </div>
        </div>
      </li>
	  @endif
	  
	  
	  @if($userPermission['Admin Users']['view'] == 1)
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAdminUsers" aria-expanded="true" aria-controls="collapseAdminUsers">
          <i class="fas fa-fw fa-users"></i>
          <span>Admin Users</span></a>
		  <div id="collapseAdminUsers" class="collapse" aria-labelledby="collapseAdminUsers" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
		    @if($userPermission['Admin Users']['add'] == 1)
            <a class="collapse-item" href="/addUsers">Add User</a>
			@endif
			@if($userPermission['Admin Users']['view'] == 1)
			<a class="collapse-item" href="/AdminUsers">View Users</a>
			@endif
          </div>
        </div>
      </li>
	  @endif
	
      <!-- Nav Item - Pages Collapse Menu -->
	  
	   @if($userPermission['Country']['view'] == 1 || 
	      $userPermission['City']['view'] == 1 ||
		  $userPermission['Car Body Type']['view'] == 1 ||
		  $userPermission['Car Brand']['view'] == 1 ||
		  $userPermission['Car Color']['view'] == 1 ||
		  $userPermission['Fuel Type']['view'] == 1 ||
		  $userPermission['Car Features']['view'] == 1 ||
		  $userPermission['Car Type']['view'] == 1 ||
		  $userPermission['General Setting']['view'] == 1 ||
		  $userPermission['Currency']['view'] == 1 ||
		  $userPermission['Terms And Conditions']['view'] == 1 ||
		  $userPermission['Piracy Policy']['view'] == 1 ||
		  $userPermission['Ratings']['view'] == 1
		  )
		<li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Settings</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
		 <div class="bg-white py-2 collapse-inner rounded">
            
			@if($userPermission['Country']['view'] == 1)
			<a class="collapse-item" href="/countries">Country</a>
			@endif
			@if($userPermission['City']['view'] == 1)
            <a class="collapse-item" href="/city">City</a>
			@endif
			@if($userPermission['Car Body Type']['view'] == 1)
			<a class="collapse-item" href="/CarBodytype">Car Body Type</a>
			@endif
			@if($userPermission['Car Brand']['view'] == 1)
			<a class="collapse-item" href="/Brand">Car Brand</a>
			@endif
			@if($userPermission['Car Color']['view'] == 1)
			<a class="collapse-item" href="/CarColor">Car Colour</a>
		    @endif
			@if($userPermission['Fuel Type']['view'] == 1)
			<a class="collapse-item" href="/FuelType">Fuel Type</a>
			@endif
			@if($userPermission['Car Features']['view'] == 1)
			<a class="collapse-item" href="/CarFeatures">Car Features</a>
			@endif
			@if($userPermission['Car Type']['view'] == 1)
			<a class="collapse-item" href="/CarType">Car Type</a>
			@endif
			@if($userPermission['General Setting']['view'] == 1)
			<a class="collapse-item" href="/GeneralSetting">General Settings</a>
			@endif
			@if($userPermission['Email Template']['view'] == 1)
			<a class="collapse-item" href="/EmailTemplate">Email Template</a>
			@endif
			@if($userPermission['Currency']['view'] == 1)
			<a class="collapse-item" href="/Currency">Currency</a>
			@endif
			@if($userPermission['Terms And Conditions']['view'] == 1)
			<a class="collapse-item" href="/TermsConditions">Terms And Conditions</a>
			@endif
			@if($userPermission['Piracy Policy']['view'] == 1)
			<a class="collapse-item" href="/PiracyPolicy">Piracy Policy</a>
			@endif
			@if($userPermission['Ratings']['view'] == 1)
			<a class="collapse-item" href="/Rating">Ratings</a>
			@endif
			@if($userPermission['Contact']['view'] == 1)
			<a class="collapse-item" href="/Contact">Contact</a>
			@endif
          </div> 
        </div>
      </li>
	  @endif
	  
      <!-- Nav Item - Utilities Collapse Menu 
	  
	  <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseIvFriends" aria-expanded="true" aria-controls="collapseIvFriends">
          <i class="fas fa-fw fa-user-friends"></i>
          <span>Invitation</span></a>
		  <div id="collapseIvFriends" class="collapse" aria-labelledby="collapsePromotion" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            
          </div>
        </div>
      </li>-->
	  
   
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) 
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>-->

    </ul>
	
	