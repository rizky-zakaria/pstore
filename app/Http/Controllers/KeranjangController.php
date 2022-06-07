<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KeranjangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function index()
    {
        $id = Auth::user()->id;
        $data = DB::select("SELECT transaksis.total, users.name, transaksis.jumlah, produks.gambar, produks.merk, produks.nama, transaksis.status FROM transaksis JOIN users JOIN produks ON transaksis.user_id = users.id AND transaksis.produk_id = produks.id WHERE transaksis.user_id = $id ");
            // dd($data);

        $keranjang = DB::table('transaksis')
        ->where('user_id', Auth::user()->id)
            ->where('status', 'keranjang')
            ->get()
            ->count();
        $dipesan = DB::table('transaksis')
        ->where('user_id', Auth::user()->id)
            ->where('status', 'dipesan')
            ->get()
            ->count();
        $total = $dipesan + $keranjang;
        return view('keranjang.index', compact('data', 'total'));
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

        $produk = Produk::find($request->produk_id);
        $setStok = Produk::find($request->produk_id);
        $setStok->stok = $produk->stok - 1;
        $setStok->update(); 

        $transaksi = new Transaksi();
        $transaksi->user_id = $request->user_id;
        $transaksi->produk_id = $request->produk_id;
        $transaksi->jumlah = 1;
        $transaksi->total = $request->harga;
        $transaksi->status = "keranjang";
        $transaksi->save();
        return redirect()->route('user.index');
    }
    public function toCart()
    {
        dd($this->get('produk_id'));
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
