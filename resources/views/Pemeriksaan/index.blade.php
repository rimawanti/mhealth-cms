<!DOCTYPE html>
<html>
<head>
	<title>Data pemeriksaan</title>
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
				 <div class="panel-heading">Data pemeriksaan</div>
				 	<div class="panel-body">
						<!-- panel body -->
						<!-- button add -->
						<a href={{url('pemeriksaan/create')}}><button class="btn btn-primary btn-md" id="btn-todo" align="center" >Add Data</button> </a> 
						<!-- button search -->
						<div class="columns btn-group pull-right"><input type="text" name="search" class="form-control pull-right" placeholder="Type here to search..."></div><br><br>
						<!-- table -->
						<div class="table-responsive">
							<table class="table table-hover">
	                           <tbody>
	                              <tr class="active">
	                              <th><i class="icon_profile"></i> ID Pemeriksaan</th>
	                              	<th><i class="icon_profile"></i> Tanggal</th>
	                              	 <th><i class="icon_profile"></i> Kategori</th>
	                              	 <th><i class="icon_mobile"></i> Nama Pasien </th>
	                                 <th><i class="icon_profile"></i> Nama Dokter </th>
	                                 <th><i class="icon_calendar"></i> Treatment Lanjut </th>
	                                 <th><i class="icon_mobile"></i> Created_at</th>
	                                 <th><i class="icon_cogs"></i> Action</th>
	                              </tr>
	                             
					            @foreach ($pemeriksaans as $pemeriksaan)
					            <tr>
					            	<th> <a href="{{{ URL::route('pemeriksaan.show', array($pemeriksaan->id)) }}}"> {{ $pemeriksaan->id}} </a> </th>
					               	<th> {{ $pemeriksaan->tanggal }} </th>
					            	<th> {{ $pemeriksaan->kategori }} </th>
					            	<th> {{ $pemeriksaan->pasien->nama }} </th>
					            	<th> {{ $pemeriksaan->dokter->nama }} </th>
					            	<th> {{ $pemeriksaan->treatment_lanjut }} </th>
					            	<th> {{ $pemeriksaan->created_at }} </th>
					            	
					            	
					            	<td>
							 		 <div class="todo-list">
								 		 <div class="todo-list-item">
									 		 <div class="checkbox">
			                                  	<div class="pull-right action-buttons">
			                                  	<a href="{{{ URL::route('pemeriksaan.edit', array($pemeriksaan->id)) }}}"><button class="btn btn-default btn-md" id="btn-todo" align="right"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></a>
			                                     
			                                    {!! Form::open(['route' => ['pemeriksaan.destroy',$pemeriksaan->id],'method' => 'DELETE','onsubmit' => 'return ConfirmDelete()' ]) !!} 

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