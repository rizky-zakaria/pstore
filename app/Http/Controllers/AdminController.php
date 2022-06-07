<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.index');
    }

    public function produk()
    {
        $data = Produk::all();
        return view('admin.produk', compact('data'));
    }

    public function tambah_produk()
    {
        return view('admin.tambah_produk');
    }

    public function insert_produk(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->merk = $request->merk;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar = $request->gambar;
        $produk->save();
        Alert::success('Berhasil', 'Data berhasil disimpan');
        return redirect('admin/produk');
    }

    public function edit_produk($id)
    {
        $data = Produk::find($id);
        return view('admin/edit_produk', compact('data'));
    }

    public function update_produk(Request $request)
    {
        // dd($request);
        $produk = Produk::find($request->id);
        $produk->nama = $request->nama;
        $produk->deskripsi = $request->deskripsi;
        $produk->merk = $request->merk;
        $produk->kategori = $request->kategori;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->gambar = $request->gambar;
        $produk->update();
        Alert::success('Berhasil', 'Data berhasil diubah');
        return redirect('admin/produk');
    }

    public function destroy_produk($id)
    {
        // dd($id);
        $produk = Produk::find($id);
        $transaksi = DB::table('transaksis')
                ->where('produk_id', $id)
                ->get();
        if($transaksi === null){
            Alert::success('Berhasil', 'Berhasil Menghapus Data');
            $produk->delete();
        }else{
            Alert::warning('Gagal', 'Silahkan Hapus Data Transaksi Dengan Model HP Yang Sama Terlebih Dahulu');
        }
        return redirect('admin/produk');
    }

    public function transaksi()
    {
        $data = Transaksi::all();
        return view('admin.transaksi', compact('data'));
    }

    public function update_status($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi->status = "selesai";
        $transaksi->update();
        Alert::success('Berhasil', 'berhasil mengkonfirmasi pembayaran');
        return redirect('admin/transaksi');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
