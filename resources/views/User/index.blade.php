
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
    .box{overflow-wrap: break-word;}
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

    <div class="site-section" style="background-color:rgba(227, 241, 245, 0.842);">
      <div class="container">

        <div class="row">
          <div class="text-center title-section col-12">
            <h2 class="text-uppercase">Nos Livres</h2>
          </div>
        </div>

       <div>
        <section class="mb-5">
            <div class="container">
              <div class="aa-latest-property-area">
                <div class="text-center aa-title">
                <div class="aa-latest-properties-content">
                  <div class="row">
                  @foreach($readers as $key=>$data)
                    <div class="col-md-4">
                      <article class="aa-properties-item">
                      <div class="aa-properties-item-img hovereffect pb-5">
                          <img src="{{ asset('storage') }}/{{ $data->image }}" alt="Image">
                          <div class="overlay">
                       {{-- <h2>{{ $data->name }}</h2> --}}
                    </div>
                          </div>
                          <div class="text-center card-body ">
                            <h4 class="text-dark">{{ $data->title }}</h4>
                        <h4 class="price" style="color: black;">{{ $data->price }} Franc CFA</h4>
                        </div>
                          <div>
                            <a class="text-left btn btn-info float-left" href="/shop-single/{{$data->id}}">Acheter</a>
                             <button type="button" class="float-right btn" data-toggle="modal" data-target="#descriptionModal-{{ $data->id }}" style="background-color: #66c3ee; color:white">Description</button>
                        </div>

              <!-- Modal -->
              <div class="modal fade mt-5 pt-5" id="descriptionModal-{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header text-center">
                      <h2 class="modal-title text-center" id="exampleModalLabel" ><h2 style="color: black">{{ $data->title}}</h2></h2>
                      <a></a>
                    </div>
                    <div class="box">
                        <div class="pt-10 mt-10 box">
                         <h3>{{ $data->description }}</h3>
                        </div>
                      </div>
                    <div class="py-3 pl-2 text-white float-left" style="background-color: black">
                        <h4>Auteur : {{ $data->autor }} </h4>
                      </div>
                  </div>
                </div>
              </div>

                      </article>
                    </div>
                    @endforeach
                  </div>
                </div>
              </div>
            </div>
            </section>

          <div class="site-section bg-light">
        <div class="row">
            <div class="text-center title-section col-12">
            <h2 class="text-uppercase">Livre</h2>
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
