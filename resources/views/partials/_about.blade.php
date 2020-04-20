<section class="about" id="about">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-capitalize text-center">about me</h1>
            <section class="border border-bottom-4 border-dark"></section>
            <section class="row ml-0 mr-0 mt-5">
                <section class="col-10 offset-1 mb-2">
                    <section class="row ml-0 mr-0">
                        @foreach($about as $item)
                            <h6 style="font-size:{{$item->font}}px;color: {{$item->color}}">
                                {{$item->about}}
                            </h6>
                        @endforeach
                </section>
            </section>
        </section>
    </section>
</section>
</section>
