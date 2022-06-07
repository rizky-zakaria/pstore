@extends('templates.admin')
@section('content')
<div class="container mt-2">
    <form class="row g-3" action=" {{ url('admin/produk/update') }} " method="POST">
        @csrf
        <div class="col-md-6">
            <label for="nama" class="form-label">Model Smartphone</label>
            <input type="text" class="form-control" id="nama" name="nama" value=" {{ $data->nama }} ">
            <input type="hidden" class="form-control" id="nama" name="id" value=" {{ $data->id }} ">
        </div>
        <div class="col-md-6">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value=" {{ $data->merk }} ">

        </div>
        <div class="col-12">
            <select class="form-select" aria-label="Default select example" name="kategori">
                <option selected>Pilih Kategori</option>
                <option value="Android">Android</option>
                <option value="IOS">IOS</option>
            </select>
        </div>
        <div class="col-12">
            <div class="form-floating">
                <textarea class="form-control" name="deskripsi" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px" value=" {{ $data->deskripsi }} "></textarea>

                <label for="floatingTextarea2">Deskripsi</label>
            </div>
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Harga</label>
            <input type="number" class="form-control" id="inputCity" name="harga" value=" {{ $data->harga }} ">

        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">Stok</label>
            <input type="number" class="form-control" id="inputCity" name="stok" value=" {{ $data->stok }} ">

        </div>
        <div class="col-md-12">
            <label for="gambar" class="form-label">Link Gambar</label>
            <input type="text" class="form-control" id="gambar" name="gambar" value=" {{ $data->gambar }} ">

        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
</div>
@endsection
