@extends('templates.user')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row">
        <div class="col-md-3">
            <img src="http://assets.stickpng.com/images/585e4bf3cb11b227491c339a.png" style="width: 200px" />
        </div>
        <div class="col-md-1 mt-3">
            <span><b>Nama :</b></span>
            <span><b>Email :</b></span>
            <span><b>Role :</b></span>
        </div>
        <div class="col mt-3">
            <span>{{ Auth::user()->name }}</span></br>
            <span> {{Auth::user()->email}} </span></br>
            <span> {{Auth::user()->role}} </span>
        </div>
    </div>
</div>


@endsection
