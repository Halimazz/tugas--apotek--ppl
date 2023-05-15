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
                <table id="basic-1" class="display">
                    <tbody>
                        <tr>
                            <td><strong>Nama Obat</strong></td>
                            <td>:{{ $obat->nama }}</td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td><strong>Stok</strong></td>
                            <td>:{{ $obat->stok }}</td>
                            <td><strong>Harga</strong></td>
                            <td>:Rp.{{ $obat->harga }}</td>
                        </tr>   
                        <tr>
                            <td><strong>Expired</strong></td>
                            <td>:{{ $obat->tanggal_kadaluarsa}}</td>
                            <td><strong>Production date</strong></td>
                            <td>:{{ $obat->tanggal_produksi }}</td>
                        </tr>
                        <tr>
                            <td><strong>Pabrik</strong></td>
                            <td>:{{ $obat->pabrik }}</td>
                            
                        </tr>
                        <tr>
                            <td><strong>Alamat Pabrik</strong></td>
                            <td>:{{ $obat->alamat_pabrik }}</td>

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
