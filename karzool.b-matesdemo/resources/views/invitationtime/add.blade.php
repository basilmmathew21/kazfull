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
					amount: {
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
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Timings</h1>
			<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <form id="generateForm" class="user" method="POST" action="/addInvitationTime">
                    @csrf
                    
					<div class="form-group">
                       Amount : 
					   <input id="amount" name="amount" required value="" type="text" class="form-control-2 form-control-user" id="amount">
					</div>

					
					<div class="form-group">
                       Active<select required class="form-control-2 form-control-user" id="status" name="status">
					   <option value="">Select</option>
					   <option value="1">Active</option>
					   <option value="0">Inactive</option>
						</select>
                    </div>
				
					
                   <button type="button" class="btn btn-primary btn-user" onClick="validateInfo();">
                                    Submit
					</button>
				  
                   <a href="/InvitationTiming">
						<button type="button" class="btn btn-secondary btn-user">
                                    Cancel
						</button>
				   </a>
                    
                    
                  </form>
                </div>
              </div>
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins 
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>-->

  <!-- Page level custom scripts
  <script src="js/demo/datatables-demo.js"></script>-->

  