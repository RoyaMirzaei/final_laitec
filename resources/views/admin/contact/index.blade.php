@extends('layouts.app')
@section('content')
    @if(session()->has('contact'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('contact')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-3">

        <table class="table table-dark table-hover">
            <thead class="table table-info">
            <tr>
                <td>id</td>
                <td>fullname</td>
                <td>email</td>
                <td>comment</td>
                <td>show</td>
                <td>delete</td>
            </tr>
            </thead>

            <tbody>
            @foreach($contact as $item)
                <tr>
                    <td>{{$item->id}}</td>
                    <td>{{Str::limit($item->fullname,10)}}</td>
                    <td>{{Str::limit($item->email,10)}}</td>
                    <td>{{Str::limit($item->comment,10)}}</td>
                    <td><a href="{{route('contact.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
                    <td>{!! Form::open(['route' => ['contact.destroy', $item->id ],'method' => 'delete']) !!}
                        {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

@endsection
