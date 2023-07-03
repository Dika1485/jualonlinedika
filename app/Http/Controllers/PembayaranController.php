<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    public function read(){
        $pembayaran = Pembayaran::join('users','users.id','pembayarans.customer_id')->join('pesanans','pesanans.paying_id','pembayarans.id')->join('produks','produks.id','pesanans.product_id')->where('produks.owner_id',Auth::user()->id)->select('users.name as customer','pembayarans.*')->get()->unique('paying_id');
        return view('paying', ['pembayaran' => $pembayaran]);
    }
    public function read_id($id){
    	$pembayaran = Pembayaran::where('id',$id)->get();
        if($pembayaran->count()==1){
    	    return view('updatepmbayaran', ['pembayaran' => $pembayaran]);
        }
        return redirect(url('/paying'));
    }
    public function update(Request $request){
    	$pembayaran = Pembayaran::findOrFail($request->post('id'));
        $pembayaran->status='settlement';
        $pembayaran->save();
        return redirect(url('/paying'));
    }
}
