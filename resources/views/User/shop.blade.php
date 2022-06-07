@extends("layouts.master")

@section("title")
 Online Pdf Reader
@endsection

@section("content")

<style>
    /* * {
      box-sizing: border-box;
    } */
.box{overflow-wrap: break-word;}
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

    <div class="site-section" style="background-color:rgba(227, 241, 245, 0.842);">
     <div class="py-3 bg-light">
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12"></span> <strong class="text-black">Tous les livre</strong>

       <div class="search">
       <form class="form-inline " action="/search_reader" method="POST">
@csrf
    <input class="form-control mr-sm-2 search-box" name="search" type="text" placeholder="Chercher un livre">
    <button type="submit"><span style="color:black"><i class="icon-search"></i></span></button>
  </form>
      </div>
      </div>
        </div>
      </div>
    </div>
    <hr><br>

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
                      <div class="">
                        <a class="text-left btn btn-info float-left" href="/shop-single/{{$data->id}}">Acheter</a>

                         <button type="button" class="float-right btn " data-toggle="modal" data-target="#descriptionModal-{{ $data->id }}" style="background-color: #66c3ee; color:white">Description</button>
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
            {{-- </div> --}}
          </div>

                  </article>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
        </section>

    {{-- <div class="container">
        <div class="row">
            @foreach($readers as $item)

               <div class="card mb4  col-sm-4 col-lg-4" style="width: 18rem;">
                  <img class="trending_image card-img-top" src="{{ asset('storage') }}/{{ $item->image }}" width="250" height="250" alt="Image">
                      <div class="text-center card-body">
                          <h4 class="text-dark">{{ $item->title }}</h4>
                      <h4 class="price" style="color: black;">{{ $item->price }} Franc CFA</h4>
                      </div>
  <div>
      <a class="text-left btn btn-info float-left" href="/shop-single/{{$item->id}}">Achete</a>
       {{-- <button class=" text-right btn btn-info float-right">Description</button> -}}
       <button type="button" class="float-right btn" data-toggle="modal" data-target="#addModal" style="background-color: #66c3ee; color:white">Description</button>
{{-- ************************************************************************************************ -}}
      <!-- The Modal description-->
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
                <div class="content pt-10 mt-10 box">
                  {{-- <h1>Heading</h1> -}}
                  {{ $item->description }}
                </div>
              </div>
<!-- Modal footer -->
<div class="py-3 pl-2 text-white float-left" style="background-color: black">
    <h3>Auteur : {{ $item->autor }} </h3>
  </div>
          </div>
        </div>
      </div>
      <!--End The Modal description-->
    </div>
            </div>


            @endforeach
            <div class="mt-5 row ">
            <div class="text-center col-12">
              <a href="/shop" class="px-4 py-3 btn btn-primary">voir tous</a>
            </div>
          </div>
            </div>

        <div class="row">
          <div class="text-center col-md-12 lg">
                <div>{{ $readers->links()}}</div>
          </div>
        </div>

    </div> --}}
    </div>
    </div>



  @endsection
