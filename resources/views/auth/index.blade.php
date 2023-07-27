@extends( 'auth.layout.main' )

@section('css-library')
@endsection

@section('css-custom')
    
@endsection
@section('content')
<div class="row flex-grow">
    <div class="col-lg-4 mx-auto">
      <div class="auth-form-light text-left p-5">
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
        <div class="brand-logo">
          <img src="{{ url('') }}/assets/images/apotik.png">
        </div>
        <h4>Hello! Selamat Bekerja</h4>
        <h6 class="font-weight-light">Sign in to continue.</h6>
        <form class="pt-3" action="{{ url('loginProses', []) }}" method="post">
            @csrf
          <div class="form-group">
            <input type="text" class="form-control form-control-lg" name="username" id="exampleInputEmail1" placeholder="Username">
          </div>
          <div class="form-group">
            <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" name="password" placeholder="Password">
          </div>
          <div class="mt-3">
            <button type="submit" class="btn btn-primary btn-block w-100">Login</button>
          </div>
        </form>
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