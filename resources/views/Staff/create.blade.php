<!DOCTYPE html>
<html>
<head>
	<title>Data Staff</title>
</head>
<body>
@extends('partials.layout')


@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
			<div class="panel panel-info"> 
				 <div class="panel-heading">Create New Staff</div>
				 	<div class="panel-body">
				 	<!-- panel body -->
				 	{!! Form::open(array('route' => 'staff.store','class' => 'form-horizontal','files' => true)) !!}
					 	<fieldset>
						 		<div class="form-group">
							 	{{ Form::label ('nama_label','Masukkan nama',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('nama',null,array('class' => 'form-control','placeholder'=>'Name here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('nip_label','Masukkan NIP',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('nip',null,array('class' => 'form-control','placeholder'=>'Nomor Pegawai...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('email_label','Masukkan Email',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('email',null,array('class' => 'form-control','placeholder'=>'Email here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('password_label','Masukkan password',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('password',null,array('class' => 'form-control','placeholder'=>'Password here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('tempat_lahir_label','Masukkan Tempat Lahir',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('tempat_lahir',null,array('class' => 'form-control','placeholder'=>'Place Birth here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('tanggal_lahir_label','Masukkan Tanggal Lahir',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::date('tanggal_lahir',null,array('class' => 'form-control','placeholder'=>'Date Birth here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('alamat_label','Masukkan Alamat',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('alamat',null,array('class' => 'form-control','placeholder'=>'Address here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('nomor_hp_label','Masukkan Nomor Handphone',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::text('nomor_hp',null,array('class' => 'form-control','placeholder'=>'Phone Number here...')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('foto_label','Masukkan Foto',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::file('foto',array('class' => 'form-control')) }}
							 	</div>
						 	</div>

						 	{{ Form::submit('Simpan',array('class' => 'btn btn-primary pull-left '))}}
					 	</fieldset>
				 	{!! Form::close() !!}
				 	
				 	<!-- end panel body -->
					
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->	
 
 
@endsection

</body>
</html>