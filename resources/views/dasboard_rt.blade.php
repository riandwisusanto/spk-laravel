<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<div class="container">
		<table class="well table table-bordered">
			@foreach($user as $us)
			<tr>
				<td><b>{{ $us->nama}}</b></td>
				<td>{{$us->email}}</td>
				<td>{{$us->no_ktp}}</td>
				<td>{{$us->username}}</td>
				<td>{{$us->password}}</td>
			</tr>
			@endforeach
		</table>
	</div>
</body>
</html>