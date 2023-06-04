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
            {{-- otomatis masuk karena pake resource --}}
            <div class="card-body table-responsive">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><strong>Nama Pasien</strong></td>
                            <td>:{{ $resep->nama_pasien }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>No Telfon</strong></td>
                            <td>:{{ $resep->no_telp }}</td>
                            <td><strong>Obat</strong></td>
                            <td>{{ $resep->obat->nama }}</td>
                        </tr>   
                        <tr>
                            <td><strong>Dosis</strong></td>
                            <td>:{{ $resep->dosis->nama}}</td>
                            <td><strong>Waktu</strong></td>
                            <td>:{{ $resep->waktu->nama }}</td>
                        </tr>
                        <tr>
                            <td><strong>Dokter</strong></td>
                            {{-- <td>:{{ $resep->dokter->user}}</td>  --}}
                            
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js-library')
    {{-- Tempat Ngoding Meletakkan js library --}}
@endsection

@section('js-custom')
    {{-- Tempat Ngoding Meletakkan js custom --}}
@endsection
