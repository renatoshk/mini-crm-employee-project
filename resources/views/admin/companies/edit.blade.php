@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Company</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Companies</li>
            </ol>
          </div> 
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-success') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<!-- Krijimi  e categories -->
<div class="col-md-10">
{!!Form::model($company, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\AdminCompaniesController@update',app()->getLocale(),$company->id],'files'=>'true']) !!}
 <div class="col-lg-4  text-center">
     <img src="/logo/{{$company->logo}}" class="mx-auto img-fluid d-block" alt="avatar">
  </div>
<label for="name">Company's name</label>
<div class="form-group">
       <div class="col-md-6">
        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$company->name}}" required autocomplete="name" autofocus>
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<label for="email">Company's email</label>
<div class="form-group">
       <div class="col-md-6">
        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$company->email}}" required autocomplete="email" autofocus>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<label for="website">Company's website</label>
<div class="form-group">
       <div class="col-md-6">
        <input id="website" type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{$company->website}}" required autocomplete="website" autofocus>
        @error('website')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
  <label for="logo">Company's logo</label>
  <div class="form-group"  id="prop-files-uploader">
      {!!Form::file('logo', null, ['class'=>'form-control'])!!}
  </div>
  <div class="form-group row mb-0">
      <div class="col-md-10 ">
          <button type="submit" class="btn btn-primary">
              {{ __('Edit Company') }}
          </button>
      </div>
  </div>
{!!Form::close()!!} 
<!-- Krijimi e categories -->
  <!-- /.content -->
</div>
  </div>
@stop