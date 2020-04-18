@extends('layouts.app')
@section('content')
    <section class="col-6 offset-3 mt-3 ">
        @if(session()->has('slider'))
            <section class="col-6 offset-3 alert alert-danger" >
                <h5 class="text-danger text-center" dir="rtl">
                    {{session('slider')}}
                </h5>
            </section>
        @endif
        @if ($errors -> any())
            <section class="col-6  offset-3 mt-5 mb-5 bg-warning p-3" dir="rtl">
                @foreach($errors->all() as $item)
                    <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
                @endforeach
            </section>
        @endif

        <Form action="{{route('slider.update',$slider->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <section class="form-group">
                <input type="text" name="caption" class="form-control"  value="{{$slider->caption}}">
            </section>
            <section class="form-group">
                <input type="text" name="alt" class="form-control"  value="{{$slider->alt}}">
            </section>

            <section class="form-group">
                <tr>
                    <td>
                        <img src="{{asset('images/slider/'.$slider->image)}}" style="width: 100px;height: 70px" class="img-thumbnail">
                    </td>
                    <td>
                        <input type="file" name="image" >
                    </td>

                </tr>


            </section>
            <section class="form-group">
                <input type="submit" class="btn btn-success btn-block">
            </section>
        </Form>
        <a class="btn btn-info btn-block " href="{{route('slider.index')}}">come back</a>
    </section>

@endsection
