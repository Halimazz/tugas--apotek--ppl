@extends( $dokter )

@section('css-library')
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
            <div class="card-body">
                <h1>Selamat Datang Kembali dr.{{ session()->get('username') }},Semoga Harimu Menyenangkan </h1>
            </div>
        </div>
    </div>
</div>
  @endsection
  
  @section('js-library')
  @endsection
  
  @section('js-custom')
  <script>
      $(function() {
          
      });
  </script>
  @endsection