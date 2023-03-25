@extends($admin)

@section('css-library')
@endsection

@section('css-custom')
@endsection

@section('content')
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header"><div class="row">
                <div class="col-lg-6">
                    <h4 class="card-title">{{ $page }}</h4>
                </div>
                <div class="col-lg-6">
                    <a href="{{ url("$url") }}" class="btn btn-sm btn-primary float-end">Kembali</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <form class="forms-sample"  action="{{ url('admin/role') }}/{{ $id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="hidden" id="i-nama" class="form-control" name="id" value="{{ $userRole->id }}">
                        <label for="exampleInputName1">Nama Role</label>
                        <input type="text" class="form-control" id="name" name="nama" value="{{ $userRole->nama }}">
                    </div>
                    <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                    <button type="reset" class="btn btn-">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('js-library')
@endsection

@section('js-custom')
@endsection