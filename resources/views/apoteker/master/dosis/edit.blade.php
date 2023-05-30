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
            {{-- otomatis masuk ke admin/dosis , karena pake resource --}}
            <form action="{{ url("$url")}}/{{ $id }}" method="post">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <div class="mb-3">
                            <label class="col-form-label pt-0" for="nama">Dosis</label>
                            <input name="nama" id="nama" class="form-control" type="text" value="{{ $dosis->nama }}">
                        </div>
                    </div>
                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
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
