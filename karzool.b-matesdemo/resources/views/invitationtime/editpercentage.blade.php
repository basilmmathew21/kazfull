@extends('layouts.app')
@section('content')
@include('layouts.top')

   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
   <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
   <script>
		function validateInfo() {
			var validator = $("#generateForm").validate({
				rules: {
					percentage: {
						required: true,
						number: true
						}
				}
			});
			if (validator.form()) {
				$("#generateForm").submit();
			}
		}
	</script>
      <!-- Begin Page Content -->
        <div class="container-fluid" style="height:700px;">

    
		<h1 class="h3 mb-2 text-gray-800">New Settings</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			<span class="pull-right">
				<a href="/GeneralSetting">
				<button type="submit" class="btn btn-primary">
                    View Settings
				</button>
				</a>
			</span>
		</div>
		<div class="row">
			<div class="col-lg-6">
                <div class="p-5">
                    <form id="generateForm" class="user" method="POST" action="/editGeneralSettingPercentage/{{$editInfo['id'] }}">
				    @csrf
                    <div class="form-group">
					Percentage : 
					   
					   <input name="id" value="{{$editInfo['id']}}" type="hidden" id="">
					   <input name="percentage" required value="{{$editInfo['percentage']}}" type="text" class="form-control-2 form-control-user" id="percentage">
                    </div>
				   <button type="button" class="btn btn-primary btn-user" onClick="validateInfo();">
                        Submit
				   </button>
				   <a href="/GeneralSetting">
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