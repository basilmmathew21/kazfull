@extends('layouts.app')

@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">New Country</h1>
		
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/countries">
						<button type="submit" class="btn btn-primary">
                            View Countries
						</button>
						</a>
				</span>
			</div>
   
    <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
					<form class="user" method="POST" action="{{ route('addCountry') }}" enctype="multipart/form-data">
				    @csrf
					<div class="form-group">
                       Name : 
					   <input id="exampleInputEmail" type="text" required class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Enter Name" style="align:center;width:400px;">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                    </div>
					
					<div class="form-group">
                       Name (Somali) : 
					   <input id="name_somali" type="text" required class="form-control form-control-user" name="name_somali" value="" placeholder="Name(Somali)" style="align:center;width:400px;"> 
					   @error('name_somali')
                            <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					 </div>
					
					<div class="form-group">
                       Code : 
						<input id="" type="text" required class="form-control form-control-user" name="c_code" value="" autofocus placeholder="Enter Country Code" style="align:center;width:400px;">
					</div>
					
					<div class="form-group">
					  <div class="col-sm-6 mb-3 mb-sm-0">
					    <input type="file" name="flag">
                       </div>
                    </div>
                  
                    <button type="submit" class="btn btn-primary btn-user">
                                    Save
					</button>
				  
                   <a href="/countries">
						<button type="button" class="btn btn-secondary btn-user">
                                    Cancel
						</button>
				   </a>
					
			
				                   
                  </form>
                  <!--
                  <div class="text-center">
                    <a class="small" href="forgot-password.html">Forgot Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="register.html">Create an Account!</a>
                  </div>
				  -->
               
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