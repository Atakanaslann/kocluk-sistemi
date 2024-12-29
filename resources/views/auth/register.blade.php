@extends('layouts/blankLayout')

@section('title', 'Register Basic - Pages')

@section('page-style')
<!-- Page -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-auth.css')}}">
@endsection


@section('content')
<div class="position-relative">
  <div class="authentication-wrapper authentication-basic container-p-y">
    <div class="authentication-inner py-4">

      <!-- Register Card -->
      <div class="card p-2">
        <!-- Logo -->
        <div class="app-brand justify-content-center mt-5">
          <a href="{{url('/')}}" class="app-brand-link gap-2">
            <span class="app-brand-logo demo">@include('_partials.macros',["height"=>20])</span>
            <span class="app-brand-text demo text-heading fw-semibold">{{ config('variables.templateName') }}</span>
          </a>
        </div>
        <!-- /Logo -->
        <div class="card-body mt-2">
          <h4 class="mb-2">Hesap Oluştur 🚀</h4>

          <form class="mb-3" action="{{ url('register_post') }}" method="POST">
            @csrf
            <div class="form-floating form-floating-outline mb-3">
                <input type="text" class="form-control" name="name" placeholder="Enter your username" value="{{old('name')}}">
                <label for="username">Kullanıcı Adı</label>
            </div>
            <div class="form-floating form-floating-outline mb-3">
                <input type="email" class="form-control" value="{{old('email')}}" name="email" placeholder="Email">
                <label for="email">Email</label>
            </div>
            <div class="mb-3 form-password-toggle">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <input type="password" value="{{old('password')}}" class="form-control" name="password" placeholder="Şifre">
                        <label for="password">Şifre</label>
                    </div>
                </div>
            </div>
            <div class="row">
              <br>
              <select class="selectbox" name="role" required>
                <option value="">Role Seç</optiom>
                <option {{old('role') == '2' ? 'selected' : ''}} value="2">Öğrenci</optiom>
                <option {{old('role') == '1' ? 'selected' : ''}} value="1">Koç</optiom>
                <option {{old('role') == '0' ? 'selected' : ''}} value="0">Admin</optiom>
              </select>
              <br><br>
            </div>
            <br>
            <button class="btn btn-primary d-grid w-100">Üye Ol</button>
        </form>
        

          <p class="text-center">
            <span>Zaten Bir Hesabım Var?</span>
            <a href="{{url('login')}}">
              <span>Oturum Aç</span>
            </a>
          </p>
        </div>
      </div>
      <!-- Register Card -->
      <img src="{{asset('assets/img/illustrations/tree-3.png')}}" alt="auth-tree" class="authentication-image-object-left d-none d-lg-block">
      <img src="{{asset('assets/img/illustrations/auth-basic-mask-light.png')}}" class="authentication-image d-none d-lg-block" alt="triangle-bg">
      <img src="{{asset('assets/img/illustrations/tree.png')}}" alt="auth-tree" class="authentication-image-object-right d-none d-lg-block">
    </div>
  </div>
</div>
@endsection