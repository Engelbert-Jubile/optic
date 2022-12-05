<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Transaksi extends Controller
{
    public function index($id){
        $customer = DB::select('SELECT * FROM customer WHERE id_customer = ?', [$id])[0];
        return view('transaksi/index',['transaksis' => DB::select('SELECT * FROM transaksi 
        LEFT JOIN kacamata ON kacamata.id_kacamata = transaksi.id_kacamata
        WHERE id_customer = '.$id.' AND kacamata.deleted_at IS NULL'
        ), "customer" => $customer]);
    }
    public function tambah($id){
        $customer = DB::select('SELECT * FROM customer WHERE id_customer = ?', [$id])[0];
        return view('transaksi/tambah',['kacamatas' => DB::select('SELECT * FROM kacamata WHERE deleted_at IS NULL'), "customer" => $customer]);
    }
    public function store($id,Request $request){
        if(DB::statement('INSERT INTO transaksi VALUES (null, ?, ?, NOW())', [$id,$request->kacamata])){
            return back()->with('success','Berhasil menambahkan transaksi'); 
        }
        return back()->with('fail','Gagal menambahkan transaksi'); 
    }
    public function destroy($id){
        if(DB::statement('DELETE FROM transaksi WHERE id_transaksi = ?', [$id])){
            return back()->with('success','Berhasil hapus transaksi berhasil'); 
        }
        return back()->with('fail','Gagal hapus transaksi'); 
    }
    public function ubah($id){
        $transaksi = DB::select('SELECT * FROM transaksi WHERE id_transaksi = ?', [$id])[0];
        $customer = DB::select('SELECT * FROM customer WHERE id_customer = ?', [$transaksi->id_customer])[0];
        return view('transaksi/ubah',['customer' => $customer, 'transaksi'=> $transaksi, 'kacamatas' => DB::select('SELECT * FROM kacamata WHERE deleted_at IS NULL')]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE transaksi SET id_kacamata = ? WHERE id_transaksi = ?', [$request->kacamata,$id])){
            return back()->with('success','Berhasil mengubah transaksi'); 
        }
        return back()->with('fail','Gagal mengubah transaksi'); 
    }
}
