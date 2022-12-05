<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Kacamata extends Controller
{
    public function index(){
        return view('kacamata/index',['kacamatas' => DB::select('SELECT * FROM kacamata WHERE deleted_at IS NULL')]);
    }
    public function tambah(){
        return view('kacamata/tambah');
    }
    public function store(Request $request){
        if(DB::statement('INSERT INTO kacamata VALUES (null, ?, ?, null)', [$request->jenis,$request->harga])){
            return back()->with('success','Berhasil menambahkan kacamata'); 
        }
        return back()->with('fail','Gagal menambahkan kacamata'); 
    }
    public function destroy($id){
        if(DB::statement('UPDATE kacamata SET deleted_at = NOW() WHERE id_kacamata = ?', [$id])){
            return back()->with('success','Berhasil hapus kacamata berhasil'); 
        }
        return back()->with('fail','Gagal hapus kacamata'); 
    }
    public function ubah($id){
        return view('kacamata/ubah',['kacamata' => DB::select('SELECT * FROM kacamata WHERE id_kacamata = ?', [$id])[0]]);
    }
    public function update($id,Request $request){
        if(DB::statement('UPDATE kacamata SET jenis_kacamata = ?, harga_kacamata = ? WHERE id_kacamata = ?', [$request->jenis,$request->harga, $id])){
            return back()->with('success','Berhasil mengubah kacamata'); 
        }
        return back()->with('fail','Gagal mengubah kacamata'); 
    }
}
