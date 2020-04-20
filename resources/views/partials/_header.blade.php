<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <!-- setting for seo site -->
    @foreach($setting as $item)
    <title>{{$item->title}}</title>
    <meta name="keywords" content="{{$item->keywords}}"/>
    <meta name="description" content="{{$item->description}}"/>
    <meta name="author" content="{{$item->author}}">
    @endforeach

   <!-- end setting for seo site -->
    <meta name="robots" content="index,follow"/>
      <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('slider/engine1/style.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('lightbox/dist/css/lumos.css')}}">
    <link href="{{asset('cssAdmin/syleNews.css')}}" rel="stylesheet">
</head>
<body>
