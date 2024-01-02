@extends('layout')
@section('title', "home page")
@section('content')
    @auth
    {{ csrf_field() }}
    {{var_dump(Auth::check())}} - 
    hello {{auth()->user()->name}}
    @endauth
@endsection