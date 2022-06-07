@extends("layouts.master")

@section("content")

<p id="payment_result"></p>
<form id="info_paiement">
    <input type="hidden"  id="amount" value="10">

    <input type="hidden" id="currency" value="CFA">

    <input type="hidden" id="trans_id" value="">

    <input type="hidden" id="cpm_custom" value="">

    <input type="hidden" id="designation" value="Achat de chaussure noir">

    <button type="submit" id="process_payment">Proceder au Paiement</button>
</form>

<@endsection
@section('scripts')

// Function to block the right click in the iFrame
<script>
 CinetPay.setConfig({
            apikey: '24207613462463b15a16391.26571050',
            site_id: 241464,
            notify_url: 'http://mondomaine.com/notify/'
        });
    var process_payment = document.getElementById('process_payment');
        process_payment.addEventListener('click', function () {
            CinetPay.setSignatureData({
                amount: parseInt(document.getElementById('amount').value),
                trans_id: document.getElementById('trans_id').value,
                currency: document.getElementById('currency').value,
                designation: document.getElementById('designation').value,
                custom: document.getElementById('cpm_custom').value
            });
            CinetPay.getSignature();
        });

        var result_div = document.getElementById('payment_result');
   CinetPay.on('error', function (e) {
        result_div.innerHTML = '';
        result_div.innerHTML += '<b>Error code:</b>' + e.code + '<br><b>Message:</b>:' + e.message;
   });
   CinetPay.on('paymentPending', function (e) {
       result_div.innerHTML = '';
        result_div.innerHTML = 'Paiement en cours <br>';
        result_div.innerHTML += '<b>code:</b>' + e.code + '<br><b>Message:</b>:' + e.message;
   });
   CinetPay.on('paymentSuccessfull', function (paymentInfo) {
           if(typeof paymentInfo.lastTime != 'undefined'){
               result_div.innerHTML = '';
               if(paymentInfo.cpm_result == '00'){
                   result_div.innerHTML = 'Votre paiement a été validé avec succès : <br> Montant payé :'+paymentInfo.cpm_amount+'<br>';
               }else{
                   result_div.innerHTML = 'Une erreur est survenue :'+paymentInfo.cpm_error_message;
               }
           }
   });
  </script>
@endsection

{{-- <!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.cinetpay.com/seamless/main.js" type="text/javascript"></script>
    <style>
        .sdk {
            display: block;
            position: absolute;
            background-position: center;
            text-align: center;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
    <script>
        function checkout() {
            CinetPay.setConfig({
                apikey: '24207613462463b15a16391.26571050',//   YOUR APIKEY
                site_id: '241464',//YOUR_SITE_ID
                notify_url: 'http://mondomaine.com/notify/',
                mode: 'DEVELOPMENT'
            });
            CinetPay.getCheckout({
                transaction_id: Math.floor(Math.random() * 100000000).toString(), // YOUR TRANSACTION ID
                amount: 100,
                currency: 'XAF',
                channels: 'ALL',
                description: 'Test de paiement',
                 //Fournir ces variables pour le paiements par carte bancaire
                customer_name:"Joe",//Le nom du client
                customer_surname:"Down",//Le prenom du client
                customer_email: "physconguefack@gmail.com",//l'email du client
                customer_phone_number: "659269938",//l'email du client
                customer_address : "BP 0024",//addresse du client
                customer_city: "Yaounder",// La ville du client
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
                    if (alert("Votre paiement a été effectué avec succès")) {
                        window.location.reload();
                    }
                }
            });
            CinetPay.onError(function(data) {
                console.log(data);
            });
        }
    </script>
</head>
<body>
    </head>
    <body>
        <div class="sdk">
            <h1>La Plume De Myss</h1>
            <button onclick="checkout()">Efectuer votre payement </button>
        </div>
    </body>
</html> --}}
