@extends('layouts.app')

@section('content')

@include('layouts.top')
		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('General Setting');
		 ?>
		
        <!-- Begin Page Content -->
        <div class="container-fluid" style="height:600px;">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Settings</h1>
   
     <div class="card shadow mb-4">
		
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
	 
		<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tbody>
				 	<tr>
					    <td>Commision Percentage</td>
						<td>{{$commision['percentage']}}</td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editGeneralSettingPercentage/{{$commision['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
						</td>
					</tr>
					<tr>
					    <td>Invitation Amount</td>
						<td>{{$amount[0]['amount']}}</td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editGeneralSettingAmount/{{$amount[0]['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							&nbsp;&nbsp;
							<a href="viewAmountHistory" class="delete_item">
								<i class="fa fa-eye"></i>
							</a>
							
						</td>
					</tr>
                  </tbody>
                </table>
              </div>
            </div>
        

 

     
        <!-- /.container-fluid -->
        
		</div>
	  </div>
      <!-- End of Main Content -->

     <!-- Footer -->
   	  @include('layouts.footer')
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  
@endsection

<!-- Bootstrap core JavaScript-->
  <script src="/vendor/jquery/jquery.min.js"></script>
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>
  
  <script>
  
  $(document).ready(function(){
   $(".edit-flag").click(function (){
	   $(".span-edit").show('slow');
	   $(".span-list").hide('slow');
   });
});
  </script>