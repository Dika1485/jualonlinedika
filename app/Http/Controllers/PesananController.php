<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function read(){
        $pesanan = Pesanan::all();
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
