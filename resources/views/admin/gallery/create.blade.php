@extends('layouts.app')
@section('content')
    @if(session()->has('gallery'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('gallery')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-3 ">
        @if ($errors -> any())
            <section class="col-6  offset-3 mt-5 mb-5 bg-warning p-3" dir="rtl">
                @foreach($errors->all() as $item)
                    <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
                @endforeach
            </section>
        @endif


        <Form action="{{route('gallery.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <section class="form-group">
                <input type="file" name="image" class="form-control" >
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>

        </Form>
        <a class="btn btn-info btn-block " href="{{route('gallery.index')}}">show details</a>
    </section>
    <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
