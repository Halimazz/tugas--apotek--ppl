@extends($apoteker)

@section('css-library')
    {{-- Tempat Ngoding Meletakkan css library --}}
@endsection

@section('css-custom')
    {{-- Tempat Ngoding Meletakkan css custom --}}
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
    <div class="col-sm-12 pt-4">
        @if (session()->has('sukses'))
            <div class="alert alert-success" role="alert">
                {{ session('sukses') }}
            </div>
        @elseif (session()->has('gagal'))
            <div class="alert alert-danger" role="alert">
                {{ session('gagal') }}
            </div>
        @endif
    <div class="col-sm-12 pt-4">
        <div class="card">
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url("$url") }}" class="btn btn-sm btn-primary float-end">Kembali</a>
                </div>
            </div>
          </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url("$url") }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}
                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="nama">Nama Obat</label>
                        <input name="nama" id="nama" class="form-control" type="text" placeholder="Nama Obat" required>
                        <label class="col-form-label pt-0" for="nama">Stok</label>
                        <input name="stok" id="nama" class="form-control" type="number" placeholder="Stok" required>
                        <label class="col-form-label pt-0" for="nama">Harga</label>
                        <input name="harga" id="nama" class="form-control" type="number"  placeholder="Harga" required>
                        <label class="col-form-label pt-0" for="nama">Expired</label>
                        <input name="tanggal_kadaluarsa" id="nama" class="form-control" type="date" placeholder="Expired" required>
                        <label class="col-form-label pt-0" for="nama">Production Date</label>
                        <input name="tanggal_produksi" id="nama" class="form-control" type="date" placeholder="Production Date" required>
                        <label class="col-form-label pt-0" for="nama">Pabrik</label>
                        <input name="pabrik" id="nama" class="form-control" type="text" placeholder="Pabrik" required>
                        <label class="col-form-label pt-0" for="nama">Alamat Pabrik</label>
                        <input name="alamat_pabrik" id="nama" class="form-control" type="textarea" placeholder="Alamat Pabrik" required>
                    </div>
                </div>
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Simpan">
                    <input type="reset" class="btn btn-secondary" value="Cancel">
                </div>
            </form>
        </div>
    </div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
@endsection
