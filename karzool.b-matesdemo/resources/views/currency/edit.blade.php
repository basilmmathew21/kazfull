@extends('layouts.app')

@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Currency</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Currency">
						<button type="submit" class="btn btn-primary">
                            View Currency
						</button>
						</a>
				</span>
		</div>
		<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  
                    <form class="user" method="POST" action="/editCurrency/{{$editInfo['id'] }}">
				    @csrf
					<div class="form-group">
                       Country<select required class="form-control-2 form-control-user" name="country_id">
					   <option value="">Select Country</option>
					   @foreach($country as $key =>  $input)
                        <option value="{{$input['id']}}" @if($editInfo['country_id'] == $input['id']) selected="selected" @endif>{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					
					<div class="form-group">
                       Currency : 
					   <input id="currency" type="text" required class="form-control" name="currency" value="{{ $editInfo['currency'] }}" placeholder="Currency"> 
					</div>
					
					<button type="submit" class="btn btn-primary btn-user">
                                    Submit
					</button>
				  
                    <a href="/Currency">
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
	   $("#class-browse").prop('required',true);
	   $("#img-div").hide('slow');
   });
});
  </script>