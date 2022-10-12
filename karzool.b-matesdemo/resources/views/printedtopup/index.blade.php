@extends('layouts.app')

@section('content')

@include('layouts.top')
		
		<?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Printed Cards');
		 ?>	
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Printed Cards</h1>
          
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
					  <th>Coupon Number</th>
					  <th>Amount</th>
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
					  <th>Coupon Number</th>
					  <th>Amount</th>
					  <th>Actions</th>
					  <th>&nbsp;</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{ $input['topup_code'] }} </td>
						<td>{{ $input['amount'] }} </td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editPrintedCoupon/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deletePrintedCoupon/{{$input['id']}}" class="delete_item">
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
    
  <script>
	$(document).ready(function () {
		$(".check-all").on("click", function(){
			if($(this).prop("checked") == true){
				$(".check-one").prop("checked",'checked');
			}else{
				$(".check-one").prop("checked",false);
			}
		});
		$(".check-one").on("click",function(){
			$(".check-all").prop("checked",'checked');
			
		});
		
		$("#delete-all").on('click',function () {
			if(!confirm('Want to delete?'))
			{
				return false;
			}
			
			var data = { "_token": "{{ csrf_token() }}",
						 'user_ids[]' : []};
						 
			$(".check-one:checked").each(function() {
				data['user_ids[]'].push($(this).val());
			});
			$.post("/ajaxdeleteAllPrinted",data);
			$('#dataTable').DataTable().draw();
			setInterval('refreshPage()',1000);
		});
	});
	
	function refreshPage() {
		
		
		location.reload(true);
	}
</script>