{{-- Extends layout --}}
@extends('layout.fullwidth')



{{-- Content --}}
@section('content')
	<div class="col-md-6">
      <div class="authincation-content">
          <div class="row no-gutters">
              <div class="col-xl-12">
                  <div class="auth-form">
                      <div class="text-center mb-3" style="max-width:100%; background-color:aqua;">
                        <a href="{!! url('/index'); !!}"><img  src="{{ asset('images/KECO-logo.jpg') }}" style="max-width:100%;" alt="yes"></a>
                      </div>
                      <h4 class="text-center mb-4">Sign into your account</h4>
                      <form method="POST" action="{!! url('/login'); !!}">
                        @csrf
                          <div class="form-group">
                              <label class="mb-1"><strong>Email</strong></label>
                              <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                          </div>
                          <div class="form-group">
                              <label class="mb-1"><strong>Password</strong></label>
                              <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror      
                          </div>
                          <div class="form-row d-flex justify-content-between mt-4 mb-2">
                              <div class="form-group">
                                 <div class="custom-control custom-checkbox ml-1">
                                    <input type="checkbox" class="custom-control-input" id="basic_checkbox_1">
                                    <label class="custom-control-label" for="basic_checkbox_1">Remember me</label>
                                </div>
                              </div>
                          </div>
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
@endsection