@extends('layouts.app')

@section('content')

@include('layouts.top')

<div class="container">
    <div class="row justify-content-center">
					
        <div class="col-md-8">
					@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
            <div class="card">
                <div class="card-header">Change Password</div>
				<div class="card-body">
                    <form id="ChangePasswordForm" method="POST" action="/ChangePassword">
                        @csrf

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control" name="password_confirm" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="button" class="btn btn-primary" onClick="validatePassword();">
                                    Change
                                </button>
								<a href="/">
									<button type="button" class="btn btn-secondary btn-user">
												Cancel
									</button>
								</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
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
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>
<script>
    function validatePassword() {
        var validator = $("#ChangePasswordForm").validate({
            rules: {
                password: "required",
                password_confirm: {
                    equalTo: "#password"
                }
            },
            messages: {
                password: " Enter Password",
                password_confirm: " Enter Confirm Password Same as Password"
            }
        });
        if (validator.form()) {
            $("#ChangePasswordForm").submit();
        }
    }
 
</script>