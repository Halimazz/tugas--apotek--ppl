@extends($dokter)

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
                        <label class="col-form-label pt-0" for="nama">Nama Pasien</label>
                        <input name="nama_pasien" id="nama" class="form-control" type="text" placeholder="Nama Pasien" required>
                        <label class="col-form-label pt-0" for="no_telp">Nomor telfon</label>
                        <input name="no_telp" id="no_telp" class="form-control" type="tel" placeholder="Nomor telfon" required>
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label">Obat</label>
                        <div class="row">
                            <div class="col">
                                <select id="select-obat" class="form-control" name="idMObat" required>
                                    <option value="">Pilih</option>
                                    @foreach ($obat as $p)
                                        <option value="{{ $p->id }}">{{ $p->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col">
                                <input type="number" class="form-control" name="qty" placeholder="Quantity" required>
                            </div>
                        </div>
                    </div>                    
                    <div class="mb-3">
                        <div class="col-form-label">Dosis</div>
                        <select id="select-dosis" class="form-control" name="idMDosis" required>
                            <option value="">Pilih</option>
                            @foreach ($dosis as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <div class="col-form-label">Waktu</div>
                        <select id="select-waktu" class="form-control" name="idMWaktu" required>
                            <option value="">Pilih</option>
                            @foreach ($waktu as $p)
                                <option value="{{ $p->id }}">{{ $p->nama }}</option>
                            @endforeach
                        </select>
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
