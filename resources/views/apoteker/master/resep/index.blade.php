@extends( $apoteker )

@section('css-library')
{{-- <link rel="stylesheet" type="text/css" href="{{ url('') }}/assets/css/vendors/datatables.css"> --}}
@endsection

@section('css-custom')
    
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-12 pt-4">
            <!-- Alerts-->
            @if (session()->has('sukses'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @elseif (session()->has('gagal'))
            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                {{ session('gagal') }}
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <!-- End of Alerts-->
            <div class="card">
                <div class="card-header p-3">
                    <div class="row">
                        <div class="col-lg-6">
                            <h5 class="card-title">{{ $title }}</h5>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table id="basic-1" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama Pasien</th>
                                <th>Nomer telfon</th>
                                <th>Obat</th>
                                <th>Dosis</th>
                                <th>Waktu</th>
                                <th>Dokter</th>
                                <th>Status</th>
                                <th><center>Action</center></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($resep as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama_pasien }}</td>
                                    <td>{{ $p->no_telp }}</td>
                                    <td>{{ $p->obat->nama }}</td>
                                    <td>{{ $p->dosis->nama }}</td>
                                    <td>{{ $p->waktu->nama }}</td>
                                    <td></td>
                                    <td>
                                        @if ($p->status == 0)
                                        <span class="badge badge-warning">Pending</span>  
                                        @elseif ($p->status == 1)
                                        <span class="badge badge-success">Ready</span>
                                        @elseif ($p->status == 2)
                                        <span class="badge badge-info">Validated</span>
                                    @endif
                                   
                                    <td>
                                    <div class="btn-group btn-group-square" role="group" aria-label="">
                                            <a href="{{ url("$url/" . $p->id, []) }}" class="btn btn-dark" title="Detail Data">Detail</a>
                                            <a href="{{ url("$url/" . $p->id, []) }}/edit" class="btn btn-primary" title="Ubah Data">Edit</a>
                                            {{-- <a href="{{ route('dosis.destroy', ['id' => $p->id]) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $p->id }}').submit();" class="btn btn-danger" title="Hapus Data">Hapus</a> --}}
                                            {{-- <form id="delete-form-{{ $p->id }}" action="{{ route('merk.destroy', ['id' => $p->id]) }}" method="POST" style="display: none;">@csrf</form> --}}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js-library')
{{-- <script src="{{ url('') }}/assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
<script src="{{ url('') }}/assets/js/datatable/datatables/datatable.custom.js"></script> --}}
@endsection

@section('js-custom')
{{-- <script>
    $(function() {
        // DataTable
        $('#datatable').DataTable();
    });
</script> --}}
@endsection