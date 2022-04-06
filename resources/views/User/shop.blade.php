@extends("layouts.master")

@section("title")
  E-Commerce
@endsection

@section("content")



    <div class="site-section">
     <div class="py-3 bg-light">
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12"></span> <strong class="text-black bg-info">Shop</strong>

       <div class="search">
       <form class="form-inline " action="/search">
    <input class="form-control mr-sm-2 search-box" name="search" type="text" placeholder="Search">
    <button class="btn btn-primary" type="submit"><span style="color:black"><i class="fa fa-search"></i>Search</span></button>
  </form>
      </div>
      </div>
        </div>
      </div>
    </div>
    <hr><br>
      <div class="container">

        <div class="row">
            @foreach($readers as $item)
            <div class="card mr-0.9 mb4 col-sm-6 col-lg-4" style="width: 18rem;">
                <a href="/shop-single/{{$item->id}}"> <img class=" card-img-top" src="{{ asset('storage') }}/{{ $item->image }}" width="250" height="350" alt="Image">
                    <div class="text-center card-body">
                        <h4 class="text-dark">{{ $item->title }}</h4>
                    <h4 class="price" style="color: black;">{{ $item->price }} Franc CFA</h4>
                    </div></a>
          </div>
            @endforeach
          </div>

        <div class="row">
          <div class="text-center col-md-12 lg">
                <div>{{ $readers->links()}}</div>
          </div>
        </div>

    </div>
    </div>
    </div>



  @endsection
