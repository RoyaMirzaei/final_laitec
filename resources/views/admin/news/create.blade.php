@extends('layouts.app')
@section('content')
    @if ($errors -> any())
        <section class="col-6 offset-3 alert alert-danger" dir="rtl">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
            @endforeach
        </section>
    @endif
    @if(session()->has('news'))
        <section class="col-6 offset-3 alert alert-danger">
            <h5 class="text-danger text-center" dir="rtl">
                {{session('news')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-5">

        {{ Form::open(['route' => 'news.store', 'method' => 'post','files'=>true])}}

        <section class="form-group">
            {!! Form::text('title', 'please enter news header !', ['class' => 'form-control']) !!}
        </section>
        <section class="form-group">
            {!! Form::text('title', 'please enter alt image !', ['class' => 'form-control']) !!}
        </section>

        <section class=" form-group">
            {!! Form::textarea('abstract','please enter news abstract !', ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
        </section>
        <section class="form-group">
            {!! Form::textarea('description','please enter news details !', ['class' => 'form-control','rows'=>5,'cols'=>50]) !!}
        </section>
        <section class="form-group">
           {!! Form:: date('date','mounth/day/year',['class'=>'form-control'])!!}
        </section>
        <section class="form-group">
            {!! Form::file('image',['class'=>'form-control']) !!}
        </section>
        <hr>
        <section class="form-group">
            {!! Form::submit('submit', ['class' => 'form-control btn btn-success btn-block']) !!}
        </section>

        {{ Form::close() }}

        <a class="btn btn-info btn-block " href="{{route('setting.index')}}">show details</a>
    </section>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
