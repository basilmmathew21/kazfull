@extends('layouts.app')
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
 
@section('content')

@include('layouts.top')

  
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Notification</h1>
		  
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Notification">
						<button type="submit" class="btn btn-primary">
                            Notifications
						</button>
						</a>
				</span>
			</div>
			<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <form class="user" method="POST" action="/addNotification"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                       Title : 
					   <input name="title" required type="text" class="form-control-2 form-control-user">
					</div>
                    <div class="form-group">
                       Sub Title : <input required name="sub_title"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Promo Code : <input required name="promo_code"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Desciption : <textarea name="description"  type="text" class="form-control-2 form-control-user"></textarea>
                    </div>
					<div class="form-group">
					  Issue Date :
					   <input required class="form-control-2 form-control-user datepicker" type="text" name="from_date">
					</div>
					<div class="form-group">
					  To Date :
					   <input required class="form-control-2 form-control-user datepicker" type="text" name="to_date">
					</div>
					
					<div class="form-group">
                       Image : <input required type="file" name="icon">
                    </div>
					
					<script type="text/javascript">
						$( function() {
							$(".datepicker").datepicker();
						} );
					</script>
					<div>
						<input name="image" type="hidden" value="" id="icon-value">
					</div>
					
                   <button type="submit" class="btn btn-primary btn-user">
                                    Submit
					</button>
				  
                   <a href="/Notification">
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

 <!--Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

   <!--Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
 

   
  

  