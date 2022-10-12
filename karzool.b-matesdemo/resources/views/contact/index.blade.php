@extends('layouts.app')
@section('content')
@include('layouts.top')

		 <?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Contact');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Contact</h1>
          
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
                      <th style="width:20px;">#</th>
					  <th style="width:100px;">Sender Name</th>
					  <th style="width:250px;">Sender Email</th>
					  <th style="width:250px;">Mobile</th>
					  <th style="width:250px;">Message</th>
					  <th style="width:40px;">Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th style="width:20px;">#</th>
					  <th style="width:100px;">Sender Name</th>
					  <th style="width:250px;">Sender Email</th>
					  <th style="width:250px;">Mobile</th>
					  <th style="width:250px;">Message</th>
					  <th style="width:40px;">Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['sender_name'] }} </td>
						<td>{{$input['sender_email'] }} </td>
						<td>{{$input['mobile_number'] }} </td>
						<td>@if($input['message'] != "") {{substr($input['message'],0,75)}}....@endif</td>
						<td>
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteContact/{{$input['id']}}" class="delete_item">
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