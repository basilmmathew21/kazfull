@extends('layouts.app')

@section('content')

@include('layouts.top')

      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Car Type</h1>	 
			<div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/CarType">
						<button type="submit" class="btn btn-primary">
                            View Car Type
						</button>
						</a>
				</span>
			</div>
		    <div class="row">
				<div class="col-lg-6">
                <div class="p-5">
                  <form class="user" method="POST" action="/addCarType"  enctype="multipart/form-data">
                    @csrf
                    
					<div class="form-group">
                       Name : 
					   <input name="name" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
					</div>
                    <div class="form-group">
                       Name (Somali) : <input name="name_in_somali" required type="text" class="form-control form-control-user" id="name_in_somali">
                    </div>
					
					<div class="form-group"> 
                       Car Body Type : <select id="car_body_type" required class="form-control-2 form-control-user" name="car_body_type">
					   <option value="">Select</option>
					   @foreach($cbt as $key =>  $input)
                        <option value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					
					<div class="form-group">
                       Icon : <input type="file" name="icon">
                    </div>
						   
							
					<div class="form-group">
                       Base fare : <input id="cost_min_charge" name="cost_min_charge"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Cost per KM : <input id="km_charge" name="km_charge"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Cost per min : <input id="cost_per_min" name="cost_per_min"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Minimum fare : <input id="min_fare" name="min_fare"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Rider no-show fee: <input id="rider_no_show_fee" name="rider_no_show_fee"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Customer initiated cancellation fee : <input id="customer_cancellation_charge" name="customer_cancellation_charge"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Minimum waiting charge : <input id="min_waiting_charge" name="min_waiting_charge"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Waiting charge per minute : <input id="waiting_charge" name="waiting_charge"  type="text" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Minimum waiting time (minute) : <input id="min_waiting_time" name="min_waiting_time"  type="text" class="form-control-2 form-control-user">
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
				  
                   <a href="/CarType">
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