@extends('layouts.app')
@section('content')
    <section class="col-6 offset-2 mt-3">

            @if(session()->has('delete'))
                <section class="alert alert-danger" dir="rtl">
                    <h5>
                        {{session('delete')}}
                    </h5>
                </section>
            @endif

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
          <td nowrap>{{$item->title}}</td>
          <td>{{$item->author}}</td>
          <td>{{Str::limit($item->keywords,10)}}</td>
          <td>{{Str::limit($item->description,10)}}</td>
          <td><a href="{{route('setting.show',$item->id)}}" >show</a></td>
          <td>{!! Form::open(['route' => ['setting.destroy', $item->id ],'method' => 'delete']) !!}
              {!! Form::submit('delete', ['class' => 'btn btn-danger']) !!}
              {!! Form::close() !!}
          </td>
      </tr>
      @endforeach
    </tbody>
  </table>
                <section class="col-10 offset-2">
                <a href="{{route('setting.create')}}" class="btn btn-danger btn-block">create</a></section>
    </section>

@endsection
