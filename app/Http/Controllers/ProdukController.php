<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Brand;
use App\Models\Gudang;

class ProdukController extends Controller
{
    public function index() {
        $brand = Brand::all();
        $gudang = Gudang::all();

        $list = Produk::with('brand:id,nama_brand','gudang:id,nama_gudang,alamat_gudang')->get();
        return view("produk.index",compact('list','brand','gudang'));
    }

    public function create() {
        $brand = Brand::all();
        $gudang = Gudang::all();

        return view("produk.create",compact('brand','gudang'));
    }

    public function store(Request $req) {
        $produk = new Produk();
        $produk->nama_produk = $req->nama_produk;
        $produk->stok = $req->stok;
        $produk->brand_id = $req->brand_id;
        $produk->gudang_id = $req->gudang_id;
        $produk->harga = $req->harga;
        $produk->save();
        return redirect("/produk");
    }

    public function edit($id) {
        //$detail = Produk::where("id",$id)->get();
        $brand = Brand::all();
        $gudang = Gudang::all();

        $detail = Produk::find($id); // find dapat dipakai jika primary key
        return view("produk.edit",compact('detail','brand','gudang'));
    }

    public function update($id, Request $req) {

        $cek = Produk::find($id);
        
        if($cek) {

            $cek->nama_produk = $req->nama_produk;
            $cek->stok        = $req->stok;
            $cek->brand_id    = $req->brand_id;
            $cek->gudang_id   = $req->gudang_id;
            $cek->harga       = $req->harga;
            $cek->save();

            return redirect("/produk");

        } else {
            
            echo "Data tidak ditemukan";

        }
    }

    public function delete($id) {

        $cek = Produk::find($id);

        if($cek) {

            $cek->delete();
            return redirect("/produk");

        } else {

            echo "Data tidak ditemukan";
        
        }
    }
}