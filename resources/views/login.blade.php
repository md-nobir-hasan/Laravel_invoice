<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	{{-- <link rel="stylesheet" type="text/css" href="css/style.css"> --}}
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="shortcut icon" href="{{asset('storage/images/logopng.png')}}" type="image/x-icon">
	<title>Invoice Login</title>
	<style>
		body{
			background: linear-gradient(120deg,rgb(67, 153, 252), rgb(62, 236, 120));
			margin: 0 auto;
			padding: 0;
			justify-content: center;
			align-items: center;
			height: 100vh;
			overflow: hidden;
			box-sizing: border-box;
		}
		.col-sm-12{
			width: 100%;
		}
		.center{
			position: absolute;
			top: 50%;
			left: 50%;
			transform: translate(-50%, -50%);

		}
		.card{
			background: #fff;
			padding: 20px 30px;
			border-radius: 2%;
			width: 300px;
			height: 400px;
		}
		h2{
			font-size: 40px;
			text-transform: capitalize;
			text-align: center;
		}
		input{
			box-sizing: border-box;
			margin-bottom: 20px;
			width: 100%;

		}
		input:focus{
			outline: none;
		}
		.form-control {
		    padding: 10px 5px;
		    border-right: none;
		    border-left: none;
		    border-top: none;
		    background: no-repeat;
		}
		.button{
			margin-top: 30px;
			padding: 10px 20px;
			background: linear-gradient(120deg,rgb(67, 153, 252), rgb(62, 236, 120));
			border: none;
			border-radius: 2%;
			color: #fff;
            width: 100%;
		}
		a{
			text-decoration: none;
		}
		@media only screen and (max-width: 414px){
			.card{
				width: 240px;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="center">
	        <div class="col-sm-12">
	            <div class="card">
	                <div class="card-body">
	                    <h2 class="card-titl">Login</h2>
                        {{-- <x-auth-session-status class="mb-4" :status="session('status')" /> --}}

                        {{-- <x-auth-validation-errors class="mb-4" :errors="$errors" /> --}}
                        {{-- <div class="alert alert-danger">
                            <p>
                                @isset($errors)
                                {{"Email and Password don't match"}}
                                @endisset
                                @dd($errors);


                            </p>
                        </div> --}}
	                    <form method="POST" action="{{route('login')}}">
                            @csrf
	                        <div class="form-group">
	                            <div class="col-sm-12">
	                                <input type="email" name="email" placeholder="User email" class="form-control" :value="old('email')">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-sm-12">
	                                <input name="password" type="password" placeholder="Password" class="form-control">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                        	<div class="col-sm-12">
                                    <button class="button">
                                        Login
                                    </button>
	                                {{-- <input class="button" type="button" value="Login" onclick="msg()"> --}}
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-sm-12">
	                                {{-- <p class="text" style="text-align: center;">Don't have account?
                                        <a href="{{route('register')}}" style="margin-left: 10px;">Sign up</a>
                                    </p> --}}
	                            </div>
	                        </div>
	                    </form>
	                </div>
	            </div>
	        </div>
        </div>
	</div>
</body>
</html>
