@extends('layout.master')
@section('title', 'KPLHosting')

@section('container')
<section id="home">
	<div class="opaque-container"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="domain-search-form">
					<h1 class="search-header">Find The Perfect Domain Name</h1>
					{!! Form::open(['method' => 'get', 'route' => 'domain.search']) !!}
						<div class="form-group">
							<div class="input-group input-group-lg">
								<span class="input-group-addon">www.</span>
								{!! Form::text('domain', null,[
									'class' => 'form-control', 
									'required' => '', 
									'placeholder' => 'bukkedde.co.ug or amakuru.rw or news.com etc...'
									]) 
								!!}
								<span class="input-group-btn">
									{!! Form::submit('search', ['class' => 'btn btn-success']) !!}
								</span>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</section>
<section id="services">
	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">.RW Domain Names</div>
					<div class="panel-body">
						<h3>GET FREE .RW Domains</h3>
						<p>.RW</p>
						<p>.CO.RW</p>
						<p>.AC.RW</p>
						<p>.NET.RW</p>
						<p>.CO.RW</p>
						<p>.COOP.RW</p>
						<h4 class="price label label-success"> Free</h4>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Hosting Services</div>
					<div class="panel-body">
						<h3>Core Resources</h3>
						<p>Unlimited Disk Storage</p>
						<p>Unlimited Montly Bandwidth</p>
						<p>2 Domains Hosted</p>
						<p>Unlimited MySQL DB</p>
						<p>Unlimited FTP Accounts</p>
						<p>Unlimited Email Accounts</p>
						<h4 class="price label label-success"> 30,000RWf</h4>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">Email Services</div>
					<div class="panel-body">
						<h3>Email Services</h3>
						<p>IMAP/POP/SMTP Access: Yes</p>
						<p>Web-based Email Access: Yes</p>
						<p>Mail Filtering: Yes</p>
						<p>Spam Filtering: Spam Assassin</p>
						<p>Email Addresses (Aliases): Unlimited</p>
						<p>Vacation Auto-Responders: Unlimited</p>
						<h4 class="price label label-success"> 30,000RWf</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@endsection