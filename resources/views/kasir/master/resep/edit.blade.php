@extends($kasir)

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
                            <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                            <input name="nama_pasien" id="nama" class="form-control" type="text" placeholder="Nama Pasien" value="{{ $resep->nama_pasien }}" required>
                            <label class="col-form-label pt-0" for="no_telp">Nomor telfon</label>
                            <input name="no_telp" id="no_telp" class="form-control" type="tel" placeholder="Nomor telfon" value="{{ $resep->no_telp }}"required>
                        </div>
                        <div class="mb-3" >
                            <div class="col-form-label">Obat</div>
                            <select id="select-obat" class="form-control" name="idMObat"  required>
                                <option value="{{ $resep->obat->id }}" > {{ $resep->obat->nama }}</option>
                                @foreach ($obat as $p)
                                    @if ($p->id == $resep->obat->id)
                                        <option value="{{ $p->id }}" selected>{{ $p->nama }}</option>
                                    @endif
                                    
                                @endforeach
                                
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <div class="col-form-label">Dosis</div>
                            <select id="select-dosis" class="form-control" name="idMDosis" required>
                                @foreach ($dosis as $p)
                                <option value="{{ $p->id }}" selected >{{ $p->nama }}</option>
                                    @if ($p->id != $p->id)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>
                        <div class="mb-3">
                            <div class="col-form-label">Waktu</div>
                            <select id="select-waktu" class="form-control" name="idMWaktu" required>
                                @foreach ($waktu as $p)
                                <option value="{{ $p->id }}" selected >{{ $p->nama }}</option>
                                    @if ($p->id != $p->id)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endif
                                @endforeach
                            </select>
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
