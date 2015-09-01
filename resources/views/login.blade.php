<!DOCTYPE html>
<html class="no-js">    
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>@yield('title')</title>
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="{{ url('css/vendor/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/vendor/bootstrap-theme.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
</head>
<body class="login-page">
	<header></header>
	<main id="contents">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4">
					<form class="form-signin">
						<h2 class="form-signin-heading">Please sign in</h2>
						<div class="form-group">
							<label for="inputUsername">Email address</label>
							<input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
						</div>
						<div class="form-group">
							<label for="inputPassword">Password</label>
							<input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
						</div>	
						<div class="checkbox">
							<label>
								<input type="checkbox" value="remember-me"> Remember me
							</label>
						</div>
						<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
	</main>