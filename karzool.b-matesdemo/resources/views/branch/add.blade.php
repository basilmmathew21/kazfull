@extends('layouts.app')
  <script src="js/jquery.croppie.js"></script>
  <script src="js/croppie.js"></script>
  <link rel="stylesheet" href="css/select2.min.css">
  <link rel="stylesheet" href="css/croppie.css">
@section('content')

@include('layouts.top')

  
      <!-- Begin Page Content -->
      <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">New Branch</h1>
		  
		  <div class="col-md-2 mb-8 mb-sm-2 float-right">
			    <span class="pull-right">
						<a href="/Branch">
						<button type="submit" class="btn btn-primary">
                            View Branches
						</button>
						</a>
				</span>
			</div>
			<div class="row">

              <div class="col-lg-6">
                <div class="p-5">
                  <form class="user" method="POST" action="/addBranch"  enctype="multipart/form-data">
                    @csrf
                    
					<div class="form-group">
                       Name : 
					   <input name="name" required type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp">
					</div>
                    <div class="form-group">
                       Name (Somali) : <input required name="name_somali"  type="text" class="form-control form-control-user" id="exampleInputPassword">
                    </div>
					
					<div class="form-group">
                       Email : <input required name="email"  type="email" class="form-control form-control-user">
                    </div>
					
					<div class="form-group">
                       Phone : <input name="phone"  type="text" class="form-control form-control-user">
                    </div>
					
					<div class="form-group">
					Address : <textarea name="address" class="form-control form-control-user" id="exampleInputTextarea"></textarea>
                    </div>
					
					<!--
					<div class="form-group">
                        Car brands
                            <div class="col-sm-8">-->
                                <!--<div class="btn-group pull-left mt-sm" style="width: 100%;">  
                                    <div style="width: 100%; float: left;">                                                  
                                        <select id="brands" name="brands[]" data-validation="required" multiple="" style="width:100% !important" placeholder="Brands" class="form-control-2 form-control-user" data-select2-id="brands" tabindex="-1" aria-hidden="true">
                                        <option value="3" data-select2-id="17">Acura</option>
										<option value="10" data-select2-id="18">Aston Martin</option>
										<option value="9" data-select2-id="19">Bentley</option>
										<option value="8" data-select2-id="20">BMW</option>
										<option value="7" data-select2-id="21">Bugatti</option>
										<option value="6" data-select2-id="22">Chevrolet</option>
										<option value="5" data-select2-id="23">Ferrari</option>
										<option value="4" data-select2-id="24">Ford</option>
										<option value="2" data-select2-id="25">Jeep</option>
										<option value="1" data-select2-id="26">Mercedes-Benz</option>                                                                    
                                        </select> --> 
										<!--
										<span class="select2 select2-container select2-container--default select2-container--below select2-container--focus" dir="ltr" data-select2-id="2" style="width: 100%;">
										<span class="selection">
										<span class="select2-selection select2-selection--multiple" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="-1">
										<ul class="select2-selection__rendered">
										<li class="select2-selection__choice" title="Aston Martin" data-select2-id="27">
										<span class="select2-selection__choice__remove" role="presentation">×</span>
										Aston Martin</li>
										<li class="select2-search select2-search--inline">
										<input class="select2-search__field" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="" style="width: 0.75em;"></li>
										</ul></span>
										</span>
										<span class="dropdown-wrapper" aria-hidden="true"></span>
										</span>
										-->
                                     <!--</div>   
                                </div> -->
                            <!--</div>
                     </div>-->
					
					
					
					<div class="form-group">
                       Country<select required class="form-control-2 form-control-user" id="country_id" name="country_id">
					   <option value="">Select Country</option>
					   @foreach($country as $key =>  $input)
                        <option value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					
					
					<div id="city-response"  class="form-group">
                       City<select required class="form-control-2 form-control-user" name="city_id">
					   <option value="">Select City</option>
					   
                      </select>
                    </div>
					
					
					 <div class="form-group">
                                                    
                                                   
                                                        <div id="map" style="width: 600px;height:400px">
                                                        
                                                        </div>
                                                        <p class="help-block" id="map-latlng">
                                                            lat: 
															 &nbsp;
															<input name="lattitude" id="latitude" value="24.774265" readonly="readonly"  type="text" class="form-control form-control-user" aria-describedby="emailHelp">
                                                            lng: 
															<input name="longitude" id="longitude" value="46.738586" readonly="readonly"  type="text" class="form-control form-control-user" aria-describedby="emailHelp">
															
                                                        </p>
                                              
                                                </div>
					<!-- new key
					AIzaSyC32mjXxnAcMh2uDpnbSuzfDKGTW8xeXMI -->
					<!-- key in app
					AIzaSyDLrwvI2U1Q4hAypof3N08K5v2RSQU1lns -->
				
					
                   <button type="submit" class="btn btn-primary btn-user">
                                    Submit
					</button>
				  
                   <a href="/Branch">
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
  
	
  <script src="js/select2.min.js"></script>
  
  <script type="text/javascript">
  
  $.ajaxSetup({

        headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
                $(document).ready(function () {
                    //$("select#services").select2({ placeholder: "Select services", width: "100%" });
                    //$("select#brands").select2({ placeholder: "Select brands", width: "100%"});
					
					$("#country_id").change(function(e){
						e.preventDefault();
						
						var id = $(this).val();
						
						$.ajax({
						   type:'POST',
						   url:'/ajaxCountryCity',
						   data:{"_token": "{{ csrf_token() }}",
							   id:id
							   },
						   success:function(data){
								$("#city-response").html(data);
							}
						});
					});
					
				});
            </script>
			
  <script src="js/google-map.js"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDLrwvI2U1Q4hAypof3N08K5v2RSQU1lns&callback=initMap">
  </script>
  
 <!--Bootstrap core JavaScript
  <script src="vendor/jquery/jquery.min.js"></script>-->
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

 
  