<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class PesananController extends Controller
{
    public function read(){
        $pesanan = Pembayaran::join('users','users.id','pembayarans.customer_id')->join('pesanans','pesanans.paying_id','pembayarans.id')->join('produks','produks.id','pesanans.product_id')->where('produks.owner_id',Auth::user()->id)->select('pesanans.*','produks.name as product')->get()->unique('paying_id');
        return view('order', ['pesanan' => $pesanan]);
    }
    public function read_id($id){
    	$pesanan = Pesanan::where('id',$id)->get();
        if($pesanan->count()==1){
    	    return view('updatepesanan', ['pesanan' => $pesanan]);
        }
        return redirect(url('/order'));
    }
    // public function create(Request $request){
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'price' => ['required','integer'],
    //     ]);
    //     if($validated){
    //         $produk=new Produk();
    //         $produk->name=$request->post('name');
    //         $produk->price=$request->post('price');
    //         $produk->owner_id=Auth::user()->id;
    //         $produk->save();
    //     }
    //     return redirect(url('/'));
    // }
    // public function update(Request $request, $id){
    //     $validated = $request->validate([
    //         'name' => ['required', 'string', 'max:255'],
    //         'price' => ['required','integer'],
    //     ]);
    //     if($validated){
    //         $produk = Produk::findOrFail($id);
    //         $produk->name=$request->post('name');
    //         $produk->price=$request->post('price');
    //         $produk->owner_id=Auth::user()->id;
    //         $produk->save();
    //     }
    //     return redirect(url('/'));
    // }
    public function delete($id){
    	$produk = Produk::findOrFail($id);
        $produk->delete();
    	return redirect(url('/'));
    }
}
