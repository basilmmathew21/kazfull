@extends('layouts.app')

@section('content')

@include('layouts.top')

		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Currency');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Currency</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
			
			<div class="col-md-6 float-right" align="right">
				<span id="import-item-2" style="display:none;float:left">
				<span>
				<form action="importCurrency" name="import" method="POST" enctype="multipart/form-data">
				<span id="csrf-first">
				<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
				</span>
				File : <input id="file" required type="file" name="file" style="width:225px;">
				<button id="submit-btn" type="submit" class="btn btn-primary btn-user">Submit</button>
				</form>
				</span>
				
				</span>
				
				@if($userPermission['permission_add'] == 1)
				<span class="pull-right" style="float:right;">
					<a href="/addCurrency">
						<button type="submit" class="btn btn-primary">
                            Add Currency
						</button>
						</a>
				</span>
				@endif
			    
				<span id="import-item-1" class="pull-left" style="float:right; margin-right:10px;">
				<a id="import-request-button" href="#">
				<button type="button" class="btn btn-primary">
					Import Currency
				</button>
				</a>
				</span>
				</div>
            </div>
			
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>#</th>
					  <th>Country</th>
					  <th>Currency</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Country</th>
					  <th>Currency</th>
                      <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td width="7%">{{$loop->iteration}}</td>
						<td>{{$input['country']}} </td>
						<td>{{$input['currency']}}</td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editCurrency/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteCurrency/{{$input['id']}}" class="delete_item">
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
  
  <script type="text/javascript">
					$(document).ready(function () {
						$("#import-request-button").click(function(e){
						$("#import-item-1").hide('slow');
						$("#import-item-2").show('slow');
					});
				});	
    </script>