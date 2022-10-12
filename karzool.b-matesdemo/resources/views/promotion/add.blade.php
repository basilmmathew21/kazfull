@extends('layouts.app')

 <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
 
 <script>
  $(document).ready(function(){
   $("#promo_type").change(function (){
	   if($(this).val() == '1'){
			$("#fixed").html('<div class="form-group">Discount Amount : <input name="dis_count" required type="text" class="datepicker form-control form-control-user" id=""></div>');
			$("#percent").html('');
	   }else if($(this).val() == '0')
	   {
		   $("#fixed").html('');
			$("#percent").html('<div class="form-group">Percentage(%)<input name="percent" required type="text" class="form-control form-control-user" id=""></div><div class="form-group">Maximum Amount : <input name="max_amount" required type="text" class="form-control form-control-user" id=""></div>');
	   }
	 });
});
 </script>
 
@section('content')

@include('layouts.top')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<?php
$chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$promo = "";
for ($i = 0; $i < 10; $i++) {
    $promo .= $chars[mt_rand(0, strlen($chars)-1)];
}
?>
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Promotion</h1>
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Promotion">
						<button type="submit" class="btn btn-primary">
                            View Promotions
						</button>
						</a>
				</span>
			</div>
			<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <form class="user" method="POST" action="/addPromotion">
                    @csrf
                    
					<div class="form-group">
                       Promotion Code : 
					   <input name="promo_code" value="{{$promo}}" type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
					</div>
					
					
					<div class="form-group">
                       Promotion Type :<select required class="form-control-2 form-control-user" id="promo_type" name="promo_type">
					   <option value="">Select</option>
					   <option value="1">Fixed</option>
					   <option value="0">Percentage</option>
						</select>
                    </div>
					
					<div id="fixed">
						<div class="form-group">Discount Amount :
							<input name="dis_count" required type="text" class="datepicker form-control form-control-user" id="">
						</div>
					</div>
					
					<div id="percent">
						
					</div>
					
					<div class="form-group">
					   Start Date :
					   <input id="start_date" required class="form-control-2 form-control-user" type="text" name="start_date">&nbsp;&nbsp;
					   <script>
							$("#start_date").datepicker();
						</script>
					</div>
					
					<div class="form-group">
					   End Date :
					   <input id="end_date" required class="form-control-2 form-control-user" type="text" name="end_date">&nbsp;&nbsp;
					   <script>
							$("#end_date").datepicker();
						</script>
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
				  
                   <a href="/Promotion">
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