
@extends("layouts.master")

@section("content")
<style>
    * {
      box-sizing: border-box;
    }

    /* body {
      font-family: Arial;
      font-size: 17px;
    } */

    .containe {
      position: relative;
      max-width: 800px;
      margin: 0 auto;
    }

    .containe img {vertical-align: middle;}

    .containe .content {
      position: absolute;
      /* bottom: 0; */
      top:0;
  /* left: 50%; */
  /* transform: translate(-50%, -50%); */
      background: rgb(0, 0, 0); /* Fallback color */
      background: rgba(0, 0, 0, 0.5); /* Black background with 0.5 opacity */
      color: #f1f1f1;
      width: 100%;
      padding: 20px;
    }
    </style>
 @if(session('status'))
            <div class="text-center alert alert-success">
                {{ session('status') }}
            </div>
             @endif

   <div class="custom-pudoct">
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">

     <ol class="carousel-indicators">
     @foreach($banners as $item => $slider)
    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>
    @endforeach
  </ol>

  <div class="carousel-inner">
      @foreach($banners as $item => $slider)
      <div class="carousel-item {{ $item == 0 ? 'active' : '' }}">
        <a href="/shop-single/{{$slider['id']}}" class="center-block "><img src="{{ asset('storage') }}/{{ $slider->image }}" class="justify-center d-flex w-100  slider-img " alt="...">
      <div class="carousel-caption d-none d-md-block slider-text">
        <h5>{{ $slider['name'] }}</h5>
      </div></a>
      </div>
      @endforeach

  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true" style="background-color: rgb(152, 173, 211) !important;"></span>
    <span class="visually-hidden">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true" style="background-color: rgb(152, 173, 211) !important;"></span>
    <span class="visually-hidden">Next</span>
  </a>
</div>
    </div>
   </div>

    <div class="site-section">
      <div class="container">

        <div class="row">
          <div class="text-center title-section col-12">
            <h2 class="text-uppercase">Ower Readers</h2>
          </div>
        </div>

       <div>

        <div class="row">
          @foreach($readers as $item)

             <div class="card mb4 col-sm-6 col-lg-4" style="width: 18rem;">
                <img class="trending_image card-img-top" src="{{ asset('storage') }}/{{ $item->image }}" width="250" height="250" alt="Image">
                    <div class="text-center card-body">
                        <h4 class="text-dark">{{ $item->title }}</h4>
                    <h4 class="price" style="color: black;">{{ $item->price }} Franc CFA</h4>
                    </div>
<div>
    <a class="text-left btn btn-info float-left" href="/shop-single/{{$item->id}}">Achete</a>
     {{-- <button class=" text-right btn btn-info float-right">Description</button> --}}
     <button type="button" class="float-right btn" data-toggle="modal" data-target="#addModal" style="background-color: #66c3ee; color:white">Description</button>
</div>

 {{-- ************************************************************************************************ --}}
    <!-- The Modal ADD-->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModallabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header" style="background-color: #66c3ee; color:white">
              <h4 class="modal-title" id="exampleModallable">{{ $item->title }}</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class="btn btn-danger">&times;</span> </button>
            </div>

            <!-- Modal body -->
            <div class="containe">
                <img src="/storage/{{ $item->image }}" alt="Notebook" style="width:100%;  height:5">
                <div class="content pt-10 mt-10">
                  <h1>Heading</h1>
                  <p>Lorem ipsum dolor sit amet, an his etiam torquatos. Tollit soleat phaedrum te duo, eum cu recteque expetendis neglegentur. Cu mentitum maiestatis persequeris pro, pri ponderum tractatos ei.</p>
                </div>
              </div>
<!-- Modal footer -->
<div class="py-3 pl-2 text-white float-left" style="background-color: black">
    <h3>Auteur : {{ $item->autor }} </h3>
  </div>
          </div>
        </div>
      </div>
      <!--End The Modal ADD-->
          </div>
          @endforeach
          <div class="mt-5 row ">
          <div class="text-center col-12">
            <a href="/shop" class="px-4 py-3 btn btn-primary">voir tous</a>
          </div>
        </div>
          </div>

          <div class="site-section bg-light">
        <div class="row">
            <div class="text-center title-section col-12">
            <h2 class="text-uppercase">Readers</h2>
          </div>
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
               @foreach($readers as $item)
            <div class="mb-3 text-center item">
            <a href="/shop-single/{{$item->id}}"> <img class="trending_image" src="{{ asset('storage') }}/{{ $item->image }}" alt="Image"></a>
            <div class="my-3 text-dark">
                <h4>{{ $item->title }}</h4>
            <h4 class="price"> {{ $item->price }} Franc CFA</h4></a>
            </div>
          </div>
          @endforeach

            </div>
          </div>
          {{-- <div class="mt-5 row">
          <div class="text-center col-12">
            <a href="/shop" class="px-4 py-3 btn btn-primary">See All Readers</a>
          </div>
        </div> --}}
        </div>
    </div>

      </div>
      </div>
      </div>





@endsection
