<!DOCTYPE html>
<html>
<head>
	<title>Data Prediksi</title>
</head>
<script>
 function ConfirmDelete()
 {
  var result = confirm("Are you sure you want to delete this data?");
  if (result)
    return true;
  else
    return false;
 }
</script>

<body>
@extends('partials.layout')

@section('content')

			<div class="panel panel-info"> 
				 <div class="panel-heading">Prediksi</div>
				 	<div class="panel-body">
						<!-- panel body -->
						<!-- button add -->
						<a href={{url('prediksi/create')}}><button class="btn btn-primary btn-md" id="btn-todo" align="center" >Predict!</button> </a> 
						<!-- button search -->
						<div class="columns btn-group pull-right"><input type="text" name="search" class="form-control pull-right" placeholder="Type here to search..."></div><br><br>
						<!-- table -->
						<div class="table-responsive">
							<table class="table table-hover">
	                           <tbody>
	                              <tr class="active">
	                              <th><i class="icon_profile"></i> Nomor</th>
	                              	<th><i class="icon_profile"></i> Nama Pasien</th>
	                                 <th><i class="icon_profile"></i> Gender</th>
	                                 <th><i class="icon_calendar"></i> Marital Status</th>
	                                 <th><i class="icon_mail_alt"></i> Age</th>
	                                 <th><i class="icon_pin_alt"></i> Stage</th>
	                                 <th><i class="icon_mobile"></i> Class</th>
	                                 <th><i class="icon_mobile"></i> Created_at</th>
	                                 <th><i class="icon_cogs"></i> Action</th>
	                              </tr>
	                             
					            @foreach ($prediksis as $prediksi)
					            <tr>
					            	<th> {{ $prediksi->id }} </th>
					            	<th> {{ $prediksi->pasien->nama}} </th>
					            	<th> {{ $prediksi->gender }} </th>
					            	<th> {{ $prediksi->marital_status }} </th>
					            	<th> {{ $prediksi->age }} </th>
					            	<th> {{ $prediksi->stage }} </th>
					            	<th> {{ $prediksi->class}} </th>
					               	<th> {{ $prediksi->created_at }} </th>

					            	<td>
							 		 <div class="todo-list">
								 		 <div class="todo-list-item">
									 		 <div class="checkbox">
			                                  	<div class="pull-right action-buttons">
			                                  	<a href="{{{ URL::route('prediksi.edit', array($prediksi->id)) }}}"><button class="btn btn-default btn-md" id="btn-todo" align="right"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
			                                     
			                                    {!! Form::open(['route' => ['prediksi.destroy',$prediksi->id],'method' => 'DELETE','onsubmit' => 'return ConfirmDelete()' ]) !!} 

			                                   <button type="submit" class="btn btn-default btn-md" id="btn-todo" align="right" value="delete"><svg class="glyph stroked trash"><use xlink:href="#stroked-trash"></use></svg>

			                                   {!! Form::close() !!}
			                                  	</div>
			                                  </div>
		                                  </div>
	                                  </div>

	                                  </td>
					            </tr>
					            @endforeach
								
								</tbody>
							</table> <!-- end table -->
							<!-- end panel body -->
						</div>
					</div>
				</div>

@endsection

</body>
</html>