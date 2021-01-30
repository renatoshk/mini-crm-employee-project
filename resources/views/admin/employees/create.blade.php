@extends('layouts.admin.index')
@section('content')
<div class="content-wrapper" style="min-height: 1200.88px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Employee</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employees</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<br>
@if ( Session::has('flash_message') )
  <div class="alert {{ Session::get('flash_type', 'alert-info') }}">
      <h3>{{ Session::get('flash_message') }}</h3>
  </div>
@endif
<br>
<!-- Krijimi  e categories -->
<div class="col-sm-10">
{!!Form::open(['method'=>'POST', 'action'=>['App\Http\Controllers\AdminEmployeesController@store', app()->getLocale()]]) !!}
<div class="form-group">
  {!!Form::select('company', [''=>'Choose Company']+$companies, null, ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('name', ' Name: ')!!}
     {!!Form::text('first_name', null,  ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('lastname', 'Surname: ')!!}
     {!!Form::text('last_name', null,  ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('email', 'Email: ')!!}
     {!!Form::email('email', null,  ['class'=>'form-control'])!!}
</div>
<div class="form-group">
    <br>
    {!!Form::label('phone', 'Phone Number: ')!!}
     {!!Form::text('phone', null,  ['class'=>'form-control'])!!}
</div>
<div class="form-group">
	{!!Form::submit('Create', ['class'=>'btn btn-primary col-sm-7'])!!}
</div>
{!!Form::close()!!}
<!-- Krijimi e categories -->
  <!-- /.content -->
</div>
  </div>

@stop