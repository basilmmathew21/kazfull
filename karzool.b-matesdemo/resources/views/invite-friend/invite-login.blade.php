<!DOCTYPE html>
<html lang="en"  >
<head>
  <meta charset="utf-8">
  <title>Sign up - Karzool</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  <!-- stylesheets -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="/css/sb-admin-2.css" rel="stylesheet">
  <link href="css/styles1.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
  <script src="/resources/js/lib/html5.js"></script>
  <![endif]-->
  <!-- favicon -->
  <link rel="shortcut icon" href="img/logo-karzool.png">
</head>
<style type="text/css">
  @font-face {
  font-family: 'english';
  src: url(fonts/MONTSERRAT-LIGHT.OTF);
  }
  .slectCurved {
  font-family: "english";
  padding: 0px 14px 0px 14px;
  display: block;
  width: 100%;
  height: 50px!important;
  font-size: 16px;
  color: #2E2D2E !important;
  border: 1px solid #E3E8EC;
  border-radius: 10rem!important;
  outline: none;
  font-weight: normal; }
</style>

	<body>
	  <div id="wrap">
	  <div id="fb-root"></div>
	  <link rel="stylesheet" href="css/intlTelInput.css">
      <div>
	  
	  
			
          <form class="user" name="signupForm" id="sign-up-form" method="POST" action="/inviteFriend">
              <div id="app" class="scripted">
              <div class="col-xs-12">
                <div class="form col-lg-6 col-lg-offset-3 col-sm-8 col-sm-offset-2 col-md-8 col-md-offset-2 col-xs-12">
				<div class="clearFloats"></div>            
				  <h1>Sign up with Karzool</h1>
                  <h3></h3>
					@if(session()->has('message'))
						<div class="alert alert-success">
							{{ session()->get('message') }}
						</div>
					@endif
                  <input type="hidden" name="lang" id="lang" value="en">
                  @csrf
                  <div class="material-form-field">
                    <input name="name" required type="text" class="form-control" id="exampleFirstName" placeholder="First Name">
                  </div>

                    <div class="material-form-field">
                        <input name="email" required type="email" class="form-control" id="exampleEmail" placeholder="Email Address">
                    </div>

                   <!--  <div class="material-form-field">
                      <input type="tel" autocomplete="off" spellcheck="false" id="mobileNumber" name="mobileNumber"
                             class="form-control" required>
                    </div> -->

					
					<div class="material-form-field">
                       <select name="country" required class="form-control selectCurved" name="country_id" style="height: 50px;border-radius: 10rem;font-size: 16px;">
							<option value="">Select Country</option>
							<option value="1">US</option>
						</select>
                    </div>
					<div class="material-form-field">
                      <input name="password" required type="password" class="form-control" id="password" placeholder="Password">
                    </div> 
					<div id="" class="material-form-field">
                      <input name="invitation_code" type="text" class="form-control" id="exampleInvitationcode" placeholder="Invitation Code" value="{{$referer}}">
                    </div>
                   <input class="btn-careem" id="sign-up-btn" type="submit" value="Sign up" name="sign-up-submit">
                </div>
              </div>

            </div>
          </form>
          
        </div>

        </div>

  </body>

  </html>

