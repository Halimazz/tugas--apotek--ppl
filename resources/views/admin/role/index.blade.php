@extends($admin)

@section('css-library')
@endsection

@section('css-custom')
@endsection

@section('content')
    <div class="col-lg-12 grid-margin stretch-card">
        
        <!-- End of Alerts-->
        <div class="card">
            <!-- Alerts-->
            @if (session()->has('sukses'))
            <div class="alert alert-success dark alert-dismissible fade show" role="alert">
                {{ session('sukses') }}
            </div>
            @elseif (session()->has('gagal'))
            <div class="alert alert-danger dark alert-dismissible fade show" role="alert">
                {{ session('gagal') }}
            </div>
            @endif
            <div class="card-header p-3">
                <div class="row">
                    <div class="col-lg-6">
                        <h5 class="card-title">{{ $title }}</h5>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ url("$url/create", []) }}" class="btn btn-sm btn-primary float-end">Tambah Role</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-1" class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th width="5%">#</th>
                                <th>Nama</th>
                                <th width="10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($role as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $p->nama }}</td>
                                    <td>
                                        <div class="btn-group btn-group-square" role="group" aria-label="">
                                            <a href="{{ url("$url/" . $p->id, []) }}/edit" class="btn btn-primary" title="Ubah Data">Edit</a>
                                            {{-- <a href="javascript:void(0);" class="btn btn-danger" title="Hapus Data">Hapus</a> --}}
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
@endsection

@section('js-custom')
@endsection