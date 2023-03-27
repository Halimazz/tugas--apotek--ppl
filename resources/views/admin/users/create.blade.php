@extends($admin)

@section('css-library')
@endsection

@section('css-custom')
@endsection

@section('content')
    {{-- Tempat Ngoding isi web --}}
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
          <div class="card-header">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="card-title">{{ $page }}</h5>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url('admin/users') }}" class="btn btn-sm btn-primary float-end">Kembali</a>
                </div>
            </div>
        </div>
            {{-- otomatis masuk ke admin/daerah , karena pake resource --}}
            <form action="{{ url('admin/users') }}" method="POST">
                {{-- csrf gunanya buat pastiin kalo data dari form. sejenis security --}}
                @csrf 
                {{-- <input type="text" name="e" >
                <input type="submit" > --}}

                <div class="card-body">
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="username">Username</label>
                        <input name="username" id="username" class="form-control" type="text" placeholder="username">
                    </div>
                    <div class="mb-3">
                        <label class="col-form-label pt-0" for="password">Password</label>
                        <input name="password" id="password" class="form-control" type="password" placeholder="password">
                    </div>
                    <div class="mb-2">
                        <div class="col-form-label">Hak Akses</div>
                        <select class="form-control form-control-lg" id="exampleFormControlSelect1" name="idRole" required>
                        {{-- <select id="select-role" class="js-example-basic-single col-sm-12" name="idRole" required> --}}
                            <option value="">Pilih</option>
                            @foreach ($userRole as $role)
                                <option value="{{ $role->id }}">{{ $role->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    
                    <div class="form-check">
                        <label class="col-form-label pt-0" for="exampleInputEmail1">Status</label><br>
                        <input class="form-check-input" id="invalidCheck" type="checkbox" name="status" value="1" style="height: 20px; width: 20px;" required="">
                        <label class="form-check-label">Aktif</label>
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
@endsection
@section('js-custom')