<!DOCTYPE html>
<html>
<head>
	<title>Data pemeriksaan</title>
</head>
<body>
@extends('partials.layout')


@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
			<div class="panel panel-info"> 
				 <div class="panel-heading">Show Data {{ $pemeriksaan->pasien->nama }} </div>
				 	<div class="panel panel-default chat">
									
					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									{!! Html::image('images/'.$pemeriksaan->foto, '',['class' => 'img-square']) !!}
								</span>

								<div class="chat-body clearfix">
									<strong class="primary-font"><h4> {{ $pemeriksaan->pasien->nama }} </strong> </h4><small class="text-muted"> <strong>( {{ $pemeriksaan->pasien->id}} )</strong></small>
								
									<p>
										<h5><strong>Dokter </strong> : {{ $pemeriksaan->dokter->nama }} </h5>
									</p>
									<p>
										<h5><strong>Kategori record</strong> : {{ $pemeriksaan->kategori}}</h5>
									</p>
									<p>
										<h5><strong>Tanggal Pemeriksaan</strong> : {{ $pemeriksaan->tanggal }}</h5>
									</p>
									<p>
										<h5><strong>Hasil pemeriksaan</strong> : {{ $pemeriksaan->hasil }}</h5>
									</p>
									<p>
										<h5><strong>Resep obat pendukung</strong> : {{ $pemeriksaan->obat}}</h5>
									</p>
									<p>
										<h5><strong>Treatment lanjutan</strong> : {{ $pemeriksaan->treatment_lanjutan }}</h5>
									</p>
									<p>
										<h5><strong>Tensi pasien</strong> : {{ $pemeriksaan->tensi}}</h5>
									</p>
									<p>
										<h5><strong>Petugas penanggung jawab</strong> : {{ $pemeriksaan->petugas->nama}}</h5>
									</p>
									<p>
										<h5><strong>Dibuat pada</strong> : {{ $pemeriksaan->created_at }}</h5>
									</p>
									<p>
										<h6><strong><i>Last updated</i></strong> : {{ $pemeriksaan->updated_at }}</h6>
									</p>
								</div>
							</li>
							</ul>
						<!-- end panel body -->
					</div>
				</div>
			</div>
	</div>
</div><!--/.row-->	
 <a href="{{{ URL::route('pemeriksaan.edit', array($pemeriksaan->id)) }}}"><button class="btn btn-primary" id="btn-todo" align="right">Edit</button></a> 
 
@endsection

</body>
</html>