@extends("layouts.master")

@section("content")
    <div class="pt-4">
        @if(session('error'))
        <div class="text-center alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
         @endif
         @if(session('status'))
        <div class="text-center alert alert-success" role="alert">
            {{ session('status') }}
        </div>
         @endif
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12">
            <h4><strong class="text-black">Cart</strong></h4>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container text-right">
        <a href="/shop" class="btn btn-primary">Add item</a>
    </div><br>
      <div class="container">
        <div class="mb-4 row">
            <div class="site-blocks-table">
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th class=" w-10p">Image</th>
                    <th class=" w-10p">Produit</th>
                    <th class=" w-10p">Prix Unique</th>
                    <th class=" w-10p">Quantity</th>
                    <th class=" w-10p">Prix Total</th>
                    <th class=" w-10p">Retirer</th>
                  </tr>
                </thead>
                <tbody>

                  @foreach($products as $item)
                  <tr>
                    <td class="product-thumbnail">
                     <img src="{{ asset('images') }}/{{ $item->image }}" alt="Image" class="img-fluid">
                    </td>
                    <td class="product-name">
                      <h2 class="text-black h5">{{ $item->product_name }}</h2>
                    </td>
                    <td>{{ $item->price }}CFA</td>
                    <td>
                 <form action="/update_item/{{$item->cart_id}}" method="POST">
            @csrf
             @method('Patch')
            <div class="mb-5">
              <div class="mb-3 input-group" style="max-width: 220px;">
                <div class="input-group-prepend">
                  <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                </div>
                <input type="text" class="text-center form-control" value="{{ $item->product_quantity }}" placeholder=""
                  aria-label="Example text with button addon" aria-describedby="button-addon1" name=quantity>
                <div class="input-group-append">
                  <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                </div>
              </div>
            <button type="submit" class="px-4 py-3 buy-now btn btn-sm height-auto btn-primary">modified</button>
            </form>
                    </td>
                    <td>{{ $item->total_price }}CFA</td>
                    <td><a href="/removeitem/{{ $item->cart_id }}" class="btn btn-primary height-auto btn-sm">X</a></td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
        </div>

        <div class="row">

              <div class="col-md-4">

            </div>

            @if ($count==0)

                <div class="col-md-4">
                    <div class="text-center"><h4>Your Basket is Empty</h4></div>
                 <a href="/shop" class="btn btn-success btn-lg btn-block"> Add a Product </a>
            </div>
            @else
                <div class="col-md-4">
                 <a href="order_now">
                    <button class="mb-4 btn btn-primary btn-lg btn-block" onclick="window.location='checkout'">Confirme</button>
                    </a>
            </div>
            @endif

              <div class="col-md-4">

                  </div>

          </div>

        </div>
      </div>
    </div>

@endsection
