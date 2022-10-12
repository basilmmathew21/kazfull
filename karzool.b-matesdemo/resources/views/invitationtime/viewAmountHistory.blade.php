@extends('layouts.app')

@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid" style="height:700px;">

       
		<h1 class="h3 mb-2 text-gray-800">View Settings</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			<span class="pull-right">
				<a href="/GeneralSetting">
				<button type="submit" class="btn btn-primary">
                    View Settings
				</button>
				</a>
			</span>
		</div>
		<div class="card shadow mb-4">
		
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
			
	 
		<div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <tr>
                      <th>#</th>
					  <th>Amount</th>
                      <th>Date</th>
					</tr>
				  <tbody>
				  
				 	@foreach($amounts as $key =>  $input)
					<tr>
					    <td>{{$loop->iteration}}</td>
						<td>{{$input['amount']}}</td>
						<td>{{ date("m-d-Y H:i",strtotime($input['created_at']))}} </td>
					</tr>
                   @endforeach
				   
				   </tr>
				    <td align="right" colspan="3">
					   <a href="/GeneralSetting">
							<button type="button" class="btn btn-secondary btn-user">
										Back
							</button>
					   </a>
                    </td>
                    </tr>
					
                  </tbody>
                </table>
              </div>
            </div>
        

 

     
        <!-- /.container-fluid -->
        
		</div>
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
  
