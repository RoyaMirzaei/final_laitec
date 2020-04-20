@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                        You are logged in and wellcom {{\Illuminate\Support\Facades\Auth::user()->name}}
                </div>
            </div>
        </div>
    </div>
</div>
<footer class="footer bg-dark navbar-dark fixed-bottom ">
    <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
</footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
