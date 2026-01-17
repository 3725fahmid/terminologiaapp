@extends('layouts.app')

@section('title', 'Page Not Found')

@section('admin')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center bg-light">

    <!-- BIG ERROR NUMBER -->
    <h1 class="display-1 fw-bold text-danger mb-3">404</h1>

    <!-- MESSAGE -->
    <h3 class="fw-bold mb-3">Oops! Page Not Found</h3>
    <p class="text-muted mb-4">
        The page you are looking for does not exist.<br>
        It might have been removed, renamed, or is temporarily unavailable.
    </p>

    <!-- ACTION BUTTONS -->
    <div class="d-flex gap-2 justify-content-center flex-wrap">
        <a href="{{ route('home') }}" class="btn btn-primary btn-lg">
            Go Home
        </a>
        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg">
            Go Back
        </a>
    </div>

    <!-- ILLUSTRATION -->
    <div class="mt-5">
        <img src="https://cdn-icons-png.flaticon.com/512/3050/3050740.png" 
             alt="404 Illustration" 
             class="img-fluid" 
             style="max-width: 300px; opacity: .6;">
    </div>

</div>

@endsection
