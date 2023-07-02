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
                            <td><strong>Status :</strong> <td>
                                @if ($resep->status == 0)
                                <span class="badge badge-warning">Pending</span>  
                                @elseif ($resep->status == 1)
                                <span class="badge badge-success">Ready</span>
                                @elseif ($resep->status == 2)
                                <span class="badge badge-info">Validated</span>
                            @endif
                            </td>
                           
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
                            <td><strong>Dokter </strong></td>
                            <td>: {{ $resep->dokter->username}}</td>
                            @if ($resep->status == 2)
                                <td><strong>Kasir :</strong></td>
                                <td>: {{ $resep->kasir->username}}</td>
                            @endif  
                        </tr>
                    </tbody>
                </table><br>
                <table border="1" class="table table-striped">
                    <tr>
                      <th>No</th>
                      <th>Nama Obat</th>
                      <th>Harga @</th>
                      <th>Qty</th>
                      <th>Jumlah</th>
                    </tr>
                    <tr>
                      <td>1</td>
                      <td>{{ $resep->obat->nama }}</td>
                      <td>{{ $resep->obat->harga }}</td>
                      <td>{{ $resep->qty }}</td>
                      <td>{{ $resep->jumlah }}</td>
                    </tr>
                    <tr>
                      <td colspan="4">Total</td>
                      <td>{{ $total }}</td>
                    </tr>
                  </table>
                  <br>
                @if ($resep->status == 1)
                <form action="{{ route("resep.validasi", $resep->id)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-gradient-info btn-rounded btn-fw" name="status" value="2" style="width:100%">Validasi</button>
                </form>
            @endif
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
