@extends('templates.admin')
@section('content')
<div class="card mt-5" style="margin-left: 25px; margin-right: 25px">
    <div class="card-body">
        Selamat Datang, <b>{{ Auth::user()->name }}</b>
    </div>
</div>
@endsection
