<section class="news" id="news">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-center">News</h1>
            <section class="borderGallery"></section>
            <section class="row ml-0 mr-0 mt-5">
                <section class="col-10 offset-1 mb-2">
                    <section class="row ml-0 mr-0">


                        <h2>NEWS</h2>
                        <p>important news</p>

                        <!-- Portfolio Gallery Grid -->

                        <div class="row">
                            @foreach($news as $item )
                                <div class="column">
                                    <div class="content" style="width:100%;height: 350px">
                                        <img src="{{asset('images/news/'.$item->image)}}" alt="{{$item->alt}}"
                                             style="width:100%;height: 70px">
                                        <h3>{{$item->header}}</h3>
                                        <h6>{{$item->abstract}}</h6>
                                        <p><a href="{{route('news',$item->id)}}">{{Str::limit($item->details,30)}} more</a></p>
                                        <h6>{{$item->date}}</h6>
                                    </div>

                                </div>
                        @endforeach
                        <!-- END GRID -->
                        </div>
                        @foreach($newsImport as $i)
                            <div class="content container">
                                <img class="container" src="{{asset('images/news/'.$item->image)}}" alt="{{$item->alt}}">
                                <h3>{{$item->header}}</h3>
                                <h6>{{$item->abstract}}</h6>
                                <p>{{Str::limit($item->details,1000)}}<a href="{{route('news',$i->id)}}"> more...</a></p>
                                <h6>{{$i->date}}</h6>
                            @endforeach
                            <!-- END MAIN -->
                            </div>


                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
