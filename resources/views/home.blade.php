@extends('layouts.app')

@section('title', 'Prof. Md Sadiq Iqbal - Chairman, Department of Computer Science & Engineering')

@section('content')
    <!-- ==================== Start Header ==================== -->
    @include('components.header')
    <!-- ==================== End Header ==================== -->

    <!-- ==================== Start intro ==================== -->
    @include('components.about')
    <!-- ==================== End intro ==================== -->

    <!-- ==================== Start Services ==================== -->
    @include('components.research')
    <!-- ==================== End Services ==================== -->

    <!-- ==================== Start feat ==================== -->
    @include('components.events')
    <!-- ==================== End feat ==================== -->

    <!-- ==================== Start Services ==================== -->
    @include('components.achievements')
    <!-- ==================== End Services ==================== -->

    <!-- ==================== Start Portfolio ==================== -->
    @include('components.gallery')
    <!-- ==================== End Portfolio ==================== -->

    <!-- ==================== Start Blog ==================== -->
    @include('components.blog')
    <!-- ==================== End Blog ==================== -->

    <!-- ==================== Start Contact ==================== -->
    @include('components.contact')
    <!-- ==================== End Contact ==================== -->
@endsection
