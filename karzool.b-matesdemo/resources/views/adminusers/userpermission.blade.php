@extends('layouts.app')

@section('content')

@include('layouts.top')
      <!-- Begin Page Content -->
	  
	  
      <div class="container-fluid">
		
          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">User Permission</h1>
		  
		  <div class="card shadow mb-4">
		  <div class="card-header py-3">
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
			</div>
			
			                       <form id="form-editor-permission" class="form-horizontal row-border" method="post" action="/addUserPermission/{{$id}}">
										 @csrf
											<div class="card-body">
											<!--<div class="table-responsive">-->
                                            <table class="table table-bordered" width="60%" cellspacing="0">
                                                <thead>
                                                    <tr>
                                                        <th>Section / Actions</th>
                                                                                                                
                                                        <th style="text-align:center">View</th>
                                                                                                                
                                                        <th style="text-align:center">Add</th>
                                                                                                                
                                                        <th style="text-align:center">Edit</th>
                                                                                                                
                                                        <th style="text-align:center">Delete</th>
                                                                                                                
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                   @foreach($resources as $key =>  $input) 
                                                    <tr>
                                                        <td>{{$input['resource_name']}}</td>
                                                                                                                
                                                        <td style="text-align:center">
                                                            @if($input['action_view'] == 1)                                                                                                                        
                                                            <input type="checkbox" name="permission[{{$input['resource_name']}}][action_view]" value="1" @if($input['permission_view'] == 1)   checked="checked" @endif class="action-view">
                                                            @endif
															&nbsp;
                                                        </td>
                                                                                                                
                                                        <td style="text-align:center">
                                                            @if($input['action_add'] == 1)                                                                                                                        
                                                            <input type="checkbox" name="permission[{{$input['resource_name']}}][action_add]" value="1" @if($input['permission_add'] == 1)   checked="checked" @endif class="action-non-view">
                                                            @endif                                                            
                                                            &nbsp;
                                                        </td>
                                                                                                                
                                                        <td style="text-align:center">
                                                            @if($input['action_edit'] == 1)                                                                                                                        
                                                            <input type="checkbox" name="permission[{{$input['resource_name']}}][action_edit]" value="1" @if($input['permission_edit'] == 1)   checked="checked" @endif class="action-non-view">
                                                            @endif                                                            
                                                            &nbsp;
                                                        </td>
                                                                                                                
                                                        <td style="text-align:center">
                                                            @if($input['action_delete'] == 1)                                                                                                                        
                                                            <input type="checkbox" name="permission[{{$input['resource_name']}}][action_delete]" value="1" @if($input['permission_delete'] == 1)   checked="checked" @endif class="action-non-view">
                                                            @endif                                                            
                                                            &nbsp;
                                                        </td>
                                                        
                                                    </tr>
													@endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Section / Actions</th>
                                                                                                                
                                                        <th style="text-align:center">View</th>
                                                                                                                
                                                        <th style="text-align:center">Add</th>
                                                                                                                
                                                        <th style="text-align:center">Edit</th>
                                                                                                                
                                                        <th style="text-align:center">Delete</th>
                                                                                                                
                                                    </tr>
                                                </tfoot>
                                            </table>
                                            <!--</div>-->
											
											
											<div class="panel-footer">
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
													<button type="submit" class="btn btn-primary btn-user">
																Save
													</button>
													<a href="/AdminUsers">
														<button type="button" class="btn btn-secondary btn-user">
																	Cancel
														</button>
													</a>
												</div>
                                            </div>
                                        </div>
											
											
                                        </div>
                                        
                                        </form>
                                 
                         
          
        </div>  
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