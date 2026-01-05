@extends('backEnd.layouts.master') 
@section('title','Payment Gateway')
@section('css')
<style>
  .increment_btn,
  .remove_btn {
    margin-top: -17px;
    margin-bottom: 10px;
  }
</style>
<link href="{{asset('public/backEnd')}}/assets/libs/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
<link href="{{asset('public/backEnd')}}/assets/libs/summernote/summernote-lite.min.css" rel="stylesheet" type="text/css" />
@endsection @section('content')
<div class="container-fluid">
  <!-- start page title -->
  <div class="row">
    <div class="col-12">
      <div class="page-title-box">
        <h4 class="page-title">Bkash</h4>
      </div>
    </div>
  </div>
  <!-- end page title -->
  <div class="row justify-content-center">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="{{route('paymentgeteway.update')}}" method="POST" class="row" data-parsley-validate="" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{$bkash->id}}">
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="username" class="form-label">User Name *</label>
                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $bkash->username}}" id="username" required="" />
                @error('username')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="app_key" class="form-label">App Key *</label>
                <input type="text" class="form-control @error('app_key') is-invalid @enderror" name="app_key" value="{{ $bkash->app_key }}" id="app_key" required="" />
                @error('app_key')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="app_secret" class="form-label">App Secret *</label>
                <input type="text" class="form-control @error('app_secret') is-invalid @enderror" name="app_secret" value="{{ $bkash->app_secret }}" id="app_secret" required="" />
                @error('app_secret')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="base_url" class="form-label">Base Url *</label>
                <input type="text" class="form-control @error('base_url') is-invalid @enderror" name="base_url" value="{{ $bkash->base_url }}" id="base_url" required="" />
                @error('base_url')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-4">
              <div class="form-group mb-3">
                <label for="password" class="form-label">Password *</label>
                <input type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $bkash->password }}" id="password" required="" />
                @error('password')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col-end -->
            <div class="col-sm-3 mb-3">
              <div class="form-group">
                <label for="status" class="d-block">Status</label>
                <label class="switch">
                  <input type="checkbox" value="1" @if($bkash->status==1)checked @endif name="status" />
                  <span class="slider round"></span>
                </label>
                @error('status')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
            </div>
            <!-- col end -->

            <div>
              <input type="submit" class="btn btn-success" value="Submit" />
            </div>
          </form>
        </div>
        <!-- end card-body-->
      </div>
      <!-- end card-->
    </div>
    <!-- end col-->
  </div>
  <!-------------new-start------------>
  
  
<div class="card mt-4">
  <div class="card-body">
    <h4 class="page-title">Moyna Pay</h4>

    <form action="{{ route('paymentgeteway.update') }}" method="POST">
      @csrf
      <input type="hidden" name="id" value="{{ $moynapay->id ?? '' }}">
      <input type="hidden" name="type" value="moynapay">

      <div class="row">
        <div class="col-sm-6">
          <div class="form-group mb-3">
            <label for="app_key" class="form-label">Brand Key *</label>
            <input type="text" class="form-control" name="app_key"
                   value="{{ $moynapay->app_key ?? '' }}" required>
          </div>
        </div>

        <div class="col-sm-6">
          <div class="form-group mb-3">
            <label for="base_url" class="form-label">Base Url *</label>
            <input type="text" class="form-control" name="base_url"
                   value="{{ $moynapay->base_url ?? 'https://pay.moynapay.com/api' }}" required>
          </div>
        </div>

        <div class="col-sm-3 mb-3">
          <div class="form-group">
            <label>Status</label><br>
            <label class="switch">
              <input type="checkbox" value="1" name="status"
                     @if(isset($moynapay) && $moynapay->status==1) checked @endif>
              <span class="slider round"></span>
            </label>
          </div>
        </div>
      </div>

      <div class="mt-3 d-flex gap-2">
    <button type="submit" class="btn btn-success">Save MoynaPay</button>

    <a href="https://www.moynapay.com" target="_blank" class="btn btn-primary">
        Buy Plan
    </a>
</div>
    </form>

  </div>
</div>


  <!-- start page title -->
 
  

@endsection @section('script')
<script src="{{asset('public/backEnd/')}}/assets/libs/parsleyjs/parsley.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-validation.init.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/libs/select2/js/select2.min.js"></script>
<script src="{{asset('public/backEnd/')}}/assets/js/pages/form-advanced.init.js"></script>
<!-- Plugins js -->
<script src="{{asset('public/backEnd/')}}/assets/libs//summernote/summernote-lite.min.js"></script>
<script>
  $(".summernote").summernote({
    placeholder: "Enter Your Text Here",
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".btn-increment").click(function () {
      var html = $(".clone").html();
      $(".increment").after(html);
    });
    $("body").on("click", ".btn-danger", function () {
      $(this).parents(".control-group").remove();
    });
  });
</script>
<script type="text/javascript">
  $(document).ready(function () {
    $(".increment_btn").click(function () {
      var html = $(".clone_price").html();
      $(".increment_price").after(html);
    });
    $("body").on("click", ".remove_btn", function () {
      $(this).parents(".increment_control").remove();
    });

    $(".select2").select2();
  });
</script>
@endsection