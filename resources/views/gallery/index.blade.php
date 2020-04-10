@extends('layout.master')
@section('content')

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
                <section class="alert alert-danger">
                    <h3>{{ session('gallery') }}</h3>
                </section>
            @endif

        </section>
        <table class="table table-hover table-bordered">
            <thead class="bg-success" style="font-size: 15px ; font-family: Tahoma; background-color: #67b168;text-align: center">
            <td>
                <label style="color: white"> موضوع </label>
            </td>
            <td>
                <label style="color: white"> عنوان </label>
            </td>
            <td>
                <label style="color: white"> تصویر</label>
            </td>

            <td colspan="2" style="text-align: center">
                <label style="color: white">ویرایش</label>
            </td>

            </thead>
            <tbody>
            @foreach($gallery as $item)
                <tr style="text-align: justify">
                    <td>
                        <label style="color: black">{{$item->subject}}</label>
                    </td>
                    <td>
                        <label style="color: black">{{$item->caption}}</label>
                    </td>

                    <td style="text-align: center"><img src="{{asset('images/gallery/'.$item->image)}}" style="width: 50px;height: 50px; border-radius: 5px"></td>

                    <td style="text-align: center"><a href="{{route('Gallery.edit',$item->id)}}"><input type="button" class="btn btn-info" style="font-size: 15px;font-family: Tahoma" value="ویرایش"></a></td>
                    <td style="text-align: center">
                        {!! Form::open(['route' => ['Gallery.destroy', $item->id ],'method' => 'delete']) !!}
                        {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>

                </tr>
            @endforeach
            </tbody>


        </table>
        <section class="form-group">
            <td style="text-align: center"><a href="{{route('Gallery.create')}}"><input type="button" class="form-control btn btn-info"  style="font-size: 15px;font-family: Tahoma"value="صفحه درج "></a></td>
        </section>

    </section>

@endsection
