@extends("layouts.master")

@section("content")
    <div class="site-section">
      <div class="container">
        <div class="mb-5 row">
          <div class="col-md-12">
            <div class="mb-0 col-md-12">
            <a href="/">Home</a> <span class="mx-2 mb-0">/</span>
            <strong class="text-black">Check</strong>
          </div>
          </div>
        </div>
        <div class="row">

              <div class="col-md-6">
                <h2 class="mb-3 text-black h3">Your Order</h2>
                <div class="p-3 border p-lg-5 site-blocks-table">
                  <table class="table mb-5 site-block-order-table">
                    <thead>
                      <th class=" w-10p">Product</th>
                      <th class=" w-10p">Unique Price</th>
                      <th class=" w-10p">Total Price</th>
                    </thead>
                    <tbody>
                      @foreach($products as $item)
                      <tr>
                        <td class="product-name">{{ $item->product_name }} <strong class="mx-2">x</strong>{{ $item->product_quantity }}</td>
                        <td>{{ $item->price }} Franc CFA</td>
                        <td>{{ $item->total_price }} Franc CFA</td>
                      </tr>
                      @endforeach
                      <tr>
                        <td class="text-black font-weight-bold" clospan="2"><strong>Total Order </strong></td>
                        <td></td>
                        <td class="text-black font-weight-bold"><strong>{{ $sum_total_price }} Franc CFA</strong></td>
                      </tr>
                    </tbody>
                  </table>
                 <a href="/cart_list"><button class="btn btn-success btn-lg btn-block ">modified</button></a>
                </div>
              </div>


          <div class="mb-6 col-md-6 mb-md-0">
            <h2 class="mb-3 text-black h3">Your Information</h2>
            <div class="p-3 border p-lg-5">

            <form action="/order_place" method="post">
            @csrf
              <div class="form-group">
                <div class="col-md-12">
                  <label>Email <span class="text-danger">*</span></label>
                  <input type="text" class="form-control" id="email" name="email" placeholder="{{ Auth::user()->email }}" required>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Phone Number <span class="text-danger">*</span></label>
                  <input type="tel" class="form-control" id="phone" name="phone" placeholder="" pattern="[0-9]{3}[0-9]{3}[0-9]{3}" required>
                </div>
              </div>
              <div class="form-group">
                                        <div class="col-md-12">
                                        <Label>City <span class="text-danger">*</span></Label>
                                         <input type="text" id="country" name="city" class="form-control" list="cars" class="form-control" required>
                                        <datalist id="cars">
                                         <option></option>
                                           @include('Super_Admin.cameroon_city')
                                        </datalist>
                                        </div>
                                    </div>
              <div class="form-group">
                <div class="col-md-12">
                  <label>Address <span class="text-danger">*</span></label>

                  <textarea type="text" class="form-control" id="location" name="location" placeholder="Please enter the address where you wanted to be books" required></textarea>
                </div>
              </div>
              <hr>
                  <div class="form-group">
                      <br>
                    <button type="submit" class="btn btn-success btn-lg btn-block" >Placed the order</button>
                  </div>
            </div>
            </form>
          </div>
          </div>
          <div class="col-md-6">

          </div>
        </div>
        <!-- </form> -->
      </div>
    </div>




 <@endsection
