<?php

namespace App\Http\Controllers;

use App\Models\Reader;
use CinetPay\CinetPay;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Srmklive\PayPal\Services\ExpressCheckout;

class PaymentController extends Controller
{

    public function payment(Request $request){
 /* Preparation des elements constituant le panier
        */
        $user=Auth::user();
        //dd($user);
       if($user!=""){
            $reader=Reader::find($request->input('reader_id'));
            // dd($reader->price);
               $apiKey = "24207613462463b15a16391.26571050"; //Veuillez entrer votre apiKey
               $site_id = "241464"; //Veuillez entrer votre siteId
               $id_transaction = CinetPay::generateTransId(); // Identifiant du Paiement
               $description_du_paiement = sprintf('Paiement du livre ',$reader->title); // Description du Payment
               $date_transaction = date("Y-m-d H:i:s"); // Date Paiement dans votre système
               $montant_a_payer = $reader->price ; //mt_rand(100, 200) Montant à Payer : minimun est de 100 francs sur CinetPay
               $devise = 'XAF'; // Montant à Payer : minimun est de 100 francs sur CinetPay
               $identifiant_du_payeur =Auth::user()->email; // Mettez ici une information qui vous permettra d'identifier de façon unique le payeur
               $formName = "goCinetPay"; // nom du formulaire CinetPay
               $notify_url = ''; // Lien de notification CallBack CinetPay (IPN Link)
               $return_url = ''; // Lien de retour CallBack CinetPay
               $cancel_url = ''; // Lien d'annulation CinetPay
               // Configuration du bouton
               $btnType = 2;//1-5xwxxw
               $btnSize = 'large'; // 'small' pour reduire la taille du bouton, 'large' pour une taille moyenne ou 'larger' pour  une taille plus grande

               // Paramétrage du panier CinetPay et affichage du formulaire
               $cp = new CinetPay($site_id, $apiKey);
               try {
                   $cp->setTransId($id_transaction)
                       ->setDesignation($description_du_paiement)
                       ->setTransDate($date_transaction)
                       ->setAmount($montant_a_payer)
                       ->setCurrency($devise)
                       ->setDebug(true)// Valorisé à true, si vous voulez activer le mode debug sur cinetpay afin d'afficher toutes les variables envoyées chez CinetPay
                       ->setCustom($identifiant_du_payeur)// optional
                       ->setNotifyUrl($notify_url)// optional
                       ->setReturnUrl($return_url)// optional
                       ->setCancelUrl($cancel_url)// optional
                       ->displayPayButton($formName, $btnType, $btnSize);
               } catch (Exception $e) {
                   print $e->getMessage();
               }

            // $reader->users()->attach($user->id);
            return redirect('/auth_user/dashboard');
        }else{
        return back()->with('status',"pour acheter un livre, vous devez vous authentifier. et si vous n'avez pas de compte créez en un");
        }

    }

}
