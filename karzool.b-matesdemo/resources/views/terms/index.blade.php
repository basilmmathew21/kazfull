@extends('layouts.app')

@section('content')

@include('layouts.top')

<script>
	$(document).ready(function () {
		$(".change-staus").click(function(){
			var obj = $(this);
			$.ajax({
					type:'POST',
					url:'/ajaxChangeTermsStatus',
					data:{"_token": "{{ csrf_token() }}",
							status:$(this).attr('alt'),
							id:$(this).attr('id')
						 },
						success:function(data){
							$("#city-response").html(data);
							if(obj.attr('alt') == '1')
							{
								obj.removeClass('fa-circle').addClass('fa-dot-circle');
								obj.attr('alt','0');
								obj.attr('title','Active');
								//obj.parent().parent().css("color", "green");
								
							}else if(obj.attr('alt') == '0'){
								obj.removeClass('fa-dot-circle').addClass('fa-circle');
								obj.attr('alt','1');
								obj.attr('title','Inactive');
								//obj.parent().parent().css("color", "red");
							}
						}
				});
		});
	});
	</script>
		 <?php
		   use App\Http\Controllers\Controller;
		   $userPermission = Controller::resourceInfo('Terms And Conditions');
		 ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Terms And Conditions</h1>
          
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
						<a href="/addTerms">
						<button type="submit" class="btn btn-primary">
                            Add New
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
					  <th>Title</th>
					  <th style="width:390px;">Desciption</th>
					  <th style="padding-left:90px;">Status</th>
					  <th>Actions</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>#</th>
					  <th>Title</th>
					  <th>Desciption</th>
					  <th>Status</th>
					  <th>Actions</th>
                    </tr>
                  </tfoot>
                  <tbody>
				  @foreach($allInput as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['title'] }} </td>
						<td>@if($input['description'] != "") {{substr($input['description'],0,25)}}....@endif</td>
						<td align="center">
							@if($input['status'] == '1')
							<span>
								<i class="fa fa-dot-circle change-staus" alt="0" id="{{$input['id']}}" title="Active"></i>
							</span>
							@else
							<span>
							<i class="fa fa-circle change-staus"  alt="1" id="{{$input['id']}}" title="Inactive"></i>
							</span>
							@endif
							</a>
						</td>
						<td>
							@if($userPermission['permission_edit'] == 1)
							<a href="editTerms/{{$input['id']}}">
								<i class="fa fa-edit"></i>
							</a>
							@endif
							@if($userPermission['permission_delete'] == 1)
							&nbsp;&nbsp;
							<a onClick="return confirm('Want to delete?');" href="deleteTerms/{{$input['id']}}" class="delete_item">
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