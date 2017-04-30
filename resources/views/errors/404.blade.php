<!DOCTYPE html>
<html>
<head>
	<title>Canvas Garment | Error</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{ url('favicon.png') }}">
	<style type="text/css">
		.logo{
			width: 100%;
			height: auto;
			margin: 20px;
		}

		.isiForm{
			margin-top: 100px;
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
			</div>
			<div class="col-md-12 isiForm">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<div class="text-center">
						<h1>Halaman atau pesanan tidak ditemukan.</h1>
						<h5>Cek kembali URL atau nomor pesanan yang Anda masukkan.</h5>
						<a href="{{ url::previous() }}" class="btn btn-info">Kembali</a>
					</div>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>	
</body>
</html>