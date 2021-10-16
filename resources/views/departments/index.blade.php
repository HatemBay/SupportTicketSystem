@extends('layouts.main')
@section('content')
    <div id="app">
        {{-- <example-component></example-component> --}}
        {{-- <depts-index></depts-index> --}}
        <router-view></router-view>
    </div>
@endsection
