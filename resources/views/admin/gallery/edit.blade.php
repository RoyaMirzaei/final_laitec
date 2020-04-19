@extends('layouts.app')
@section('content')
    @if(session()->has('gallery'))
        <section class="col-6 offset-3 alert alert-danger">
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


        {{ Form::model($gallery,['route' => ['gallery.update',$gallery->id], 'method' => 'put','files'=>true])}}


        <section class="form-group">
            <tr>
                <td><img src="{{asset('images/gallery/'.$gallery->image)}}" style="width: 100px;height: 70px" class="img-thumbnail"></td>
                <td>{!! Form::file('image') !!}</td>
            </tr>

        </section>
        <hr>
        <section class="form-group">
            {!! Form::submit('submit', ['class' => 'form-control btn btn-success']) !!}
        </section>

        {{ Form::close() }}
        <a class="btn btn-info btn-block " href="{{route('gallery.index')}}">show details</a>
    </section>

@endsection
