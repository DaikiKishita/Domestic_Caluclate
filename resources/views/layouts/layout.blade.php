@extends('layouts.base')
@section('layout')
    @if (isset($is_login))
        @include('components.header', ['is_login' => $is_login])
    @else
        @include('components.header')
    @endif

    <!-- コンテンツ部分 -->
    @yield('content')

    <!-- フッター -->
    @include('components.footer')
@endsection