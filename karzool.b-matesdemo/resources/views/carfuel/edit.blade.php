@extends('layouts.app')

@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Fuel Type</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			<span class="pull-right">
				<a href="/FuelType">
				<button type="submit" class="btn btn-primary">
                    View Fuel Type
				</button>
				</a>
			</span>
		</div>
		<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  
                    <form class="user" method="POST" action="/editCarFuelType/{{$editInfo['id'] }}" enctype="multipart/form-data">
				    @csrf
                    
					
					
					<div class="form-group">
                       Name : 
					   <input id="exampleInputEmail" type="text" required class="form-control form-control-user @error('name') is-invalid @enderror" name="name" value="{{ $editInfo['name'] }}" autocomplete="name" autofocus placeholder="Enter Name">

                    </div>
					
					
					<div class="form-group">
                       Name (Somali) : 
					  <input id="name_somali" type="text" required class="form-control form-control-user @error('name_somali') is-invalid @enderror" name="name_somali" value="{{ $editInfo['name_somali'] }}" autocomplete="name_somali" placeholder="Name(Somali)"> 

                    </div>
					
					
					<div class="form-group">
					  <div class="col-sm-6 mb-3 mb-sm-0">
					  <div id="img-div">
					  Flag
					   @if($editInfo['icon'])
					   <img src="/upload-icon/{{$editInfo['icon']}}" style="width:75px;">
					   @endif
						
					   <a class="edit-flag" href="#">
						<i class="fa fa-edit"></i>
					   </a>
					  </div>
						
					   <input id="class-browse" type="file" name="icon" style="display:none;">
					   <input type="hidden" name="flag-old" value="{{$editInfo['icon']}}">
					  </div>
					   
                    </div>
					
				   <button type="submit" class="btn btn-primary btn-user">
                        Submit
				   </button>
				  
                   <a href="/FuelType">
					<button type="button" class="btn btn-secondary btn-user">
                        Cancel
					</button>
				   </a>
				   
					 
                  </form>
                  
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
	   $("#class-browse").show();
	   $("#img-div").hide('slow');
   });
});
  </script>