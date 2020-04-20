@include('partials._header')
<!--main website-->
<main class="container-fluid pr-0 pl-0">
    <!--make menu-->
@include('partials._menu')
<!--end make menu-->

        <div class="container">
            <div class="content">
            <img src="{{asset('images/news/'.$news->image)}}"  class="container img-fluid" style="height:200px" alt="{{$news->alt}}">
            <h3>{{$news->header}}</h3>
            <h6>{{$news->abstract}}</h6>
            <p>{{$news->details}}</p>
            <h6>{{$news->date}}</h6>
        <!-- END MAIN -->
            </div>
        </div>

<!--end make contact-->
    <footer class="footer bg-dark navbar-dark fixed-bottom ">
        <p class="mt-2 text-center text-white text-capitalize">design by .... &copy;2020</p>
    </footer>


<!--end make footer-->
</main>
@include('partials._footer')
