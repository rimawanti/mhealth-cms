@if(Session::has('success'))
	
	<div class="alert bg-success" role="alert">	
		<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark"></use></svg> <strong>Success :</strong> {{ Session::get('success') }}<span class="glyphicon glyphicon-remove pull-right" data-dismiss="alert" aria-hidden="true"></span></a>
	</div>

@endif


@if(count($errors) > 0)

	@foreach ($errors->all() as $error)
		<div class="alert bg-danger" role="alert">	
			<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> <strong>Error !</strong> {{ $error }} <span class="glyphicon glyphicon-remove pull-right" data-dismiss="alert" aria-hidden="true"></span></a>
		</div>
	@endforeach
	</ul>

@endif