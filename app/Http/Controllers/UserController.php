<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use DB;

class UserController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
    	return view('admin.login');
    }

    public function cari(Request $request)
    {
     	$this->validate($request,['nomor_pesanan' => 'required']);
        $orders = Order::all()->where('nomor_pesanan', '=', $request->nomor_pesanan);
    	if($orders == '[]') abort(404);

        return view('order', compact('orders'));
    }

    public function show($id_pemesanan)
    {
        $orders = Order::all()->where('nomor_pesanan', '=', $id_pemesanan);
    	if($orders == '[]') abort(404);

    	return view('order', compact('orders'));
    }
}
