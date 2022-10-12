@extends('layouts.app')

@section('content')

@include('layouts.top')
        <!-- Begin Page Content -->
        <div class="container-fluid">
		
       <h1 class="h3 mb-2 text-gray-800">Edit User</h1>
		<div class="col-md-2 mb-8 mb-sm-2 float-right">
		    <span class="pull-right">
				<a href="/AdminUsers">
					<button type="submit" class="btn btn-primary">
                        View Users
					</button>
				</a>
			</span>
		</div>
     <div class="row">

              <div class="col-lg-6">
                <div class="p-5">
				
				<form id="loginForm" class="user" method="POST" action="/editUsers/{{$editInfo['id']}}">
                    @csrf
                    <div class="form-group">
                       Name : 
					  <input name="name" value="{{$editInfo['name']}}" required type="text" class="form-control-2 form-control-user" id="" aria-describedby="emailHelp">
				    </div>
					<div class="form-group">
                       Branch<select required class="form-control-2 form-control-user" id="branch_id" name="branch_id">
					   <option value="">Select Branch</option>
					   @foreach($branch as $key =>  $input)
                        <option @if($editInfo['branch_id'] == $input['id']) selected @endif value="{{$input['id']}}">{{$input['name']}}</option>
						@endforeach
                      </select>
                    </div>
					<div class="form-group">
                       Email : <input id="email" value="{{$editInfo['email']}}" required name="email" type="email" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Password : <input id="password" name="password"  type="password" class="form-control-2 form-control-user">
                    </div>
					<div class="form-group">
                       Role : <select required class="form-control-2 form-control-user" id="role" name="role">
					   <option value="">Select</option>
					    <option value="1" @if($editInfo['role'] == '1') selected @endif>Administrator</option>
					    <option value="2" @if($editInfo['role'] == '2') selected @endif>Editor</option>
						</select>
                    </div>
					
					<div class="form-group">
                       Active<select required="" class="form-control-2 form-control-user" id="status" name="status">
					   <option value="">Select</option>
					   <option value="1" @if($editInfo['status'] == '1') selected @endif>Active</option>
					   <option value="0" @if($editInfo['status'] == '0') selected @endif>Inactive</option>
						</select>
                    </div>
					
                   <button type="submit" class="btn btn-primary btn-user">
						Submit
					</button>
				  
                   <a href="/AdminUsers">
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
  
  <script type="text/javascript">
					$(document).ready(function () {
					$("#email").change(function(e){
						e.preventDefault();
						var email = $(this).val();
						$.ajax({
						   type:'POST',
						   url:'/ajaxEmailValidate',
						   dataType:'json',
						   data:{"_token": "{{ csrf_token() }}",
							   email:email
							   },
						   success:function(data){
							   if(data.email != null)
							   {
									$("#email").after('<label id="email-error" class="error" for="email">'+data.email+' is already choosen.</label>');
							   }
							   $("#email").on('keyup',function (){
										$("#email").next(".error").remove();
									});
							}
						});
					});
				});	
  </script>