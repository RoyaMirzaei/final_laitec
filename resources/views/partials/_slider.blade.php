
<section class="slider" id="slider">
    <section class="row ml-0 mr-0">
        <section class="col-12">
            <!-- Start WOWSlider.com BODY section --> <!-- add to the <body> of your page -->
            <div id="wowslider-container1">
                <div class="ws_images">
                    <ul>
                        @foreach($slider as $item)
                        <li><img src="{{asset('images/slider/'.$item->image)}}" alt="{{$item->alt}}" title="{{$item->caption}}" id="wows1_0"/></li>
                            @endforeach
                    </ul>
                </div>
                <div class="ws_shadow"></div>
            </div>
            <!-- End WOWSlider.com BODY section -->
        </section>
    </section>
</section>
