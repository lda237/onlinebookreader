@extends("layouts.master")

@section("title")
  E-Commerce
@endsection

@section("content")

    <div class="site-section">
     <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"></span> <strong class="text-black">Store</strong>

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

       @foreach($categories as $category)
<div class="col-lg-6">
<a href="/scategory"class="btn btn-info">{{ $category->name }}</a>
</div>
       @endforeach

        </div>
    <div>

        <div class="row">
            @foreach($products as $item)
            <div class="col-sm-6 col-lg-3 text-center item mb-4 w-25p">
            <a href="/shop-single/{{$item->id}}"> <img class="trending_image" src="{{ asset('images') }}/{{ $item->image }}" alt="Image"></a>
            <h5><a class="p-name text-dark" href="/shop-single/">{{ $item->name }}</a></h5>
            <p class="price"><del>95.00</del> &mdash; {{ $item->price }}</p>
          </div>
            @endforeach
          </div>
        <div class="row">
          <div class="col-md-12 lg text-center">

              {{ $products->links() }}

          </div>
        </div>
    </div>
    </div>
    </div>



  @endsection
