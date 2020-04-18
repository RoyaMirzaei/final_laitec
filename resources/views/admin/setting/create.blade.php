@extends('layouts.app')
@section('content')
    @if ($errors -> any())
        <section class="col-6 offset-3 alert alert-danger" dir="rtl">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
            @endforeach
        </section>
    @endif
    @if(session()->has('setting'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('setting')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-5">

        <Form action="{{route('setting.store')}}" method="post">
           @csrf
            <section class="form-group">
                <input type="text" name="title" class="form-control" value="{{old('title')}}" placeholder="please enter title website">
            </section>
            <section class="form-group">
                <input type="text" name="author" class="form-control" value="{{old('author')}}" placeholder="please enter author website">
            </section>
            <section class="form-group">
                <textarea name="keywords" class="form-control" value="{{old('keywords')}}" placeholder="please enter keywords website"></textarea>
            </section>
            <section class="form-group">
                <textarea name="description" class="form-control" value="{{old('description')}}" placeholder="please enter description website"></textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>

         </Form>
        <a class="btn btn-info btn-block " href="{{route('setting.index')}}">show details</a>
    </section>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection

