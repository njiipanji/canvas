<!DOCTYPE html>
<html>
<head>
	<title>Canvas Garment | Halaman Admin</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
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
				<div class="col-md-10 menu">
					<button class="input">Input Data Order</button>
					<button class="ubah">Ubah Status Order</button>
					<a href="{{ route('logout') }}" style="color: #f05151;" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><button>Logout</button></a>
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						{{ csrf_field() }}
					</form>
				</div>
			</div>
			<div class="col-md-12 isiForm">
				<div class="col-md-2"></div>
				<div class="col-md-8">
					<form class="form-horizontal form-input" style="margin-bottom: 100px;" action="/admin" method="post">
						{{ csrf_field() }}
						<legend style="text-align:center"><h2>Tambah Data Pesanan</h2></legend>

						<div class="row">
							@if(Session::has('alert-success'))
								<div class="alert alert-success alert-dismissible fade in" role="alert">
									<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
									{{ Session::get('alert-success') }}
								</div>
							@endif
						</div>

						{{-- Input Nomor Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nomor_pesanan">Nomor Pesanan:</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="nomor_pesanan" name="nomor_pesanan" placeholder="Masukkan nomor pesanan" value="{{ old('nomor_pesanan') }}">
								@if($errors->has('nomor_pesanan'))
									{{-- {{ dd($errors) }} --}}
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										@if($errors->first('nomor_pesanan') == 'The nomor pesanan field is required.')
											Nomor pesanan harus diisi!!
										@else
											Nomor pesanan yang dimasukkan sudah ada!!
										@endif
									</div>
								@endif
							</div>
						</div>

						{{-- Input Nama Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="nama_pesanan">Nama Pesanan:</label>
							<div class="col-sm-10"> 
								<input type="text" class="form-control" id="nama_pesanan" name="nama_pesanan" placeholder="Masukkan nama pesanan" value="{{ old('nama_pesanan') }}">
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
								<input type="number" class="form-control" id="jumlah_pesanan" name="jumlah_pesanan" placeholder="Masukkan jumlah pesanan" value="{{ old('jumlah_pesanan') }}">
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
								<input type="number" class="form-control" id="dp_pesanan" name="dp_pesanan" placeholder="Masukkan uang muka pesanan" value="{{ old('dp_pesanan') }}">
								@if($errors->has('dp_pesanan'))
									<div class="alert alert-danger alert-dismissible fade in" role="alert">
										<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
										Jumlah uang muka pesanan harus diisi!!
									</div>
								@endif
							</div>
						</div>

						{{-- Input Total Harga Pesanan --}}
						<div class="form-group">
							<label class="control-label col-sm-2" for="total_harga_pesanan">Harga Total:</label>
							<div class="col-sm-10"> 
								<input type="number" class="form-control" id="total_harga_pesanan" name="total_harga_pesanan" placeholder="Masukkan harga total pesanan" value="{{ old('total_harga_pesanan') }}">
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
								<textarea class="form-control" rows="5" placeholder="Masukkan keterangan tambahan pesanan" id="keterangan_pesanan" name="keterangan_pesanan">{{ old('keterangan_pesanan') }}</textarea>
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
								<input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" placeholder="Masukkan nama pemesan" value="{{ old('nama_pemesan') }}">
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
								<input type="text" class="form-control" id="nomor_pemesan" name="nomor_pemesan" placeholder="Masukkan nomor telepon pemesan" value="{{ old('nomor_pemesan') }}">
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
								<button type="submit" class="btn btn-primary">Tambah</button>
							</div>
						</div>
					</form>


					{{-- List data pesanan --}}

					<form class="form-horizontal form-ubah" style="display:none; margin-bottom: 100px;">
						<legend style="text-align:center"><h2>Data Pesanan</h2></legend>
						<div class="table-responsive">
							<table id="example" class="display table text-center" cellspacing="0" width="100%">
								<thead>
									<tr>
										<th>Tanggal Order</th>
										<th>Nomor Pesanan</th>
										<th>Pesanan</th>
										<th>Jumlah Pesanan</th>
										<th>Progres Pesanan</th>
										<th>Nama Pemesan</th>
										<th>Opsi</th>
									</tr>
								</thead>
								{{-- <tfoot>
									<tr>
										<th>Tanggal Order</th>
										<th>Nomor Pesanan</th>
										<th>Pesanan</th>
										<th>Jumlah Pesanan</th>
										<th>Progres Pesanan</th>
										<th>Nama Pemesan</th>
										<th>Opsi</th>
									</tr>
								</tfoot> --}}
								<tbody>
									@foreach($orders as $order)
										<tr>
											<td>{{ $order->created_at }}</td>
											<td>{{ $order->nomor_pesanan }}</td>
											<td>{{ $order->nama_pesanan }}</td>
											<td>{{ $order->jumlah_pesanan }}</td>
											<td>{{ $order->progres_pesanan }}</td>
											<td>{{ $order->nama_pemesan }}</td>
											<td>
												<form action="/admin/{{ $order->id }}" method="POST" accept-charset="UTF-8">
													{{ csrf_field() }}
													<a class="btn btn-info" href="/admin/{{ $order->id }}/edit" title="Ubah data pesanan" style="margin: 2px;">Edit</a>
													<button type="submit" class="btn btn-danger" title="Hapus data pesanan" onclick="return confirm('Anda yakin akan menghapus data pesanan {{ $order->nomor_pesanan }}?')" style="margin: 2px;">Hapus</button>
													<input type="hidden" name="_method" value="DELETE">
												</form>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
						</div>
					</form>
				</div>
				<div class="col-md-2"></div>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script type="text/javascript">
		$(".input").click(function(){
			$(".form-input").show("fast");
			$(".form-ubah").hide("fast");

		});

		$(".ubah").click(function(){
			$(".form-ubah").show("fast");
			$(".form-input").hide("fast");
		});

		$(document).ready(function() {
			$('#example').dataTable( {
				"lengthChange": false,
				"pageLength": 5
			} );
		} );
	</script>
</body>
</html>