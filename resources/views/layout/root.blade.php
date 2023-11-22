<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="{{ asset('assets/images/pelindo-logo.png') }}">
        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>MySpareLog | @yield('title')</title>

        <!-- Bootstrap core CSS -->
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{asset('assets/css/fontawesome.css') }}">
        <link rel="stylesheet" href="{{asset('front/css/bootstrap.min.css')}}">
        <!-- <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}"> -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    </head>
    
    @yield('body')
    <script src="{{asset('front/js/bootstrap.bundle.min.js')}}"></script>
</html>