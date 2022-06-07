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
            @foreach($data as $key => $value)
            <div class="col-sm-6 col-md-4 col-lg-4">
                <div class="box">
                    <div class="option_container">
                        <div class="options">
                            @if($value->status === "selesai")
                            <a href="" class="btn btn-success disabled">
                                Berhasil
                            </a>
                            @elseif($value->status === "keranjang")
                            <a href="" class="btn btn-warning disabled">
                                Dikeranjang
                            </a>
                            @else
                            <a href="" class="btn btn-danger disabled">
                                Segera Dibayar
                            </a>
                            @endif
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
                            {{ "Rp " . number_format($value->total,2,',','.') }}


                        </h6>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        {{-- <div class="btn-box">
            <a href="">
                View All products
            </a>
        </div> --}}
    </div>
</section>


@endsection
