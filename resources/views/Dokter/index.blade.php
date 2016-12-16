<!DOCTYPE html>
<html>
<head>
	<title>Data dokter</title>
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
				 <div class="panel-heading">Data dokter</div>
				 	<div class="panel-body">
						<!-- panel body -->
						<!-- button add -->
						<a href={{url('dokter/create')}}><button class="btn btn-primary btn-md" id="btn-todo" align="center" >Add Data</button> </a> 
						<!-- button search -->
						<div class="columns btn-group pull-right"><input type="text" name="search" class="form-control pull-right" placeholder="Type here to search..."></div><br><br>
						<!-- table -->
						<div class="table-responsive">
							<table class="table table-hover">
	                           <tbody>
	                              <tr class="active">
	                              <th><i class="icon_profile"></i> User ID</th>
	                              	<th><i class="icon_profile"></i> Nama</th>
	                              	 <th><i class="icon_mobile"></i> NIP </th>
	                                 <th><i class="icon_profile"></i> Email/Username</th>
	                                 <th><i class="icon_calendar"></i> Password</th>
	                                 <th><i class="icon_mail_alt"></i> Tempat Lahir</th>
	                                 <th><i class="icon_pin_alt"></i> Tanggal Lahir</th>
	                                 <th><i class="icon_mobile"></i> Created_at</th>
	                                 <th><i class="icon_cogs"></i> Action</th>
	                              </tr>
	                             
					            @foreach ($dokters as $dokter)
					            <tr>
					            	<th> {{ $dokter->id }} </th>
					            	<th> <a href="{{{ URL::route('dokter.show', array($dokter->id)) }}}"> {{ $dokter->nama}} </a> </th>
					            	<th> {{ $dokter->nip }} </th>
					            	<th> {{ $dokter->email }} </th>
					            	<th> {{ $dokter->password }} </th>
					            	<th> {{ $dokter->tempat_lahir }} </th>
					            	<th> {{ $dokter->tanggal_lahir }} </th>
					               	<th> {{ $dokter->created_at }} </th>

					            	<td>
							 		 <div class="todo-list">
								 		 <div class="todo-list-item">
									 		 <div class="checkbox">
			                                  	<div class="pull-right action-buttons">
			                                  	<a href="{{{ URL::route('dokter.edit', array($dokter->id)) }}}"><button class="btn btn-default btn-md" id="btn-todo" align="right"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
			                                     
			                                    {!! Form::open(['route' => ['dokter.destroy',$dokter->id],'method' => 'DELETE','onsubmit' => 'return ConfirmDelete()' ]) !!} 

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
							{!! $dokters->links(); !!}
							<!-- end panel body -->
						</div>
					</div>
				</div>

@endsection

</body>
</html>