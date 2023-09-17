@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
@section('content')

<head>
    <style>
    .text-center {
        text-align: center;
    }

    #map {
        width: '100%';
        height: 100vh;
    }
    </style>
    <link rel='stylesheet' href='https://unpkg.com/leaflet@1.8.0/dist/leaflet.css' crossorigin='' />
</head>
<div>
    <h1 class='text-center'>Laravel Leaflet Maps</h1>
    <div id='map'></div>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
        var jsonData = @json($markers);
        localStorage.setItem('markers', JSON.stringify(jsonData));
    </script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
</div>
@endsection