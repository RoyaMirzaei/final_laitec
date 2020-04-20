<section class="contact" id="contact">
    <section class="row ml-0 mr-0">
        <section class="col-10 offset-1">
            <h1 class="text-center text-capitalize">contact us</h1>
            <section class="border border-bottom-4 border-dark"></section>
            <section class="row ml-0 mr-0">
                @if(session()->has('contact'))
                    <section class="col-6 offset-3 alert alert-danger">
                        <h6 class="text-danger text-center" dir="rtl">
                            {{session('contact')}}
                        </h6>
                    </section>
                @endif
                <section class="col-8 offset-2">

                        @if ($errors -> any())
                            <section class="col-6  offset-3 mt-5 mb-5 bg-warning p-3" dir="rtl">
                                @foreach($errors->all() as $item)
                                    <h4 class="text-center text-black-50" style="font-size: small">{{$item}}</h4>
                                @endforeach
                            </section>
                        @endif
                    <Form action="{{route('contact.data')}}" method="post">
                        @csrf
                        <section class="form-group">
                            <label for="fullname">fullname</label>
                            <input type="text" name="fullname" placeholder="please enter fullName?"
                                   class="form-control" id="fullname">
                        </section>
                        <section class="form-group">
                            <label for="email">email</label>
                            <input type="email" name="email" placeholder="please enter email?" class="form-control"
                                   id="email">
                        </section>
                        <section class="form-group">
                            <label for="comment">comment</label>
                            <textarea name="comment" id="comment" class="form-control"
                                      placeholder="please enter your comment? "></textarea>
                        </section>
                        <section class="form-group">
                            <input type="submit" value="submit" class="btn btn-success btn-block">
                        </section>
                    </form>
                </section>
            </section>

        </section>
    </section>
</section>
