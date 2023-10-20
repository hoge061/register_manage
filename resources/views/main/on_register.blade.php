@extends('layouts.hpcreate003')
@section('head')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection
@section('main')
オンライン登録ページ
{{-- @livewire('counter') --}}
@livewire('real-valid')
@endsection