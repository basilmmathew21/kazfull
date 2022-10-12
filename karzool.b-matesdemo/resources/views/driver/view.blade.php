@extends('layouts.app')
<link rel="stylesheet" href="/css/smoothproducts.css">

  <script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="/js/smoothproducts.min.js"></script>
	<script type="text/javascript">
	/* wait for images to load */
	$(window).load(function() {
		$('.sp-wrap').smoothproducts();
	});
	</script>
@section('content')

@include('layouts.top')

    <!-- Begin Page Content -->
    <div class="container-fluid">
	  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Driver">
						<button type="submit" class="btn btn-primary">
                            View Drivers
						</button>
						</a>
				</span>
			  </div>
	<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
					<table border="0">
					<tr>
						<td valign="top">
							<div class="page">
							<div class="row">
							<div class="sp-wrap">
								@if($viewInfo['driving_licence'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['driving_licence']}}"><img src="/upload-driver-docs/{{$viewInfo['driving_licence']}}" alt=""></a>
								@endif
								@if($viewInfo['vehicle_number'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['vehicle_number']}}"><img src="/upload-driver-docs/{{$viewInfo['vehicle_number']}}" alt=""></a>
								@endif
								@if($viewInfo['insurance'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['insurance']}}"><img src="/upload-driver-docs/{{$viewInfo['insurance']}}" alt=""></a>
								@endif
								@if($viewInfo['id_proof'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['id_proof']}}"><img src="/upload-driver-docs/{{$viewInfo['id_proof']}}" alt=""></a>
								@endif
								@if($viewInfo['address_proof'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['address_proof']}}"><img src="/upload-driver-docs/{{$viewInfo['address_proof']}}" alt=""></a>
								@endif
								@if($viewInfo['photo'] != "")
								<a href="/upload-driver-docs/{{$viewInfo['photo']}}"><img src="/upload-driver-docs/{{$viewInfo['photo']}}" alt=""></a>
								@endif
							</div>
							</div>
							</div>
							
					 </td>
					</tr>
					
					
                    
					<tr>
					
				    <td align="right">
					   <a href="/Driver">
							<button type="button" class="btn btn-secondary btn-user">
										Back
							</button>
					   </a>
                    </td>
                    </tr>
                  </table>
				
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
<script src="/js/google-map.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrwvI2U1Q4hAypof3N08K5v2RSQU1lns&callback=initMap">
  </script>
<!-- Bootstrap core JavaScript
  <script src="/vendor/jquery/jquery.min.js"></script>-->
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
  
  