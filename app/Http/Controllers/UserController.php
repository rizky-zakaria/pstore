<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Gate::allows('isAdmin')) {
            return redirect('/home');
        }
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
        $data = Produk::all();
        return view('landing.index', compact('data', 'total'));
    }

    public function android()
    {
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
        $data = DB::table('produks')
            ->where('kategori', 'android')->get();
       
        return view('landing.index', compact('data', 'total'));
    }

    public function ios()
    {
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
        $data = DB::table('produks')
        ->where('kategori', 'ios')->get();
        
        return view('landing.index', compact('data', 'total'));
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

    public function cari(Request $request)
    {

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
        $data = DB::select("SELECT * FROM produks WHERE nama like '%$request->nama%'");
        if($data != null){
            Alert::success('Barhasil', 'Data ditemukan');
        }else{
            Alert::warning('Kosong', 'Data tidak ditemukan');
        }
        return view('landing.index', compact('data', 'total'));
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
