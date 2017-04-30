<!DOCTYPE html>
<html>
<head>
	<title>Canvas Garment | Halaman Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="shortcut icon" type="image/png" href="{{ url('favicon.png') }}">
	<style type="text/css">
		@font-face {
			font-family: OpenSans-semibold;
			src: url('{{ url('open-sans/OpenSans-semibold.ttf') }}');
		}

		@font-face {
			font-family: OpenSans-light;
			src: url('{{ url('open-sans/OpenSans-light.ttf') }}');
		}

		.logo{
			width: 100%;
			height: auto;
			margin: 20px;
		}

		.isiForm{
			margin-top: 3vw;
			font-family: opensans-semibold;
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

		.menu button{
			border-style: none;
			background-color: white;
			padding: 6px 20px;	
			font-family: opensans-semibold;
		}

		.menu button:hover{
			border-bottom-style: solid;
			border-bottom-color: #5BC0DE;
		}

		.menu button:focus {
			outline:none !important
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
					<a href="{{ url('/admin') }}"><img class="logo" src="{{ url('logo.png') }}"></a>
				</div>
			</div>
			<div class="col-md-12 isiForm">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal form-input" style="margin-bottom: 100px;" action="/admin/{{ $admin->id }}" method="post">
						{{ csrf_field() }}
						<legend style="text-align:center"><h2>Ubah Data Pesanan</h2></legend>

						{{-- Input Nomor Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nomor_pesanan">Nomor Pesanan:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" value="{{ $admin->nomor_pesanan }}" disabled>
							</div>
						</div>

						{{-- Input Nama Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama_pesanan">Nama Pesanan:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" id="nama_pesanan" name="nama_pesanan" placeholder="Masukkan nama pesanan" value="{{ $admin->nama_pesanan }}">
								@if($errors->has('nama_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Nama pesanan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Jenis Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="jenis_pesanan">Jenis Pesanan:</label>
							<div class="col-sm-10"> 
								<select class="form-control" name="jenis_pesanan" id="jenis_pesanan">
									<option selected disabled>Pilih jenis pesanan</option>
									<option value="Kemeja">Kemeja</option>
									<option value="T-shirt">T-shirt</option>
									<option value="Polo-shirt">Polo-shirt</option>
									<option value="Jaket">Jaket</option>
									<option value="Rompi">Rompi</option>
									<option value="Lainnya">Lainnya</option>
								</select>
								@if($errors->has('jenis_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Jenis pesanan harus dipilih!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Jumlah Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="jumlah_pesanan">Jumlah Pesanan:</label>
							<div class="col-sm-10"> 
								<input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Masukkan jumlah pesanan" value="{{ $admin->jumlah_pesanan }}">
								@if($errors->has('jumlah_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Jumlah pesanan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input DP Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="dp_pesanan">Uang Muka:</label>
							<div class="col-sm-10"> 
								<input type="number" class="form-control" id="dp_pesanan" name="dp_pesanan" placeholder="Masukkan uang muka pesanan" value="{{ $admin->dp_pesanan }}">
								@if($errors->has('dp_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Total uang muka harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Total Harga Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="total_harga_pesanan">Harga Total:</label>
							<div class="col-sm-10"> 
								<input type="number" class="form-control" id="total_harga_pesanan" name="total_harga_pesanan" placeholder="Masukkan harga total pesanan" value="{{ $admin->total_harga_pesanan }}">
								@if($errors->has('total_harga_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Harga total pesanan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Keterangan Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="keterangan_pesanan">Keterangan Pesanan:</label>
							<div class="col-sm-10"> 
								<textarea class="form-control" rows="5" placeholder="Masukkan keterangan tambahan pesanan" id="keterangan_pesanan" name="keterangan_pesanan">{{ $admin->keterangan_pesanan }}</textarea>
								@if($errors->has('keterangan_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Keterangan pesanan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Progres Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="progres_pesanan">Progres:</label>
							<div class="col-sm-10"> 
								<select class="form-control" name="progres_pesanan" id="progres_pesanan">
									<option selected disabled>Pilih progres pesanan</option>
									<option value="1 - Order Masuk">Order Masuk</option>
									<option value="2 - Beli Bahan">Beli Bahan</option>
									<option value="3 - Potong Kain">Potong Kain</option>
									<option value="4 - Jahit">Jahit</option>
									<option value="5 - Finishing">Finishing</option>
									<option value="6 - Bordir/Sablon/Aksesoris">Bordir/Sablon/Aksesoris</option>
									<option value="7 - Order Selesai">Order Selesai</option>
								</select>
								@if($errors->has('progres_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Progres pesanan harus dipilih!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Nama Pemesan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama_pemesan">Nama Pemesan:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan nama pemesan" value="{{ $admin->nama_pemesan }}">
								@if($errors->has('nama_pemesan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Nama pemesan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Nomor Pemesan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nomor_pemesan">No HP Pemesan:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" id="nomor_pemesan" name="nomor_pemesan" placeholder="Masukkan nomor telepon pemesan" value="{{ $admin->nomor_pemesan }}">
								@if($errors->has('nomor_pemesan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Nomor telepon pemesan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						<div class="form-group"> 
							<div class="col-sm-offset-2 col-sm-10">
								<a href="/admin" class="btn btn-danger">Cancel</a>
								<button type="submit" class="btn btn-primary">Ubah</button>
								<input type="hidden" name="_method" value="PUT">
							</div>
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>