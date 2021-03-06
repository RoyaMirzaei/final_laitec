<section class="gallery" id="gallery">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-center">Gallery</h1>
            <section class="border border-bottom-4 border-dark"></section>
            <section class="row ml-0 mr-0 mt-5">
                <section class="col-10 offset-1 mb-2">
                    <section class="row ml-0 mr-0">
                        @foreach($gallery as $item)
                        <section class="col-4 mb-2"><a class="lumos-link" data-lumos="gallery1"
                                                       href="{{asset('images/gallery/'.$item->image)}}">
                                <img src="{{asset('images/gallery/'.$item->image)}}" style="width: 300px;height: 200px" class="img-fluid">
                            </a>
                        </section>
                        @endforeach
                    </section>
                </section>
            </section>
        </section>
    </section>
</section>
