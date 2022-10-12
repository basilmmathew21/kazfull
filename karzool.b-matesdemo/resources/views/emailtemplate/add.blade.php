@extends('layouts.app')

@section('content')

@include('layouts.top')
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
	<script src="ckeditor/ckeditor.js"></script>
	<script src="ckeditor/samples/js/sample.js"></script>
	<link rel="stylesheet" href="ckeditor/samples/css/samples.css">

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">New Email Template</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/EmailTemplate">
						<button type="submit" class="btn btn-primary">
                            View Template
						</button>
						</a>
				</span>
			</div>
		<div class="row">
		<form id="email-template" class="user" method="POST" action="/addEmailTemplate">
			<div class="col-lg-12">
			<div class="p-5">
				@csrf
				<div class="form-group">
                 Email Type : <select required class="form-control-2 form-control-user" name="email_type">
							<option value="">Select Type</option>
							<option value="1">Welcome</option>
							<option value="2">Reset password</option>
							<option value="3">Trip invoice</option>
							<option value="4">Invoice payment confirmation</option>
							<option value="5">Invoice due reminder before due date</option>
							<option value="6">Invoice overdue reminder</option>
							<option value="7">Thank You</option>
                       </select>
                </div>
				
				<div class="form-group">
				   Name : 
				   <input id="name" type="text" required class="form-control-2 form-control-user" name="name" value=""> 
				</div>
				<div class="form-group">
				 Subject : 
				   <input id="subject" type="text" required class="form-control-2 form-control-user" name="subject" value=""> 
				</div>
					
				<div class="form-group">
                       Body : 
					   
					   <input id="template_body" type="hidden" name="template_body" value=""> 
					   
					   <div class="adjoined-bottom">
							<div class="grid-container">
								<div class="grid-width-100">
									<div id="editor">
									</div>
								</div>
							</div>
						</div>
					</div>
					
				    <button id="btn_submit" type="button" class="btn btn-primary btn-user">
                                    Save
					</button>
				  
                   <a href="/EmailTemplate">
						<button type="button" class="btn btn-secondary btn-user">
                                    Cancel
						</button>
				   </a>
				</div>
				</div>
			</form>
          </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
	  @include('layouts.footer')
	</div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  
  <script type="text/javascript">
					$(document).ready(function () {
					$("#btn_submit").click(function(e){
						$("#template_body").val(CKEDITOR.instances.editor.getData());
						$("#email-template").validate();
						if ($('#email-template').valid()) // check if form is valid
						{
							$("#email-template").submit();
						}
					});
				});	
    </script>

  <script>
	initSample();
</script>


  
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