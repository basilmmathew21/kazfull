  @extends('layouts.app')
  <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
  <script>
	$(function() {
		$( "#tabs" ).tabs();
		$("#general-next").click(function(){
				$("#form-general").validate();
				if ($('#form-general').valid()) // check if form is valid
				{
					$("#tabs").tabs({ active: 1 });
				}
				
			});
		 
		  $("#vehicle-next").click(function(){
				$( "#tabs" ).tabs({ active: 2 }); 
		  });
		  
		  $("#vehicle-back").click(function(){
				$( "#tabs" ).tabs({ active: 0 }); 
		  });
		  
		  $("#last-back").click(function(){
				$( "#tabs" ).tabs({ active: 1 }); 
		  });
			
	});
  </script>
  
@section('content')
@include('layouts.top')
<!-- Bootstrap core JavaScript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
  
      <!-- Begin Page Content -->
	  <div class="container-fluid">
		  
		  <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Driver Details</h1>
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Driver">
						<button type="submit" class="btn btn-primary">
                            View Drivers
						</button>
						</a>
				</span>
			  </div>
			<div class="row">
			
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-success shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings </div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">${{$drvCostInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>
				
				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-primary shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Trips</div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$countInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-calendar fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>



				<!-- Earnings (Monthly) Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-info shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Completed Trips</div>
						  <div class="row no-gutters align-items-center">
							<div class="col-auto">
							  <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{$drvCountAttdInput}}</div>
							</div>
							<div class="col">
							  <div class="progress progress-sm mr-2">
								<div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
							  </div>
							</div>
						  </div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>

				<!-- Pending Requests Card Example -->
				<div class="col-xl-3 col-md-6 mb-4">
				  <div class="card border-left-warning shadow h-100 py-2">
					<div class="card-body">
					  <div class="row no-gutters align-items-center">
						<div class="col mr-2">
						  <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Canceled Trips</div>
						  <div class="h5 mb-0 font-weight-bold text-gray-800">{{$drvTotCanceledInput}}</div>
						</div>
						<div class="col-auto">
						  <i class="fas fa-comments fa-2x text-gray-300"></i>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  
			  <div class="col-xl-12 col-md-6 mb-4">
			  <div class="box-footer label-default">
					<a class="btn btn-primary" href="#" onclick="return confirm('Do you want to reset the password?');">
					<b>Reset Password</b>
					</a>
					<a class="btn btn-warning" href="/editDriver/{{$editInfo['id']}}"  style="text-align: left">
						<b>Edit</b>
					</a>
				    <a class="btn btn-danger" onClick="return confirm('Want to delete?');" href="/deleteDriver/{{$editInfo['id']}}" >
						<b>Delete</b>
					</a>
				    <a class=" btn btn-warning" href="#" onclick="return confirm('bernard bet - Do you want decline this provider?');">
						<b>Decline</b>
					</a>
				   <a class=" btn btn-info" href="#"><b>View History</b></a>
     		</div>
			</div>
			
			<div id="tabs" style="width:1400px;">
			  
			  <ul>
				<li><a href="#tabs-1">General</a></li>
				<li><a href="#tabs-2">Vehicle Details</a></li>
				<li><a href="#tabs-3">Documents</a></li>
				@if($editInfo['status'] == "1")
					<li><a href="#tabs-4">Trips</a></li>
				@endif
			  </ul>
			  <div id="tabs-1">
				<div class="col-lg-10">
               
					<table width="100%" border="0"  class="table table-bordered dataTable">
					<tr>
						<td width="20%">Name </td> <td width="80%">:&nbsp;&nbsp;{{$editInfo['name']}} </td>
					</tr>
					<tr>
						<td>Name (Somali) </td> <td>:&nbsp;&nbsp;{{$editInfo['name_somali']}} </td>
					</tr>
					<tr>
						<td>Gender </td> <td>:&nbsp;@if($editInfo['gender'] == 1) Male @else Female @endif</td>
					</tr>
					<tr>
						<td>Email </td> <td>:&nbsp;&nbsp;{{$editInfo['email']}} </td>
					</tr>
					<tr>
						<td>Status </td> <td>:&nbsp; @if($editInfo['status'] == 1) Active  @elseif($editInfo['status'] == 2) Pending @else Deactive @endif </td>
					</tr>
					
					
					<tr>
						<td>Is Verified </td> <td>:
													<label class="text-green">  
													<b>&nbsp;Verified</b>
													</label>
											  </td>
					</tr>
					
					<tr>
						<td>Paypal Email</td> <td>: </td>
					</tr>
					<tr>
						<td>Currency </td> <td>: &nbsp;{{$country['currency']}}</td>
					</tr>
					<tr>
						<td>Payment Mode </td> <td>: </td>
					</tr>
					
					
					<tr>
						<td>Phone </td> <td>:&nbsp;&nbsp;{{$editInfo['phone']}} </td>
					</tr>
					<tr>
						<td>Address </td> <td>:&nbsp;&nbsp;{{$editInfo['address']}} </td>
					</tr>
					<tr>
						<td>Country </td> <td>:&nbsp;&nbsp;{{$country['country']}} </td>
					</tr>
					<tr>
						<td>City </td> <td>:&nbsp;&nbsp;{{$country['city']}} </td>
					</tr>
					<tr>
						<td>Joined At </td> <td>:&nbsp;&nbsp;<?php echo date("m/d/Y H:i",strtotime($editInfo['created_at']));?> </td>
					</tr>
					<tr>
						<td>Updated At </td> <td>:&nbsp;&nbsp;<?php echo date("m/d/Y H:i",strtotime($editInfo['updated_at']));?> </td>
					</tr>
					</table>
					
				</div>
			  </div>
			
			  <div id="tabs-2">
			  <div class="container">
			  
				<div class="col-lg-10">
               
					<table width="100%" border="0" class="table table-bordered dataTable">
					<tr>
						<td width="20%">Vehicle Number </td> <td width="80%" colspan="2"> :&nbsp;&nbsp;{{$editVehicleInfo['vehicle_number']}} </td>
					</tr>
						 
					<tr>  
						<td>Vehicle Name </td> <td colspan="2">:&nbsp;&nbsp;{{$editVehicleInfo['vehicle_name']}} </td> 
					</tr>
					<tr>
						<td>Car Body Type </td> <td>:&nbsp;&nbsp;{{$editVehicleInfo['name']}} </td><td><img src="/upload-icon/{{$editVehicleInfo['icon']}}" style="width:75px;"></td>
					</tr>
					<tr>
						<td>Brand </td> <td>:&nbsp;&nbsp;{{$editVehicleInfo['brand']}} </td><td><img src="/upload-brand/{{$editVehicleInfo['brand_icon']}}" style="width:75px;"></td>
					</tr>
					<tr>
						<td>Color </td> <td>:&nbsp;&nbsp;{{$editVehicleInfo['color']}} </td>
						<td>
						<button style="height: 50px; width: 100px; background-color:{{$editVehicleInfo['icon_color']}};">
						</button>
						</td>
					</tr>
					<tr>
						<td>Fuel Type </td> <td colspan="2">:&nbsp;&nbsp;{{$editVehicleInfo['car_fuel']}} </td>
					</tr>
					
					</table>
					
				</div>
				
			 </div>
			 </div>
			  
			  <div id="tabs-3">
			  <div class="row">
			  
				<div class="col-lg-12">
					<div class="p-5">
							<div class="row">
							<div align="center" style="padding-left:350px;">Driving Licence</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td style="width:460px;">
											@if($viewInfo['driving_licence'] != "")
											<a id="doc1" href="/upload-driver-docs/{{$viewInfo['driving_licence']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['driving_licence']}}" alt="">
											</a>
											@endif
										</td>
										<td style="width:380px;">
											<table border="0" class="table table-bordered dataTable">
											<tr>
												<td align="center" style="width:160px;">Driving Issue </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['driving_issue']))}} </td>
											</tr>
											<tr>
												<td align="center" style="width:160px;">Driving Expiry </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['driving_expiry']))}} </td>
											</tr>
											</table>
										</td>
									</tr>
									</table>
							</div>
							
							<div class="row">
							<div style="padding-left:350px;">Vehicle Details</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td style="width:460px;">
											@if($viewInfo['vehicle_number'] != "")
											<a id="doc2" href="/upload-driver-docs/{{$viewInfo['vehicle_number']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['vehicle_number']}}" alt="">
											</a>
											@endif
										</td>
										<td style="width:380px;">
											<table border="0" class="table table-bordered dataTable">
											<tr>
												<td align="center" style="width:160px;">Vehicle Issue </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['vehicle_issue']))}} </td>
											</tr>
											<tr>
												<td align="center" style="width:160px;">Vehicle Expiry </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['vehicle_expiry']))}} </td>
											</tr>
											</table>
										</td>
									</tr>
									</table>
							</div>
							
							<div class="row">
							<div style="padding-left:350px;">Insurance Details</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td style="width:460px;">
											@if($viewInfo['insurance'] != "")
											<a id="doc3" href="/upload-driver-docs/{{$viewInfo['insurance']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['insurance']}}" alt="">
											</a>
											@endif
										</td>
										<td style="width:380px;">
											<table border="0" class="table table-bordered dataTable">
											<tr>
												<td align="center" style="width:160px;">Insurance Issue </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['insurance_issue']))}} </td>
											</tr>
											<tr>
												<td align="center" style="width:160px;">Insurance Expiry </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['insurance_expiry']))}} </td>
											</tr>
											</table>
										</td>
									</tr>
									</table>
							</div>
							
							
							<div class="row">
							<div style="padding-left:350px;">ID Details</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td style="width:460px;">
											@if($viewInfo['id_proof'] != "")
											<a id="doc4" href="/upload-driver-docs/{{$viewInfo['id_proof']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['id_proof']}}" alt="">
											</a>
											@endif
										</td>
										<td style="width:380px;">
											<table border="0" class="table table-bordered dataTable">
											<tr>
												<td align="center" style="width:160px;">ID Issue </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['id_issue']))}} </td>
											</tr>
											<tr>
												<td align="center" style="width:160px;">ID Expiry </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['id_expiry']))}} </td>
											</tr>
											</table>
										</td>
									</tr>
									</table>
							</div>
							
							
							<div class="row">
							<div style="padding-left:350px;">Address Details</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td style="width:460px;">
											@if($viewInfo['address_proof'] != "")
											<a id="doc5" href="/upload-driver-docs/{{$viewInfo['address_proof']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['address_proof']}}" alt="">
											</a>
											@endif
										</td>
										<td style="width:380px;">
											<table border="0" class="table table-bordered dataTable">
											<tr>
												<td align="center" style="width:160px;">Address Issue </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['address_issue']))}} </td>
											</tr>
											<tr>
												<td align="center" style="width:160px;">Address Expiry </td> <td style="width:160px;">:&nbsp;&nbsp;{{date("m/d/Y",strtotime($editVehicleInfo['address_expiry']))}} </td>
											</tr>
											</table>
										</td>
									</tr>
									</table>
							</div>
							
							<div class="row">
							@if($viewInfo['photo'] != "")
							<div style="padding-left:350px;">Photo</div>
									<table width="100%" border="0" class="table table-bordered dataTable">
									<tr>
										<td colspan="2">
											<a id="doc6" href="/upload-driver-docs/{{$viewInfo['photo']}}">
												<img width="300" height="200" src="/upload-driver-docs/{{$viewInfo['photo']}}" alt="">
											</a>
										</td>
									</tr>
									</table>
							@endif
							</div>
				</div>
				
			</div>
				
			</div>
			</div>
			@if($editInfo['status'] == "1")
			
				<div id="tabs-4">
					 <div class="col-lg-12">
									<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									  <thead>
										<tr>
										  <td>#</td>
										  <td>Job ID</td>
										  <td>Job Type</td>
										  <td>Customer</td>
										  <td>Driver</td>
										  <td>Status</td>
										  <td>Actions</td>
										</tr>
									  </thead>
									  <tfoot>
										<tr>
										  <td>#</td>
										  <td>Job ID</td>
										  <td>Job Type</td>
										  <td>Customer</td>
										  <td>Driver</td>
										  <td>Status</td>
										  <td>Actions</td>
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
											<td width="25%" style="color:#4e73df;!important">
												<a class="modal_popup" id="{{$input['id']}}" href="viewDriver/{{$input['id']}}" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-eye"></i>
												</a>
											</td>
										</tr>
									   @endforeach
									  </tbody>
									</table>
								  </div>
			
				</div>
			@endif
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
				.ui-widget-content a {
								 color: #224abe; 
				}
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
		
      <!-- End of Main Content -->

      <!-- Footer -->
   	   @include('layouts.footer')
      <!-- End of Footer -->
  
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
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
  
   <script type="text/javascript">
  
                $(document).ready(function () {
                   
					$("#country_id").change(function(e){
						e.preventDefault();
						
						var id = $(this).val();
						
						$.ajax({
						   type:'POST',
						   url:'/ajaxCountryCity',
						   data:{"_token": "{{ csrf_token() }}",
							   id:id
							   },
						   success:function(data){
								$("#city-response").html(data);
							}
						});
					});
					
				});
    </script>
	
 <!--Bootstrap core JavaScript
  <script src="vendor/jquery/jquery.min.js"></script>-->
  <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="/js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!--Page level custom scripts -->
  <script src="/js/demo/datatables-demo.js"></script>

 
  