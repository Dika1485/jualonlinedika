<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Auth;

class ProdukController extends Controller
{
    public function read(){
        $produk = Produk::where('owner_id',Auth::user()->id)->get();
        return view('index', ['produk' => $produk]);
    }
    public function read_id(Request $request){
    	$produk = Produk::where('id',$request->get('id'))->get();
        if($produk->count()==1){
    	    return view('update', ['produk' => $produk]);
        }
        return redirect(url('/'));
    }
    public function create(Request $request){
        
            $produk=new Produk();
            $produk->name=$request->post('name');
            $produk->price=$request->post('price');
            $produk->owner_id=Auth::user()->id;
            $produk->save();
        return redirect(url('/'));
    }
    public function update(Request $request){
            $produk = Produk::findOrFail($request->post('id'));
            $produk->name=$request->post('name');
            $produk->price=$request->post('price');
            $produk->owner_id=Auth::user()->id;
            $produk->save();
        return redirect(url('/'));
    }
    public function delete(Request $request){
    	$produk = Produk::findOrFail($request->post('id'));
        if($produk->count()!=0){
            $pesanan = Pesanan::where('product_id',$request->post('id'))->get();
                if($pesanan->count()!=0){
                    foreach ($pesanan as $pesanan) {
                        $pembayaran=Pembayaran::where('id',$pesanan->paying_id)->delete();
                    }
                    Pesanan::where('product_id',$request->post('id'))->delete();
                }
            $produk->delete();
        }
    	return redirect(url('/'));
    }
}
