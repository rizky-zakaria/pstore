@extends('templates.admin')
@section('content')
<div class="col-11 m-3">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tabel Transaksi</h6>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nama Pembeli</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Jumlah Bayar</th>
                        <th scope="col">Status</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $key => $value)
                    <tr>
                        <td>{{ $value->user->name }}</td>
                        <td> {{ $value->produk->nama }} </td>
                        <td> {{ "Rp " . number_format($value->total,2,',','.') }} </td>
                        <td>{{ $value->status }}</td>
                        <td>
                            @if($value->status === 'keranjang')
                            <a class="btn btn-secondary disabled">Menunggu</a>
                            @elseif($value->status === 'selesai')
                            <a class="btn btn-success disabled"><i class="fa fa-check"></i></a>
                            @else
                            <a class="btn btn-primary" href=" {{ url('admin/transaksi/status/'.$value->id) }} ">Konfirmasi</a>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
