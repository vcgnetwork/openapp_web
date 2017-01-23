@extends('layouts.default')
@section('content')
    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="title is-1">Hello, search for a city by zipcode</div>
                @include('shared.searchBar')
            </div>
        </div>
    </section>
@endsection