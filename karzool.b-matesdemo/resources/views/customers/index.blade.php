@extends('layouts.app')

@section('content')

@include('layouts.top')
		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Drivers');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Passangers</h1>
          
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
						<a href="/addCustomers">
						<button type="submit" class="btn btn-primary">
                            Add Passanger
						</button>
						</a>
				</span>
			  </div>
			  @endif
            </div>
			
			
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
					  <th>Name</th>
					  <th>Gender</th>
					  <th>Mobile</th>
					  <th>Email</th>
					  <th>Country</th>
					  <th>Status</th>
					  <th style="width: 95px;">Is&nbsp;Verified</th>
					  <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Name</th>
					  <th>Gender</th>
					  <th>Mobile</th>
					  <th>Email</th>
					  <th>Country</th>
					  <th>Status</th>
					  <th style="width: 95px;">Is&nbsp;Verified</th>
					  <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['name']}}</td>
						<td>@if($input['gender'] == "0") Female @else Male @endif</td>
						<td>{{$input['mobile_number']}} </td>
						<td>{{$input['email_address']}}</td>
						<td>{{$input['cname']}}</td>
						<td>
							<span class="label-status label-warning">Pending</span>
						</td>
						<td>
							<a href="#" class="btn btn-xs btn-danger" onclick="return confirm('Do you want change this Passenger email verified Passenger?');">Verify</a>
						</td>
						<td width="25%">
							<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							  Action
							</button>
							<div class="dropdown-menu animated--fade-in" aria-labelledby="dropdownMenuButton">
							  <a class="dropdown-item" href="#">Reset Password</a>
							  <a href="viewCustomer/{{$input['id']}}" class="dropdown-item" href="#">View</a>
							  @if($userPermission['permission_edit'] == 1)
							  <a href="editCustomers/{{$input['id']}}" class="dropdown-item text-green" href="#">Edit</a>
							  @endif
							  @if($userPermission['permission_delete'] == 1)
							  <a  onClick="return confirm('Want to delete?');" href="deleteCustomers/{{$input['id']}}" class="dropdown-item text-red" href="#">Delete</a>
							  @endif
							</div>
						</td>
						<!--
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editCustomers/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteCustomers/{{$input['id']}}" class="delete_item">
								<i class="fa fa-trash"></i>
							</a>
							@endif
						</td>
						-->
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