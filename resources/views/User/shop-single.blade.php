@extends("layouts.master")

@section("content")
<style>
    .disable-text-selection {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
</style>
    <div class="site-section">
    <div class="py-1 bg-light">
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12">Detail</strong></div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container-fluid">
        <div class="row">
          {{-- <div class="mr-auto col-md-1"></div> --}}
          <div class="mr-auto col-md-9">
            <div class="text-center border code">
              <iframe id="fraDisabled" src="/assets/{{ $reader->readername }}#toolbar=0" type="application/pdf" width="100%" height="600" onload="disableContextMenu();" onMyLoad="disableContextMenu();"></iframe>
            </div>
          </div>
          <div class="col-md-3 text-center">
            <br>
            <h2 class="text-black">{{ $reader->title }}</h2><br>
            <div>
                <h4>Description:</h4>
                <a target="_blank" href="/assets/{{ $reader->readername }}#toolbar=0" title="">clik</a>
            <p><h5>{{ $reader->description }}</h5></p>
            </div>
            <p><span class="h4">Price:</span><strong class="text-primary h4">{{ $reader->price }} CFA</strong></p>
           <a href="/download/{{ $reader->readername }}">Download</a>
<hr>
<div class="">
<label for="" class="control-label"><strong>Buy</strong></label>
<div class="row">
<div class=" col-md-4">
<a href="{{-- /payment/orange --}}"><img src="/storage/image/orange-money.jpg" alt="PayPal" width="100%" height="125%"></a>
</div>
<div class=" col-md-4">
    <a href="{{-- /payment/mtn --}}"><img src="/storage/image/ntm_logo.jpg" alt="PayPal" width="100%" height="125%"></a>
    </div>
    <div class=" col-md-4">
        <a href="/payment/{{ "paypal" }}"><img src="/storage/image/download (3).png" width="100%" height="125%" alt="PayPal"></a>
        </div>
</div>
</div>
        </div>
        </div>
      </div>
    </div>
  <@endsection
@section('scripts')

// Function to block the right click in the iFrame
<script type="text/jscript">
    function disableContextMenu()
    {
      window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};
      // Or use this
      // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;
    }
  </script>

@endsection
