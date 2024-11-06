@extends('example.layouts.default.baseof')
@section('main')
@vite(['resources/css/app.css','resources/js/app.js'])
    @include('example.layouts.partials.navbar-dashboard')
@endsection
