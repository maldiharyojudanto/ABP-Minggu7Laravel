<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gudang;
use App\Models\Produk;
use App\Models\Brand;

class GudangController extends Controller
{
    public function index() {
        $produk = Produk::all();
        $brand = Brand::all();

        $list = Gudang::with('produk.brand')->get();
        return view("gudang.index",compact('list','produk','brand'));
    }

    public function create() {
        return view("gudang.create");
    }

    public function store(Request $req) {

        $new = new Gudang();
        $new->nama_gudang = $req->nama_gudang;
        $new->alamat_gudang = $req->alamat_gudang;
        $new->save();

        return redirect("/gudang");
    }

    public function detail($id) {
        $produk = Produk::all();
        $brand = Brand::all();

        $detail = Gudang::find($id); // mencari berdasarkan id produk
        return view('gudang.detail',compact('detail','produk','brand')); // compact join dengan produk
    }

    public function edit($id) {
        //$detail = Gudang::where("id",$id)->get();
        $detail = Gudang::find($id); // find dapat dipakai jika primary key
        return view("gudang.edit",compact('detail'));
    }

    public function update($id, Request $req) {

        $cek = Gudang::find($id);
        
        if($cek) {

            $cek->nama_gudang = $req->nama_gudang;
            $cek->alamat_gudang = $req->alamat_gudang;
            $cek->save();

            return redirect("/gudang");

        } else {
            
            echo "Data tidak ditemukan";

        }
    }

    public function delete($id) {

        $cek = Gudang::find($id);

        if($cek) {

            $cek->delete();
            return redirect("/gudang");

        } else {

            echo "Data tidak ditemukan";
        
        }
    }
}
