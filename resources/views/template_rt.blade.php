<!DOCTYPE html>
<html>
<head>
	<title>SPK JAMKESMAS</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<nav class="navbar navbar-fixed-top navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigaation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="">{{$nama}}</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="{{route('data.rt', $id)}}">Data Warga</a></li>
					<li><a href="{{route('tambah.index', $id)}}">Input Data</a></li>
					<li><a href="{{route('tentang.rt', $id)}}">Tentang</a></li>
					<li><a href="{{url('')}}">Logout</a></li>
				</ul>
			</div>
		</div>
	</nav>
	<br>
	<br>
	@section('contentWebsite')
	@show
	<footer>
		<div class="container">
			<hr>
			<p class="pull-right"><a href="#">Back to top</a></p>
			<p>&copy; Copyright 2019 <a href="#" target="_blank">Kelompok 2</a></p>
		</div>
	</footer>
</body>
</html>