@extends('layouts.base')
@section('layout')
    @include('components.header', ['is_login' => $is_login])

    <!-- コンテンツ部分 -->
    @yield('content')

    <!-- フッター -->
    @include('components.footer')
@endsection