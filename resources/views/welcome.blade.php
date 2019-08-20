@extends('layout')
@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
@endsection
@section('content')
    <div id="app">
        <bulma-nav-bar>
            <i slot="home-button-img" class="material-icons">home</i>
        </bulma-nav-bar>
        <router-view></router-view>
    </div>
@endsection
@section('scripts')
    <script src="/js/app.js"></script>
@endsection