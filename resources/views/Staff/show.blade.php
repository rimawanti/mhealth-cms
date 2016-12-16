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
				 <div class="panel-heading">Show Data {{ $staff->nama }} </div>
				 	<div class="panel panel-default chat">
									
					<div class="panel-body">
						<ul>
							<li class="left clearfix">
								<span class="chat-img pull-left">
									{!! Html::image('images/'.$staff->foto, '',['class' => 'img-square']) !!}
								</span>
								<div class="chat-body clearfix">
									<strong class="primary-font"><h4> {{ $staff->nama }} </strong> </h4><small class="text-muted"> <strong>( {{ $staff->id}} )</strong></small>
									<p>
										<h5><strong>NIP </strong> : {{ $staff->nip }} </h5>
									</p>
									<p>
										<h5><strong>Email </strong> : {{ $staff->email }} </h5>
									</p>
									<p>
										<h5><strong>Password</strong> : {{ $staff->password }}</h5>
									</p>
									<p>
										<h5><strong>Tempat Lahir</strong> : {{ $staff->tempat_lahir }}</h5>
									</p>
									<p>
										<h5><strong>Tanggal Lahir</strong> : {{ $staff->tanggal_lahir }}</h5>
									</p>
									<p>
										<h5><strong>Alamat</strong> : {{ $staff->alamat }}</h5>
									</p>
									<p>
										<h5><strong>Nomor Handphone</strong> : {{ $staff->password }}</h5>
									</p>
									<p>
										<h5><strong>Dibuat pada</strong> : {{ $staff->created_at }}</h5>
									</p>
									<p>
										<h6><strong><i>Last updated</i></strong> : {{ $staff->updated_at }}</h6>
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
 <a href="{{{ URL::route('staff.edit', array($staff->id)) }}}"><button class="btn btn-primary" id="btn-todo" align="right">Edit</button></a> 
 
@endsection

</body>
</html>