@extends('templates.user')
@section('content')
<section class="product_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                Our <span>products</span>
            </h2>
        </div>
        <div class="row">
            @if($data !== null)
            @foreach($data as $key => $value)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            <form method="POST" action="{{ route('keranjang.store') }}">
                                @csrf
                                <input type="hidden" value="{{ $value->id }}" name="produk_id" />
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                                <input type="hidden" value="{{ $value->harga }}" name="harga" />
                                <input type="submit" class="btn btn-warning" value="Masukan Keranjang">
                            </form>
                            <form method="POST" action="{{ route('transaksi.store') }}">
                                @csrf
                                <input type="hidden" value="{{ $value->id }}" name="produk_id" />
                                <input type="hidden" value="{{ Auth::user()->id }}" name="user_id" />
                                <input type="hidden" value="{{ $value->harga }}" name="harga" />
                                <input type="submit" class="btn btn-success mt-2" value="Pesan Sekarang">
                            </form>
                        </div>
                    </div>
                    <div class="img-box">
                        <img src="{{ $value->gambar }}" alt="">
                    </div>
                    <div class="detail-box">
                        <h5>
                            {{ $value->nama }}
                        </h5>
                        <h6>
                            {{ "Rp " . number_format($value->harga,2,',','.') }}
                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <span>
                Data Tidak Tersedia
            </span>
            @endif

        </div>
        {{-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> --}}
    </div>
</section>


@endsection
