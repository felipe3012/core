@extends('layouts.login')
@section('title')
@section('content')
{!! Form::open(['route'=>'auth/login','method'=>'post','name'=>'frm','id'=>'frm','role'=>'form','data-toggle'=>'validator','class'=>"form-horizontal form-material", 'id'=>"loginform" ])!!}
   <div style="text-align: center;">{!!Html::image('theme/plugins/images/logos/7.jpg',null,['width'=>'200'])!!}
      @include('forms.form_login')
       {!! Form::close() !!}
         {!! Form::open(['url'=>'password/email','method'=>'post','id'=>"recoverform",'class'=>'form-horizontal']) !!}
      @include('forms.form_rescue')
  {!! Form::close() !!}
@stop
