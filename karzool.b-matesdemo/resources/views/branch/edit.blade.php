@extends('layouts.app')
  <script src="/js/jquery.croppie.js"></script>
  <script src="/js/croppie.js"></script>

  <link rel="stylesheet" href="/css/croppie.css">
@section('content')

@include('layouts.top')

        <!-- Begin Page Content -->
        <div class="container-fluid">

       
		<h1 class="h3 mb-2 text-gray-800">Edit Branch</h1>
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
                  
				    <form class="user" method="POST" action="/editBranch/{{$editInfo['id'] }}"  enctype="multipart/form-data">
                    @csrf
                    
					<div class="form-group">
                       Name : 
					   <input name="name" required type="text" class="form-control form-control-user" value="{{ $editInfo['name'] }}" id="exampleInputEmail" aria-describedby="emailHelp">
					</div>
                    <div class="form-group">
                       Name (Somali) : <input required name="name_somali"  type="text" class="form-control form-control-user" value="{{ $editInfo['name_somali'] }}" id="exampleInputPassword">
                    </div>
					
					<div class="form-group">
                       Email : <input required name="email"  type="email" class="form-control form-control-user" value="{{ $editInfo['email'] }}">
                    </div>
					
					<div class="form-group">
                       Phone : <input name="phone"  type="text" class="form-control form-control-user" value="{{ $editInfo['phone'] }}">
                    </div>
					
					<div class="form-group">
					Address : <textarea name="address" class="form-control form-control-user" id="exampleInputTextarea">{{ $editInfo['address'] }}</textarea>
                    </div>
					
					<div class="form-group">
                       Country<select id="country_id" required class="form-control-2 form-control-user" name="country_id">
					   <option value="">Select Country</option>
					   @foreach($country as $key =>  $input)
                        <option @if($editInfo['country_id'] == $input['id']) selected="selected" @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					
					
					<div id="city-response" class="form-group">
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
															<input name="lattitude" id="latitude" value="{{$editInfo['lattitude']}}" readonly="readonly"  type="text" class="form-control form-control-user" aria-describedby="emailHelp">
                                                            lng: 
															<input name="longitude" id="longitude" value="{{$editInfo['longitude']}}" readonly="readonly"  type="text" class="form-control form-control-user" aria-describedby="emailHelp">
															
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
  
  <script>
  
  $(document).ready(function(){
   $(".edit-flag").click(function (){
	   $("#class-browse").show();
	   $("#img-div").hide('slow');
   });
});
  </script>