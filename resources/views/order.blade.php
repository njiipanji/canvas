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
			margin-top: 25px;
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

		.progress {
			margin-top: 30px;
			height: 50px;
		}

		.progress-bar {
			font-size: 30px;
			line-height: 50px;
		}

		table td{
			font-family: OpenSans-light;
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
				<div class="col-md-3"></div>
				<div class="col-md-6 text-center">
					@foreach($orders as $order)
						<h5 style="margin-bottom: 0px;">Nomor Pesanan</h5>
						<h3 style="margin-top: 0px; color: #237ca9; font-size: 50px;">{{ $order->nomor_pesanan }}</h3>
						<h5 style="margin-bottom: 0px;">Nama Pesanan</h5>
						<h3 style="margin-top: 0px; color: #237ca9; font-size: 30px;">{{ $order->nama_pesanan }}</h3>
						<div class="progress">
							@if($order->progres_pesanan == '1 - Order Masuk')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:14%" data-toggle="tooltip" data-placement="bottom" title="Order Masuk">
									14%
								</div>
							@elseif($order->progres_pesanan == '2 - Beli Bahan')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:29%" data-toggle="tooltip" data-placement="bottom" title="Beli Bahan">
									29%
								</div>
							@elseif($order->progres_pesanan == '3 - Potong Kain')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:43%" data-toggle="tooltip" data-placement="bottom" title="Potong Kain">
									43%
								</div>
							@elseif($order->progres_pesanan == '4 - Jahit')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:57%" data-toggle="tooltip" data-placement="bottom" title="Jahit">
									57%
								</div>
							@elseif($order->progres_pesanan == '5 - Finishing')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:71%" data-toggle="tooltip" data-placement="bottom" title="Finishing">
									71%
								</div>
							@elseif($order->progres_pesanan == '6 - Bordir/Sablon/Aksesoris')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:86%" data-toggle="tooltip" data-placement="bottom" title="Bordir/Sablon/Aksesoris">
									86%
								</div>
							@elseif($order->progres_pesanan == '7 - Order Selesai')
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:100%" data-toggle="tooltip" data-placement="bottom" title="Order Selesai">
									100%
								</div>
							@endif
						</div>
						<hr>
						<div class="col-md-12" style="font-size: 15px;">
								<div class="panel panel-default">
									<div class="panel-heading">Data Pemesan</div>
									<table class="table text-center">
										<thead style="font-weight: 500;">
											<tr>
												<th class="text-center">Nama</th>
												<th class="text-center">Nomor HP</th>
												<th class="text-center">Total Harga</th>
												<th class="text-center">DP</th>
												<th class="text-center">Sisa</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td>{{ $order->nama_pemesan }}</td>
												<td>{{ $order->nomor_pemesan }}</td>
												<td>{{ $order->total_harga_pesanan }}</td>
												<td>{{ $order->dp_pesanan }}</td>
												<td>{{ $order->dp_pesanan - $order->total_harga_pesanan }}</td>
											</tr>
										</tbody>
									</table>
								</div>
						</div>
					@endforeach
					<a href="{{ url('/') }}" class="btn btn-info">Kembali</a>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$( document ).ready(function() {
			$('[data-toggle="tooltip"]').tooltip()
		});
	</script>
</body>
</html>