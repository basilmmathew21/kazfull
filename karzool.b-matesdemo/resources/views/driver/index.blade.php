@extends('layouts.app')

@section('content')

@include('layouts.top')

	<script>
	$(document).ready(function () {
		$(".change-staus").click(function(){
			if(confirm('Do you want change this Driver mobile number verified?'))
			{
				var obj = $(this);
				$.ajax({
					type:'POST',
					url:'/ajaxChangeDriverStatus',
					data:{"_token": "{{ csrf_token() }}",
							status:$(this).attr('alt'),
							id:$(this).attr('id')
						 },
						success:function(data){
							obj.parents('td').last().html('<label class="text-green"><b>Verified</b></label>');
							obj.remove();
							//alert(obj.html(''));
							/*
							if(obj.attr('alt') == '1')
							{
								obj.removeClass('fa-circle').addClass('fa-dot-circle');
								obj.attr('alt','3');
								obj.attr('title','Active');
								obj.parent().parent().css("color", "green");
								
							}else if(obj.attr('alt') == '3'){
								obj.removeClass('fa-dot-circle').addClass('fa-circle');
								obj.attr('alt','1');
								obj.attr('title','Inactive');
								obj.parent().parent().css("color", "red");
							}
							*/
						}
				});
			}else{
				return false;
			}
		});
	});
	</script>

		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Drivers');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Driver List</h1>
		  <!-- Content Row -->
          <div class="row">

            
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
              
			@if($userPermission['permission_add'] == 1)
			<div class="col-md-2 mb-8 mb-sm-0 float-right">
			<span class="pull-right">
				<a href="/addDriver">
					<button type="submit" class="btn btn-primary">
                        Add Driver
					</button>
				</a>
			</span>
			</div>
			@endif
            </div>
			<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                  <thead>
                    <tr>
                      <th>#</th>
					  <th>Name</th>
                      <th>Name Somali</th>
					  <th>Email</th>
					  <th>Vehicle&nbsp;Type</th>
					  <!--<th>City,Country</th>-->
					  <th>Status</th>
					  <th>Is&nbsp;Verified</th>
					  <th>Actions</th>
					</tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Name</th>
                      <th>Name Somali</th>
					  <th>Email</th>
					  <th>Vehicle&nbsp;Type</th>
					  <!--<th>City,Country</th>-->
					  <th>Status</th>
					  <th>Is&nbsp;Verified</th>
					  <th>Actions</th>
					</tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['name'] }} </td>
						<td>{{$input['name_somali']}}</td>
						<td>{{$input['email'] }} </td>
						<td>{{$input['cartype'] }} </td>
						<!--<td>{{$input['cityname'] }},{{ $input['cname'] }} </td>-->
						<!--
						<td align="center" @if($input['status'] == '1') style="color:green;" @elseif($input['status'] == '2') style="color:orange;" @elseif($input['status'] == '3') style="color:red;" @endif  >
							
								@if($input['status'] == '1')
								<span>
								<i class="fa fa-dot-circle change-staus" alt="3" id="{{$input['id']}}" title="Active"></i>
								</span>
								@elseif($input['status'] == '2')
								<span>
								<i class="fa fa-circle" alt="2" id="{{$input['id']}}" title="Pending"></i>
								</span>	
								@else
								<span>
								<i class="fa fa-circle change-staus"  alt="1" id="{{$input['id']}}" title="Inactive"></i>
								</span>
								@endif
							</a>
						</td>
						
						<td width="25%">
							<a href="viewDriver/{{$input['id']}}">
								<i class="fa fa-eye"></i>
							</a>
							@if($userPermission['permission_edit'] == 1)
							&nbsp;&nbsp;
							<a href="editDriver/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteDriver/{{$input['id']}}" class="delete_item">
								<i class="fa fa-trash"></i>
							</a>
							@endif
						</td>
						-->
						<td>
						@if($input['status'] == 1)
							<span class="label-status label-warning">Active</span>
						@elseif($input['status'] == 2)
						    <span class="label-status label-warning">Pending</span>
						@elseif($input['status'] == 3)
						    <span class="label-status label-warning">Deactive</span>	
						@elseif($input['status'] == 4)
						    <span class="label-status label-warning">Need Approval</span>	
						@elseif($input['status'] == 5)
						    <span class="label-status label-success">Approved</span>	
						@endif 	
						</td>
						<td class="varify-td">
						@if($input['is_varified'] == 0)
							<a id="{{$input['id']}}" href="#" alt="1" class="change-staus btn btn-xs btn-danger" onclick="">Verify</a>
		                @elseif($input['is_varified'] == 1)
						    <label class="text-green">  
                                <b>Verified</b>
                            </label>
						@endif	
						</td>
						<td width="25%">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Action
							</button>
							<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
							  <a class="dropdown-item" href="#">Reset Password</a>
							  <a href="viewDriver/{{$input['id']}}" class="dropdown-item" href="#">View</a>
							  @if($userPermission['permission_edit'] == 1)
							  <a href="editDriver/{{$input['id']}}" class="dropdown-item text-green" href="#">Edit</a>
							  @endif
							  @if($userPermission['permission_delete'] == 1)
							  <a onClick="return confirm('Want to delete?');" href="deleteDriver/{{$input['id']}}" class="dropdown-item text-red" href="#">Delete</a>
							  @endif
							  <a href="#" class="dropdown-item" href="#">Decline</a>
							  <a href="#" class="dropdown-item" href="#">View History</a>
							  <a href="#" class="dropdown-item" href="#">View Document</a>
							  @if(($loop->iteration%3) == 0)							  
							  <a href="#" class="dropdown-item" href="#">Un Block</a>
							  @else
							  <a href="#" class="dropdown-item" href="#">Block</a>  
							  @endif 
							  <a href="#" class="dropdown-item" href="#">Approve</a>
							</div>
						</td>
					</tr>
                   @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->
        
      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2019</span>
          </div>
        </div>
      </footer>
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