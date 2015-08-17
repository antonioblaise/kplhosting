@extends('layout.master')
@section('container')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h3>Searching: </h3>
				{!! Form::open(['method' => 'get', 'route' => 'domain.search', 'class'=> 'searchform']) !!}
					<div class="form-group">
						<div class="input-group input-group-lg">
							<span class="input-group-addon">www.</span>
							{!! Form::text('domain', $response['domain'],[
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
				<!-- Failure Domain Session -->
				@if(Session::has('errordomain'))
				<h3 class="alert alert-danger">
					{{ Session::get('errordomain') }}
				</h3>
				@endif
				<!-- Success Domain Session -->
				@if(Session::has('successdomain'))
				<h3 class="alert alert-success">
					{{ Session::get('successdomain') }}
				</h3>
				<a href="#" class="btn btn-lg btn-info">Register This Domain</a>
				@endif
			</div>
		</div>
	</div>
@endsection