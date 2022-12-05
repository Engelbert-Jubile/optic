<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Customer extends Controller
{
    public function index(){
        
        return view('customer/index',['customers' => DB::select('SELECT * FROM customer WHERE deleted_at IS NULL')]);
    }
    public function tambah(){
        return view('customer/tambah');
    }
    public function store(Request $request){
        if(DB::statement('INSERT INTO customer VALUES (null, ?, ?, ?, null)', [$request->nama,$request->telepon,$request->alamat])){
            return back()->with('success','Berhasil menambahkan customer'); 
        }
        return back()->with('fail','Gagal menambahkan customer'); 
    }
    public function destroy($id){
        if(DB::statement('UPDATE customer SET deleted_at = NOW() WHERE id_customer = ?', [$id])){
            return back()->with('success','Berhasil hapus customer berhasil'); 
        }
        return back()->with('fail','Gagal hapus customer'); 
    }
    public function ubah($id){
        return view('customer/ubah',['customer' => DB::select('SELECT * FROM customer WHERE id_customer = ?', [$id])[0]]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE customer SET nama_customer = ?, telepon_customer = ? ,alamat_customer = ? WHERE id_customer = ?', [$request->nama,$request->telepon,$request->alamat, $id])){
            return back()->with('success','Berhasil mengubah customer'); 
        }
        return back()->with('fail','Gagal mengubah customer'); 
    }
}
