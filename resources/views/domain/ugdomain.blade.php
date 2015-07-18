@foreach($response['data'] as $key => $value)
	<div class="panel panel-default">
		<div class="panel-heading">
			<b>{{ ucfirst($key) }}</b>
		</div> 
		<div class="panel-body">
			@if(is_array($value))
				@foreach($value as $k => $val)
					<p><b>{{ ucfirst($k) }}</b> : {{ $val }}</p>
				@endforeach
			@else
			<p>{{$value }}</p>
			@endif
		</div>
	</div>
@endforeach