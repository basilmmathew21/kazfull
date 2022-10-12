@extends('layouts.app')

@section('content')

@include('layouts.top')

		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Car Brand');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Car Brand</h1>
          
          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
			
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
				<div class="col-md-6 float-right" align="right">
				<span id="import-brands-2" style="display:none;float:left">
				<span>
				<form action="importBrands" name="import-brands" method="POST" enctype="multipart/form-data">
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
					<a href="/addCarBrand">
					<button type="submit" class="btn btn-primary">
                        Add Brand
					</button>
					</a>
				</span>
			  
			  @endif	
				<span id="import-brands-1" class="pull-left" style="float:right; margin-right:10px;">
				<a id="import-request-button" href="#">
				<button type="button" class="btn btn-primary">
					Import Brands
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
					  <th>Name</th>
                      <th>Name Somali</th>
					  <th>Icon</th>
					  <th>Actions</th>
					  <th width="15%" style="padding-right:1px">
					  <input type="checkbox" name="checkall" class="check-all"/>
					  &nbsp;&nbsp;&nbsp;&nbsp;
					  <a id="delete-all" href="#" class="btn btn-primary">
						<span class="icon text-white-50">
						  <i class="fas"></i>
						</span>
						<span class="text">Delete</span>
					  </a>
					 </th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Name</th>
                      <th>Name Somali</th>
					  <th>Icon</th>
					  <th>Actions</th>
					  <th width="15%">&nbsp;</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{ $input['name'] }} </td>
						<td>{{$input['name_somali']}}</td>
						<td>
						@if($input['icon'])
						<img src="upload-brand/{{$input['icon']}}" style="width:75px;">
						@endif
						</td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editCarBrand/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteCarBrand/{{$input['id']}}" class="delete_item">
								<i class="fa fa-trash"></i>
							</a>
							@endif
						</td>
						<td>
							<input type="checkbox" name="checkall" class="check-one" value="{{$input['id']}}"/>
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
  
   <script type="text/javascript">
					$(document).ready(function () {
						$("#import-request-button").click(function(e){
						$("#import-brands-1").hide('slow');
						$("#import-brands-2").show('slow');
					});
				});	
    </script>
	<script>
    $(document).ready(function () {
		$(".check-all").on("click", function(){
			
			if($(this).prop("checked") == true){
				$(".check-one").prop("checked",'checked');
			}else{
				$(".check-one").prop("checked",false);
			}
		});
		
		$(".check-one").on('click', function(){
			
			$(".check-all").prop("checked",'checked');
			
		});
		
		$("#delete-all").on('click',function () {
			if(!confirm('Want to delete?'))
			{
				return false;
			}
			var data = { "_token": "{{ csrf_token() }}",
						 'user_ids[]' : []};
						 
			$('#dataTable tbody .check-one:checked').each(function() {
				data['user_ids[]'].push($(this).val());
			});
			
			$.post("/ajaxdeleteAllCarBrand",data);
			setInterval('refreshPage()',1000);
		});
		
	});
	
	function refreshPage() {
		location.reload(true);
	}
	</script>