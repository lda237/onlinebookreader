@extends("layouts.master")

@section("content")
<style>
.sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
    .disable-text-selection {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    }
    .box{overflow-wrap: break-word;}
</style>
    <div class="site-section" style="background-color:rgba(227, 241, 245, 0.842);">
    <div class="py-1 bg-light">
      <div class="container">
        <div class="row">
          <div class="mb-0 col-md-12">Detail du Livre</strong></div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container pt-5">
        <div class="row">
          {{-- <div class="mr-auto col-md-1"></div> --}}
          <div class="mr-auto col-md-7">
            {{-- <h4>Description:</h4> --}}
            <div class="text-center border code box">
                <img src="/storage/{{ $reader->image }}" alt="Notebook" style="width:75%;">
                {{-- <p><h4 class="text-black">{{ $reader->description }}</h4></p> --}}
              {{-- <iframe id="fraDisabled" src="/assets/{{ $reader->readername }}#toolbar=0" type="application/pdf" width="100%" height="600" onload="disableContextMenu();" onMyLoad="disableContextMenu();"></iframe> --}}
            </div>
          </div>
          <div class="col-md-5 ">
            <br>
            <div>
            {{-- <h4>Titre:</h4> --}}
            <h2 class="text-black">{{ $reader->title }}</h2><br>
            <h5 class="text-dark">écrit par <span class="text-success">{{ $reader->autor }}</span></h5>
            {{-- <div>
                <a target="_blank" href="/assets/{{ $reader->readername }}#toolbar=0" title="">clik</a>
            </div> --}}
           <h4>Description:</h4>
           <p><h4 class="text-black">{{ $reader->description }}</h4></p>
            <p><span class="h4">Price:</span><strong class="text-primary h4">{{ $reader->price }} CFA</strong></p>
           {{-- <a href="/download/{{ $reader->readername }}">Download</a> --}}
        </div>
<hr>
<div class="">
    <button class="btn btn-info btn-lg" onclick="checkout()">Payer</button>
</div>

<div class="pt-10">

@if (Auth::user()=="")
<h5 class="text-danger">
pour acheter un livre, vous devez vous authentifier. <a href="/login">cliquez ici</a> pour vous connecter et si vous n'avez pas de compte <a href="/register">cliquez ici</a> pour vous inscrire
</h5>
@endif

    </div>

        </div>

        </div>
      </div><br><br>
    
    <div class="site-section bg-light container">
        <div class="row">
            <div class="text-center title-section col-12">
            <h2 class="text-uppercase">autre livre</h2>
          </div>
          <div class="col-md-12 block-3 products-wrap">
            <div class="nonloop-block-3 owl-carousel">
               @foreach($readers as $item)
            <div class="mb-3 text-center item">
            <a href="/shop-single/{{$item->id}}"> <img class="" src="{{ asset('storage') }}/{{ $item->image }}" alt="Image"></a>
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
  <@endsection
@section('scripts')

// Function to block the right click in the iFrame
<script>

function checkout() {
            CinetPay.setConfig({
                apikey: '24207613462463b15a16391.26571050',//   YOUR APIKEY
                site_id: '241464',//YOUR_SITE_ID
                notify_url: 'http://mondomaine.com/notify/',
                mode: 'PRODUCTION'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: {{ $reader->price }},
                currency: 'XAF',
                channels: 'ALL',
                description: 'Paiement dun Livre ',
                // Fournir ces variables pour le paiements par carte bancaire
                customer_name:"nguefack",//Le nom du client
                customer_surname:"jordan",//Le prenom du client
                customer_email: "nguefackphiscovell@gmail.come",//l'email du client
                customer_phone_number: "659269938",//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "yaounde",// La ville du client
                customer_country : "CM",// le code ISO du pays
                customer_state : "CM",// le code ISO l'état
                customer_zip_code : "06510", // code postal


            });
            CinetPay.waitResponse(function(data) {
                if (data.status == "REFUSED") {
                    if (alert("Votre paiement a échoué")) {
                        window.location.reload();
                    }
                } else if (data.status == "ACCEPTED") {
                    window.location.href="/buy/{{ $reader->id }}";
                    if (alert("Votre paiement a été effectué avec succès")) {

                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    function disableContextMenu()
    {
      window.frames["fraDisabled"].document.oncontextmenu = function(){alert("No way!"); return false;};
      // Or use this
      // document.getElementById("fraDisabled").contentWindow.document.oncontextmenu = function(){alert("No way!"); return false;};;
    }
  </script>
@endsection

