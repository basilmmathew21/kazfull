@extends('layouts.app')
@section('content')
@include('layouts.top')
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Terms And Condition</h1>
			<div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/TermsConditions">
						<button type="submit" class="btn btn-primary">
                            View Terms
						</button>
						</a>
				</span>
			</div>
			<div class="row">
			<div class="col-lg-6">
                <div class="p-5">
                  <form class="user" method="POST" action="/addTerms">
                    @csrf
                    
					<div class="form-group">
                       Title : 
					   <input name="title" value="" type="text" class="form-control-2 form-control-user">
					</div>
					
					<div class="form-group">
                       Desciption : <textarea rows="100" cols="50" required name="description"  type="text" class="form-control-2 form-control-user"></textarea>
                    </div>
					
					<div class="form-group">
                       Active<select required class="form-control-2 form-control-user" id="status" name="status">
					   <option value="">Select</option>
					   <option value="1">Active</option>
					   <option value="0">Inactive</option>
						</select>
                    </div>
				
					
                   <button type="submit" class="btn btn-primary btn-user">
                                    Submit
					</button>
				  
                   <a href="/TermsConditions">
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