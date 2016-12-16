<!DOCTYPE html>
<html>
<head>
	<title>Data Dokter</title>
</head>
<body>
@extends('partials.layout')


@section('content')
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header"></h1>
			<div class="panel panel-info"> 
				 <div class="panel-heading">Show Data {{ $dokter->nama }} </div>
				 	<div class="panel panel-default chat">
									
					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									{!! Html::image('images/'.$dokter->foto, '',['class' => 'img-square']) !!}
								</span>
								<div class="chat-body clearfix">
									<strong class="primary-font"><h4> {{ $dokter->nama }} </strong> </h4><small class="text-muted"> <strong>( {{ $dokter->id}} )</strong></small>
									<p>
										<h5><strong>NIP </strong> : {{ $dokter->nip }} </h5>
									</p>
									<p>
										<h5><strong>Email </strong> : {{ $dokter->email }} </h5>
									</p>
									<p>
										<h5><strong>Password</strong> : {{ $dokter->password }}</h5>
									</p>
									<p>
										<h5><strong>Tempat Lahir</strong> : {{ $dokter->tempat_lahir }}</h5>
									</p>
									<p>
										<h5><strong>Tanggal Lahir</strong> : {{ $dokter->tanggal_lahir }}</h5>
									</p>
									<p>
										<h5><strong>Alamat</strong> : {{ $dokter->alamat }}</h5>
									</p>
									<p>
										<h5><strong>Nomor Handphone</strong> : {{ $dokter->password }}</h5>
									</p>
									<p>
										<h5><strong>Nomor Ijin Praktek</strong> : {{ $dokter->nomor_ijin_praktek }}</h5>
									</p>
									<p>
										<h5><strong>Spesialis</strong> : {{ $dokter->spesialis }}</h5>
									</p>
									<p>
										<h5><strong>Dibuat pada</strong> : {{ $dokter->created_at }}</h5>
									</p>
									<p>
										<h6><strong><i>Last updated</i></strong> : {{ $dokter->updated_at }}</h6>
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
 <a href="{{{ URL::route('dokter.edit', array($dokter->id)) }}}"><button class="btn btn-primary" id="btn-todo" align="right">Edit</button></a> 
 
@endsection

</body>
</html>