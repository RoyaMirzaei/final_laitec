@extends('layout.master')
@section('content')
    <section dir="rtl">

        <section class="container" style="padding: 50px" dir="rtl">
            <section>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </section>
            <section>
                @if (session()->has('news'))
                    <section class="alert alert-success">
                        <h3>{{ session('news') }}</h3>
                    </section>
                @endif

            </section>
            {{ Form::open(['route' => 'News.store', 'method' => 'post','files'=>true])}}
            <section class="form-group">
                {{Form::label('title', 'عنوان : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma'])}}
                {!! Form::text('title', null, ['class' => 'form-control']) !!}
            </section>

            <section class="form-group">
                {!! Form::label('abstract', 'چکیده : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma']) !!}
               {!! Form::textarea('abstract',null, ['class' => 'form-control','rows'=>3,'cols'=>50]) !!}
            </section>
            <section class="form-group">
                {!! Form::label('description', 'شرح خبر : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma']) !!}
                {!! Form::textarea('description',null, ['class' => 'form-control','rows'=>5,'cols'=>50]) !!}
            </section>
            {!! Form::label('image', 'تصویر : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma']) !!}
            <section class="form-group">
                {!! Form::file('image',['class'=>'form-control']) !!}
            </section>
            <hr>
            <section class="form-group">
                {!! Form::submit('ثبت', ['class' => 'form-control btn btn-info','style'=>'font-size: 15px;font-family: Tahoma']) !!}
            </section>

            {{ Form::close() }}

            <section class="form-group">
                <a href="{{route('News.index')}}"><input type="button" class="form-control btn btn-success" style="font-size: 15px;font-family: Tahoma" value="بازگشت به لیست اخبار"></a>
            </section>
        </section>
    </section>
@endsection
