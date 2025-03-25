@extends('layouts.base')
@section('layout')
    @include('components.header')

    <!-- コンテンツ部分 -->
    @yield('content')

    <!-- フッター -->
    @include('components.footer')
@endsection