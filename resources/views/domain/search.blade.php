@extends('layout.master')
@section('container')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<pre>
					{{ var_dump($search) }}
				</pre>
				{!! Form::open(['method' => 'get', 'route' => 'domain.search', 'class'=> 'searchform']) !!}
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
@endsection