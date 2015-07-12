@extends('layout.master')
@section('title', 'KPLHosting')

@section('container')
<section id="home">
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="domain-search-form">
				<form action="" method="GET">
					<div class="form-group">
						<div class="input-group input-group-lg">
							<span class="input-group-addon">www.</span>
							<input type="text" name="search" class="form-control" required placeholder="bukkedde.co.ug or amakuru.rw or news.com etc...">
							<span class="input-group-btn">
								<button class="btn btn-success" type="submit">Search</button>
							</span>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>
<section id="contacts">
	
</section>
@endsection