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
    <section class="col-6 offset-3">

        {{ Form::model($news,['route' => ['news.update',$news->id], 'method' => 'put','files'=>true])}}

        <section class="form-group">
            {!! Form::text('header', $news->header, ['class' => 'form-control']) !!}
        </section>
        <section class="form-group">
            {!! Form::text('alt',$news->alt, ['class' => 'form-control']) !!}
        </section>

        <section class=" form-group">
            {!! Form::textarea('abstract',$news->abstract, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
        </section>
        <section class="form-group">
            {!! Form::textarea('details',$news->details, ['class' => 'form-control','rows'=>5,'cols'=>50]) !!}
        </section>
        <section class="form-group">
            {!! Form:: date('date',$news->date,['class'=>'form-control'])!!}
        </section>
        <section class="form-group">
            <tr>
                <td><img src="{{asset('images/news/'.$news->image)}}" style="width: 100px;height: 70px"
                         class="img-thumbnail"></td>
                <td>{!! Form::file('image') !!}</td>
            </tr>
        </section>
        <hr>
        <section class="form-group">
            {!! Form::submit('submit', ['class' => 'form-control btn btn-success btn-block']) !!}
        </section>

        {{ Form::close() }}

        <a class="btn btn-info btn-block " href="{{route('news.index')}}">show details</a>
    </section>
    <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
