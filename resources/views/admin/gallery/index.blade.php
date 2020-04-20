@extends('layouts.app')
@section('content')

    @if(session()->has('gallery'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('gallery')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-3">
        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                <td>id</td>
                <td>image</td>
                <td>show</td>
                <td>update</td>
                <td>delete</td>
            </tr>
            </thead>

            <tbody>
            @foreach($gallery as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td><img src="{{asset('images/gallery/'.$item->image)}}" style="width: 50px;height: 50px; border-radius: 5px"></td>
                    <td><a href="{{route('gallery.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
                    <td><a href="{{route('gallery.edit',$item->id)}}" class="btn btn-info">update</a></td>
                    <td>{!! Form::open(['route' => ['gallery.destroy', $item->id ],'method' => 'delete']) !!}
                        {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <section class="col-12 offset-0">
            {{$gallery->links()}}
            <a href="{{route('gallery.create')}}" class="btn btn-danger btn-block">create</a>
        </section>
    </section>

@   <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
