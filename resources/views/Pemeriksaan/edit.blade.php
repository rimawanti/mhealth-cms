<!DOCTYPE html>
<html>
<head>
	<title>Data Pemeriksaan/title>
</head>

<body>
@extends('partials.layout')


@section('content')
<div class="row">
	<div class="col-lg-12">		<h1 class="page-header"></h1>
			<div class="panel panel-info"> 
				 <div class="panel-heading">Edit Data Pemeriksaan {{ $pemeriksaan->pasien->nama }}</div>
				 	<div class="panel-body" id="form_all">
				 			
				 	<!-- panel body -->
				 	{!! Form::model($pemeriksaan, ['route' => ['pemeriksaan.update',$pemeriksaan->id], 'method' => 'PUT','class' => 'form-horizontal' ]) !!}
					 	<fieldset>
						 	<div class="form-group">
							 	{{ Form::label ('nama_pasien_label','Nama Pasien',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('pasien_id',$listpasien,null,array('class' => 'form-control','placeholder'=>'Patient Name here','required'=>'required')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('nama_dokter_label','Dokter',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('dokter_id',$listdokter,null,array('class' => 'form-control','placeholder'=>'Doctor Name here','required'=>'required')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('kategori_label','Kategori',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::select('kategori',['Kontrol'=>'Kontrol','Laboraturium'=>'Laboraturium','USG'=>'USG','Cemoteraphy' => 'Cemoteraphy','Other'=>'Other'],'Kontrol',array('class' => 'form-control','id' => 'marital_status')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
							 	{{ Form::label ('tanggal_label','Tanggal Pemeriksaan',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::datetime('tanggal',null,array('class' => 'form-control','placeholder'=>'Tanggal pemeriksaan here...')) }}
							 	</div>
						 	</div>
							<div class="form-group">
								{{ Form::label ('hasil_label','Masukkan Hasil Pemeriksaan',array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-9">
								 		{{ Form::textarea('hasil',null,array('class' => 'form-control','placeholder'=>'Hasil pemeriksaan here...')) }}
								 </div>
							 </div>
							 <div class="form-group">
								{{ Form::label ('obat_label','Masukkan Resep obat (jika ada)',array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-9">
								 		{{ Form::textarea('obat',null,array('class' => 'form-control','placeholder'=>'Obat dan cara pemakaiannya dipisah dengan koma')) }}
								 </div>
							 </div>
							  <div class="form-group">
								{{ Form::label ('treatment_lanjut_label','Masukkan Treatment lanjut (jika ada)',array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-9">
								 		{{ Form::textarea('treatment_lanjut',null,array('class' => 'form-control','placeholder'=>'Pisahkan treatment dengan koma jika lebih dari satu')) }}
								 </div>
							 </div>
							  <div class="form-group">
								{{ Form::label ('tensi_label','Masukkan Tensi pasien',array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-9">
								 		{{ Form::text('tensi',null,array('class' => 'form-control','placeholder'=>'Tekanan darah pasien ...')) }}
								 </div>
							 </div>
							 <div class="form-group">
							 	{{ Form::label ('foto_label','Masukkan Foto/hasil lab',array('class' => 'col-md-2 control-label')) }}
							 	<div class="col-md-9">
							 		{{ Form::file('foto',array('class' => 'form-control')) }}
							 	</div>
						 	</div>
						 	<div class="form-group">
								{{ Form::label ('staff_label','Petugas penanggung jawab (jika ada)',array('class' => 'col-md-2 control-label')) }}
								<div class="col-md-9">
								 		{{ Form::select('petugas_id',$liststaff,null,array('class' => 'form-control','placeholder'=>'Staff Name')) }}
								 </div>
							 </div>
							{{ Form::submit('Simpan',array('class' => 'btn btn-primary','id' => 'simpan'))}}
							
						 	{{-- {!! Html::linkRoute('prediksi','Calculate',array(''),array('class'=> 'btn btn-primary pull-left')) !!} 
						 	{{ Form::submit('Simpan',array('class' => 'btn btn-success pull-left '))}} --}}
					 	</fieldset>
				 	{!! Form::close() !!}

			  	<!-- end panel body -->
					
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->	
</body>
</html>
@endsection