<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::all();
        //dd($orders);
        return view('admin.admin', compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // dd($request);
        $this->validate($request,[
            'nomor_pesanan' => 'required|unique:orders,nomor_pesanan',
            'nama_pesanan' => 'required',
            'jenis_pesanan' => 'required',
            'jumlah_pesanan' => 'required',
            'dp_pesanan' => 'required',
            'total_harga_pesanan' => 'required',
            'keterangan_pesanan' => 'required',
            'progres_pesanan' => 'required',
            'nama_pemesan' => 'required',
            'nomor_pemesan' => 'required',
        ]);

        //$messages = $validate->messages();
        //return Redirect::back()->withErrors($validate)->withInput();

        Order::create([
            'nomor_pesanan' => $request->nomor_pesanan,
            'nama_pesanan' => $request->nama_pesanan,
            'jenis_pesanan' => $request->jenis_pesanan,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'dp_pesanan' => $request->dp_pesanan,
            'total_harga_pesanan' => $request->total_harga_pesanan,
            'keterangan_pesanan' => $request->keterangan_pesanan,
            'progres_pesanan' => $request->progres_pesanan,
            'nama_pemesan' => $request->nama_pemesan,
            'nomor_pemesan' => $request->nomor_pemesan,
        ]);

        return redirect('/admin')->with('alert-success', 'Pesanan berhasil ditambah.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Order::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $admin)
    {
        return view('admin.edit', compact('admin'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Order::findOrFail($id);

        $this->validate($request,[
            'nama_pesanan' => 'required',
            'jenis_pesanan' => 'required',
            'jumlah_pesanan' => 'required',
            'dp_pesanan' => 'required',
            'total_harga_pesanan' => 'required',
            'keterangan_pesanan' => 'required',
            'progres_pesanan' => 'required',
            'nama_pemesan' => 'required',
            'nomor_pemesan' => 'required',
        ]);
        Order::find($id)->update([
            'nama_pesanan' => $request->nama_pesanan,
            'jenis_pesanan' => $request->jenis_pesanan,
            'jumlah_pesanan' => $request->jumlah_pesanan,
            'dp_pesanan' => $request->dp_pesanan,
            'total_harga_pesanan' => $request->total_harga_pesanan,
            'keterangan_pesanan' => $request->keterangan_pesanan,
            'progres_pesanan' => $request->progres_pesanan,
            'nama_pemesan' => $request->nama_pemesan,
            'nomor_pemesan' => $request->nomor_pemesan
        ]);

        return redirect('/admin')->with('alert-success', 'Pesanan berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Order::findOrFail($id);
        Order::find($id)->delete();

        return redirect('/admin')->with('alert-success', 'Data pesanan berhasil dihapus.');
    }
}
