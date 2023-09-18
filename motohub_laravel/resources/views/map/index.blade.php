@extends('layouts.app')
@section('title', '- '.trans('messages.motorcycles'))
@section('content')
<h1 class='text-center'>{{ trans('messages.motohubMap') }}</h1>
<div class="map">
    <div id="map" class='map-leaflet'></div>
    <script src='https://unpkg.com/leaflet@1.8.0/dist/leaflet.js' crossorigin=''></script>
    <script>
    var jsonData = @json($markers);
    localStorage.setItem('markers', JSON.stringify(jsonData));
    </script>
    <script src="{{ asset('js/leaflet.js') }}"></script>
</div>
@endsection