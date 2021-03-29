@extends('layouts.app')
@section('content')

<div class="wrapper">
    @include('components.includes.navbar')
    @include('components.includes.main-sidebar')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="mb-2 row">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="content">
            <div class="container-fluid">
                @yield('home-contents')
            </div>
        </div>
    </div>
    @include('components.includes.footer')
</div>

@endsection
