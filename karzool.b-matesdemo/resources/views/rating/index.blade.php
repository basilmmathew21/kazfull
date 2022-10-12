@extends('layouts.app')
@section('content')
@include('layouts.top')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Rating');
		 ?>
<style>
.checked {
  color: orange;
}
</style>		 
        <!-- Begin Page Content -->
        <div class="container-fluid">
		<!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Ratings List</h1>
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
			</div>
			<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                  <thead>
                    <tr>
                      <th>#</th>
					  <th style="width:190px;">Name</th>
                      <th style="width:200px;">Description</th>
					  <th style="width:160px;">Rating</th>
					  <th style="">Actions</th>
					</tr>
                  </thead>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['cname'] }} </td>
						<td>{{$input['description']}}</td>
						<td>
							<span class="fa fa-star @if($input['rating'] >= 1) checked @endif"></span>
							<span class="fa fa-star @if($input['rating'] >= 2) checked @endif"></span>
							<span class="fa fa-star @if($input['rating'] >= 3) checked @endif"></span>
							<span class="fa fa-star @if($input['rating'] >= 4) checked @endif"></span>
							<span class="fa fa-star @if($input['rating'] >= 5) checked @endif"></span>
						</td>
						<td>
						@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteRating/{{$input['id']}}" class="delete_item">
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