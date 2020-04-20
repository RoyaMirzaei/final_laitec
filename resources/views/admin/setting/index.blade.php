@extends('layouts.app')
@section('content')
    @if(session()->has('setting'))
        <section class="col-6 offset-3 alert alert-danger" >
            <h5 class="text-danger text-center" dir="rtl">
                {{session('setting')}}
            </h5>
        </section>
    @endif
    <section class="col-6 offset-3 mt-3">

  <table class="table table-dark table-hover">
      <thead class="table table-info">
      <tr>
          <td>id</td>
          <td>title</td>
          <td>author</td>
          <td>keywords</td>
          <td>description</td>
          <td>show</td>
          <td>delete</td>
      </tr>
      </thead>

    <tbody>
    @foreach($setting as $item)
      <tr>
          <td>{{$item->id}}</td>
          <td>{{Str::limit($item->title,5)}}</td>
          <td>{{Str::limit($item->author,5)}}</td>
          <td>{{Str::limit($item->keywords,10)}}</td>
          <td>{{Str::limit($item->description,10)}}</td>
          <td><a href="{{route('setting.show',$item->id)}}" target="_blank" class="btn btn-success">show</a></td>
          <td>{!! Form::open(['route' => ['setting.destroy', $item->id ],'method' => 'delete']) !!}
              {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
                <section class="col-12 offset-0">
                <a href="{{route('setting.create')}}" class="btn btn-danger btn-block">create</a></section>
    </section>
    <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>
@endsection
@section('css')
    <link href="{{asset('cssAdmin/style.css')}}" rel="stylesheet">
@endsection
