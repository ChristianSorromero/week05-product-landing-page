{{--
    Home page
    All dynamic data ($features, $showcaseItems, $plans, $testimonials, $trustedBy)
    is passed down from HomeController@index — see app/Http/Controllers/HomeController.php
--}}
@extends('layouts.app')

@section('title', "Alley's — Fresh Clothes, Zero Stress")

@section('content')
    @include('sections.hero')
    @include('sections.features')
    @include('sections.showcase')
    @include('sections.pricing')
    @include('sections.testimonials')
    @include('sections.cta')
@endsection
