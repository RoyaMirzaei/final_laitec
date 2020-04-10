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
                @if (session()->has('gallery'))
                    <section class="alert alert-success">
                        <h3>{{ session('gallery') }}</h3>
                    </section>
                @endif

            </section>
            {{ Form::open(['route' => 'Gallery.store', 'method' => 'post','files'=>true])}}


            <section class="form-group">
                {{Form::label('subject', 'موضوع : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma'])}}
                {!! Form::select('subject',['علمی'=>'علمی','فرهنگی'=>'فرهنگی','هنری'=>'هنری','تکنولوزی'=>'تکنولوزی'],'علمی',['class' => 'form-control']) !!}
            </section>
            <section class="form-group">
                {{Form::label('caption', 'عنوان : ', ['class' => 'control-label','style'=>'font-size: 15px;font-family: Tahoma'])}}
                {!! Form::text('caption', null, ['class' => 'form-control']) !!}
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
                <a href="{{route('Gallery.index')}}"><input type="button" class="form-control btn btn-success" style="font-size: 15px;font-family: Tahoma" value="بازگشت به لیست تصاویر  "></a>
            </section>
        </section>
    </section>
@endsection
