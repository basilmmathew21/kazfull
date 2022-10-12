@extends('layouts.app')

@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Commision</h1>
   
     <div class="card shadow mb-4">
		
			@if(session()->has('message'))
				<div class="alert alert-success">
					{{ session()->get('message') }}
				</div>
			@endif
	 
		<div class="card-body">
            
              <div class="col-lg-6">
                <div class="p-5">
                  
                    <form class="user" method="POST" action="/editCommision" enctype="multipart/form-data">
				    @csrf
					
					<div class="form-group span-list">
                       Amount : {{$commision['amount']}} <br/>
					   Percentage : {{$commision['percentage']}}
					   
					   <a class="edit-flag" href="#">
						<i class="fa fa-edit"></i>
					   </a>
					   
                    </div>
					
					<div class="form-group span-edit" style="display:none">
                       Amount : 
					    <input type="text" required class="form-control form-control-user" name="amount" value="{{ $commision['amount'] }}" autofocus placeholder="Enter Amount">
						<input type="hidden" name="id" value="{{ $commision['id'] }}">	
                    </div>
					<div class="form-group span-edit" style="display:none">
                       Percentage : 
					    <input type="text" required class="form-control form-control-user" name="percentage" value="{{ $commision['percentage'] }}" autofocus placeholder="Enter Percentage">
					</div>
				
					<span class="span-edit" style="display:none;">
						<button type="submit" class="btn btn-primary btn-user">
										Submit
						</button>
					  
					   <a href="/Commision">
							<button type="button" class="btn btn-secondary btn-user">
										Cancel
							</button>
					   </a>
					</span>                   
                    
                  </form>
                  
                </div>
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
  
  <script>
  
  $(document).ready(function(){
   $(".edit-flag").click(function (){
	   $(".span-edit").show('slow');
	   $(".span-list").hide('slow');
   });
});
  </script>