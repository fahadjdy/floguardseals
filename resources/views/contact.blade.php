@extends('layouts.base')

@section('title', 'Home | '.$profile->name)

@section('content')
    
    <!-- Contact Section -->
    <x-contact-form />

@endsection