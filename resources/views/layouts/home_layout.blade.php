@extends('layouts.base')
@section('layout')
    @include('components.home_header')

    <!-- コンテンツ部分 -->
    @yield('content')

    <!-- フッター -->
    @include('components.home_footer')
@endsection