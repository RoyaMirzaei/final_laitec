@extends('layouts.app')
@section('content')
    @if(session()->has('setting'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('setting')}}
            </h5>
        </section>
    @endif
    @if(session()->has('news'))
        <section class="col-6 offset-3 alert alert-danger">
            <h5 class="text-danger text-center" dir="rtl">
                {{session('news')}}
            </h5>
        </section>
    @endif
    <section class="col-8 offset-2 mt-1">

        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                <td>id</td>
                <td>header</td>
                <td>alt</td>
                <td>abstract</td>
                <td>details</td>
                <td>date</td>
                <td>image</td>
                <td>show</td>
                <td>update</td>
                <td>delete</td>
            </tr>
            </thead>

            <tbody>
            @foreach($news as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td style="width: 50%">{{Str::limit($item->header,30)}}</td>
                    <td>{{Str::limit($item->alt,10)}}</td>
                    <td>{{Str::limit($item->abstract,15)}}</td>
                    <td>{{Str::limit($item->details,15)}}</td>
                    <td style="width: 100%">{{$item->date}}</td>
                    <td><img src="{{asset('images/news/'.$item->image)}}"  style="width: 70px;height: 70px"></td>
                    <td><a href="{{route('news.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
                    <td><a href="{{route('news.edit',$item->id)}}" class="btn btn-info">update</a></td>
                    <td>{!! Form::open(['route' => ['news.destroy', $item->id ],'method' => 'delete']) !!}
                        {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </section>
    <section class="col-8 offset-2 mt-1">
        <a href="{{route('news.create')}}" class="btn btn-danger btn-block">create</a></section>

    <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
