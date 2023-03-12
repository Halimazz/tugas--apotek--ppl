@extends( $admin )

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
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque ab dolorem sapiente ullam totam placeat saepe laudantium amet reprehenderit culpa maiores, laboriosam molestiae quas unde, reiciendis nesciunt vel. Adipisci, excepturi.
                </p>
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