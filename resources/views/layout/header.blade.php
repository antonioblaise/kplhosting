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
<body>
	<header id="header">		
		<div class="container">
			<div id="logo" class="col-md-9 pull-left">
				<a href="{{ url('/') }}">
					<img src="{{ url('img/logo.png' )}}" alt="">
				</a>
			</div>
			<div id="user" class="pull-right">
				<a href="{{ url('admin') }}#" class="btn btn-success">Administrator</a>
			</div>
		</div>
		<nav id="navigation">
			<div class="container">
				<ul class="nav navbar-nav">
					<li><a href="#">About</a></li>
					<li><a href="#">Web Hosting</a></li>
					<li><a href="#">Domains</a></li>
					<li><a href="#">Web Design</a></li>
					<li><a href="#">VPN</a></li>
					<li><a href="#">Anycast</a></li>
					<li><a href="#">More</a></li>
					<li><a href="#">Contacts</a></li>
				</ul>
			</div>
		</nav>
	</header>