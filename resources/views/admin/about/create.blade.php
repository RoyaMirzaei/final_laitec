@extends('layouts.app')
@section('content')
    @if ($errors -> any())
        <section class="col-6 offset-3 alert alert-danger" dir="rtl">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
            @endforeach
        </section>
    @endif
    @if(session()->has('about'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('about')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-5">

        <Form action="{{route('about.store')}}" method="post">
            @csrf
            <section class="form-group">
                <input type="number" name="font" class="form-control"  min="16" max="40" value="16" ceholder="please enter font size">
            </section>
            <section class="form-group">
                <input type="color" name="color" class="form-control">
            </section>
            <section class="form-group">
                <textarea name="about" class="form-control" placeholder="please enter about website"></textarea>
            </section>
            <section class="form-group">
                <input type="submit" value="submit" class="btn btn-success btn-block">
            </section>

        </Form>
        <a class="btn btn-info btn-block " href="{{route('about.index')}}">show details</a>
    </section>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection

