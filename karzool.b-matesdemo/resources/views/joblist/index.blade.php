@extends('layouts.app')

@section('content')

@include('layouts.top')
		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Jobs');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Jobs List</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
            </div>
			
			<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
					  <th>Job ID</th>
                      <th>Job Type</th>
					  <th>Customer</th>
					  <th>Driver</th>
					  <th>Status</th>
					  <th>Actions</th>
					</tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Job ID</th>
                      <th>Job Type</th>
					  <th>Customer</th>
					  <th>Driver</th>
					  <th>Status</th>
					  <th>Actions</th>
					</tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['job_number']}} </td>
						<td>@if($input['job_type'] == 1) New job @elseif($input['job_type'] == 2) Later @endif</td>
						<td>{{$input['customer_name']}} </td>
						<td>{{$input['driver_name']}} </td>
						<td> @if($input['job_status'] == 1) Requested @elseif($input['job_status'] == 2) Pending @elseif($input['job_status'] == 3) Send @elseif($input['job_status'] == 4) Accept @elseif($input['job_status'] == 5) Cancelled @endif </td>
						<td width="25%">
							<a class="modal_popup" id="{{$input['id']}}" href="viewDriver/{{$input['id']}}" data-toggle="modal" data-target="#myModal">
								<i class="fa fa-eye"></i>
							</a>
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteDriver/{{$input['id']}}" class="delete_item">
								<i class="fa fa-trash"></i>
							</a>
							@endif
						</td>
					</tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
			<style>
				.color-s1{ color: #aaa;}
				.form-group{ margin-bottom: 10px;}
				.input-group { padding-top: 7px;}
				._tit{ color:#999; text-align: right; }
				._val{ color:#000; text-align: left; }
				._head { font-size: 1.4em; color: #1caa92; padding-bottom: .5em;}
			</style>
			

		  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog" style="min-width: 1000px;min-height: 900px;height: 900px;overflow-y: scroll;">
				<div class="modal-content">
					<div class="modal-header">
						<h2 class="modal-title">Job details</h2>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body" id="job_model_content">
						
						
					</div>

					
					<div class="modal-footer">
						
						<button type="button" class="btn btn-success" id="btn-confirm-popup">Confirm</button>
						<button type="button" class="btn btn-danger" id="btn-cancel-popup">Cancel</button>
						
						<button type="button" class="btn btn-default" data-dismiss="modal" id="btn-job-popup-close1">Close</button>
						<!--<button type="button" class="btn btn-primary">Save changes</button>-->
					</div>
				</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
		</div>
		  
		  
		  <div class="modal fade" id="myModal" role="dialog">
			<div class="modal-dialog" style="min-width: 1000px;">
			  <div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title">Job details</h5>
						<button type="button" class="close" data-dismiss="modal">×</button>
							
					</div> 
					<div id="popup_minimal" class="modal-body">
					  
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-toggle="modal" id="btn-job-popup-open" data-target="#myModal1">View more</button>
						<button class="btn btn-default" data-dismiss="modal" id="btn-job-popup-close">Close</button>
					</div>
				</div>
			  
			  
			</div>
		  </div>
		 

        </div>
        <!-- /.container-fluid -->
        
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

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="{{ route('logout') }}">Logout</a>
        </div>
      </div>
    </div>
  </div>
 <script>
	$(document).ready(function(){
		
		$(".modal_popup").click(function(){
			var id = $(this).attr("id");
			$.ajax({
                        type: "POST",
                        url: "/Joblist/jobview",
                        data: {"_token": "{{ csrf_token() }}",
							   id:id
							   },
                        dataType: "json",
                        success: function (data) {
							if (data.status == 1) {
							   $("#popup_minimal").html(data.data_first);
							   $("#job_model_content").html(data.data_second);
							} else if (data.status == 0) {
							
							  return true;
                            }
                        },
                        error: function (data) {
                            return false;
                        }
			});
		});
		
		$("#btn-job-popup-open").click(function(){
			$("#btn-job-popup-close").trigger("click");
		});
	});
 </script>
@endsection

<!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>