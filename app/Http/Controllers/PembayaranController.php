<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function read(){
        $pembayaran = Pembayaran::all();
        return view('paying', ['pembayaran' => $pembayaran]);
    }
    public function read_id($id){
    	$pembayaran = Pembayaran::where('id',$id)->get();
        if($pembayaran->count()==1){
    	    return view('updatepmbayaran', ['pembayaran' => $pembayaran]);
        }
        return redirect(url('/paying'));
    }
}
