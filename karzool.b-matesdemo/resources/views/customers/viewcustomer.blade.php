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
          <h1 class="h3 mb-4 text-gray-800">Customer Details</h1>
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Customers">
						<button type="submit" class="btn btn-primary">
                            View Customerss
						</button>
						</a>
				</span>
			  </div>
			<div class="row">
			@if($editInfo['status'] == "1")
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
			  
			@endif
			
			<div id="tabs" style="width:1400px;">
			  
			  <ul>
				<li><a href="#tabs-1">General</a></li>
			 </ul>
			  <div id="tabs-1">
				<div class="col-lg-10">
					<table width="100%" border="0"  class="table table-bordered dataTable">
					<tr>
						<td width="20%">Name </td> <td width="80%">:&nbsp;&nbsp; {{$editInfo['name']}} </td>
					</tr>
					<tr>
						<td>Name (Somali) </td> <td>:&nbsp;&nbsp; {{$editInfo['name_somali']}} </td>
					</tr>
					<tr>
						<td>Gender </td> <td>:&nbsp;&nbsp; @if($editInfo['gender'] == 1) Male @else Fe Male @endif</td>
					</tr>
					<tr>
						<td>Email </td> <td>:&nbsp;&nbsp; {{$editInfo['email_address']}} </td>
					</tr>
					<tr>
						<td>Status </td> <td>:&nbsp;&nbsp; @if($editInfo['status'] == 1) Active  @elseif($editInfo['status'] == 2) Pending @else Deactive @endif </td>
					</tr>
					<tr>
						<td>Phone </td> <td>:&nbsp;&nbsp; {{$editInfo['mobile_number']}} </td>
					</tr>
					<tr>
						<td>Country </td> <td>:&nbsp;&nbsp; {{$country['country']}} </td>
					</tr>
					<tr>
						<td>Joined At </td> <td>:&nbsp;&nbsp; <?php echo date("m/d/Y H:i",strtotime($editInfo['created_at'])); ?> </td>
					</tr>
					<tr>
						<td>Updated At </td> <td>:&nbsp;&nbsp; <?php echo date("m/d/Y H:i",strtotime($editInfo['updated_at'])); ?> </td>
					</tr>
					</table>
				</div>
			  </div>
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

 
  