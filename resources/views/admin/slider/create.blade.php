@extends('layouts.app')
@section('content')
<section class="col-6 offset-3 mt-3 ">
    @if ($errors -> any())
        <section class="col-6  offset-3 mt-5 mb-5 bg-warning p-3" dir="rtl">
            @foreach($errors->all() as $item)
                <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
            @endforeach
        </section>
    @endif

            <Form action="{{route('slider.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <section class="form-group">
                    <input type="text" name="caption" class="form-control" value="{{old('caption')}}" placeholder="please enter caption !">
                </section>
                <section class="form-group">
                    <input type="text" name="alt" class="form-control" value="{{old('alt')}}" placeholder="please enter alt !">
                </section>

                <section class="form-group">
                    <input type="file" name="image" class="form-control" >
                </section>
                <section class="form-group">
                    <input type="submit" value="submit" class="btn btn-success btn-block">
                </section>

            </Form>
            <a class="btn btn-info btn-block " href="{{route('slider.index')}}">show details</a>
        </section>

@endsection
