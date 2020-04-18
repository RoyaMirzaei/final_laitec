@extends('layouts.app')
@section('content')

    @if(session()->has('about'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('about')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                <td>id</td>
                <td>font size</td>
                <td>color</td>
                <td>about</td>
                <td>show</td>
                <td>delete</td>
            </tr>
            </thead>

            <tbody>
            @foreach($about as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{$item->font}}</td>
                    <td> {{$item->color}}<h4 style="background-color:{{$item->color}}" class="text-center">color</h4> </td>
                    <td>{{Str::limit($item->about,25)}}</td>
                    <td><a href="{{route('about.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
                    <td>{!! Form::open(['route' => ['about.destroy', $item->id ],'method' => 'delete']) !!}
                        {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <section class="col-12 offset-0">
            <a href="{{route('about.create')}}" class="btn btn-danger btn-block">create</a>
        </section>
    </section>

@endsection
