@extends($admin)

@section('css-library')
@endsection

@section('css-custom')
@endsection

@section('content')
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
      <form action="{{ url("admin/users/update")}}" method="post">
          @csrf
          @method('PUT')
          <div class="card-body">
              <div class="form-group">
                  <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $users->id }}">
                  <div class="mb-3">
                      <label class="col-form-label pt-0" for="nama">Username</label>
                      <input name="username" id="username" class="form-control" type="text" value="{{ $users->username }}">
                  </div>
                  <div class="mb-3">
                      <div class="form-group">
                          <label>Hak Akses</label>
                          <input name="idRole" id="idRole" class="form-control" type="text" value="{{ $users->role->nama }}" disabled>
                      </div>
                  </div>
                  <div class="mb-3">
                      <label class="col-form-label pt-0" for="nama">Password</label>
                      <input name="password" id="password" class="form-control" type="password" placeholder="Masukkan Password">
                  </div>
                  <div class="mb-3">
                      <label class="col-form-label pt-0" for="nama">Verifikasi Password</label>
                      <input name="verifikasi" id="password" class="form-control" type="password" placeholder="Masukkan Ulang Password">
                  </div>
              </div>
                  <div class="form-group mt-3">
                      <input type="submit" class="btn btn-primary" value="Simpan">
                  </div>
              </div>
          </div>
      </form>
  </div>
</div>
@endsection

@section('js-library')
@endsection

@section('js-custom')
@endsection