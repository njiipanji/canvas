<!DOCTYPE html>
<html>
<head>
	<title>Canvas Garment | Lacak Pesanan</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{ url('favicon.png') }}">
	<style type="text/css">
		.logo{
			width: 100%;
			height: auto;
			margin: 20px;
		}

		.isiForm{
			margin-top: 200px;
			text-align: center;
			font-family: opensans-semibold;
			font-size: 30px;
		}

		.input-group{
			padding-left: 30px;
			padding-right: 30px;
			text-align: center;
		}

		.menu{
			text-align: right;
			margin-top: 40px;
			padding-right: 40px;
		}

		.tMenu{
			text-decoration: none;
			font-family: opensans-semibold;
			font-size: 20px;
			color: #5bc0de;
		}

		.tMenu:hover{
			color: #272828;
			text-decoration: none;
			transition: all .2s ease-in-out;
		}

		@font-face {
			font-family: OpenSans-semibold;
			src: url('{{ url('open-sans/OpenSans-semibold.ttf') }}');
		}

		@font-face {
			font-family: OpenSans-light;
			src: url('{{ url('open-sans/OpenSans-light.ttf') }}');
		}

		@media only screen and (max-width: 990px) {
			.logo{
				width: 60%;
				height: auto;
			}

			.gambar{
				text-align: center;
			}

			.isiForm{
				margin-top: 150px;
			}

			.input-group{
				margin-left: 100px;
				margin-right: 100px;
			}

			.menu{
				text-align: center;
			}
		}

		.konten{
			width: 100%;
			float: left;
		}

		div{
			/*border-style: solid;*/
		}
	</style>
</head>
<body>
	<div class="col-md-12">
		<div class="konten">
			<div class="col-md-12">
				<div class="col-md-2 gambar">
					<a href="{{ URL::to('http://canvasgarment.com') }}"><img class="logo" src="{{ url('logo.png') }}"></a>
				</div>
				@if (Auth::check())
					<div class="col-md-10 menu">
						<a href="{{ url('/admin') }}" class="btn btn-info">Dashboard Admin</a>
					</div>
				@endif
			</div>
			<div class="col-md-12 isiForm">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<!-- <p>Masukan ID Pesananmu</p> -->
					<form class="input-group input-group-lg" action="/cari" method="POST">
						{{ csrf_field() }}
						<input type="text" name="nomor_pesanan" class="form-control" placeholder="ID Pemesanan" aria-describedby="sizing-addon1" style="border-bottom-left-radius: 10px; border-top-left-radius: 10px;">
						<span class="input-group-btn">
							<button class="btn btn-info" type="submit" style="border-bottom-right-radius: 10px; border-top-right-radius: 10px;">Cari</button>
							<input type="hidden" name="_method" value="PUT">
						</span>
					</form>
					@if($errors->has('nomor_pesanan'))
						<div class="alert alert-danger alert-dismissible fade in" role="alert" style="margin: 5px 30px; font-size: 18px;">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
							ID Pemesanan harus diisi!!
						</div>
					@endif
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>