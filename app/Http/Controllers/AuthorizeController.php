<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;
use Cart;
use App\Card_infos;
use Session;
use DB;

class AuthorizeController extends Controller
{
  public function index()
  {
    if (session::get('user')) {
      $data = DB::table('card_infos')->select('*')->where('user_id', session::get('user')->id)->first();
      if ($data) {
        return view('elite.authorize')->with('data', $data);
      } else {
        return view('elite.authorize');
      }
    } else {
      return view('elite.authorize');
    }
  }
  public function chargeCreditCard(Request $request)
  {

    if (session::get('user')) {
      $data = DB::table('card_infos')->select('*')->where('user_id', session::get('user')->id)->first();
      if (empty($data)) {
        $card_info = new card_infos;
        $card_info->user_id = session::get('user')->id;
        $card_info->card_no = $request->cnumber;
        $card_info->Ex_month = $request->card_expiry_month;
        $card_info->Ex_year = $request->card_expiry_year;
        $card_info->card_code = $request->ccode;
        $card_info->save();
      } elseif (!empty($data) && $data->card_no != $request->cnumber) {
        $card_info = new card_infos;
        $card_info->user_id = session::get('user')->id;
        $card_info->card_no = $request->cnumber;
        $card_info->Ex_month = $request->card_expiry_month;
        $card_info->Ex_year = $request->card_expiry_year;
        $card_info->card_code = $request->ccode;
        $card_info->save();
      }
    }
    // Common setup for API credentials
    $merchantAuthentication = new AnetAPI\MerchantAuthenticationType();
    $merchantAuthentication->setName(config('services.authorize.login'));
    $merchantAuthentication->setTransactionKey(config('services.authorize.key'));
    $refId = 'ref' . time();
    // Create the payment data for a credit card
    $creditCard = new AnetAPI\CreditCardType();
    $creditCard->setCardNumber($request->cnumber);
    // $creditCard->setExpirationDate( "2038-12");
    $expiry = $request->card_expiry_year . '-' . $request->card_expiry_month;
    $creditCard->setExpirationDate($expiry);
    $paymentOne = new AnetAPI\PaymentType();
    $paymentOne->setCreditCard($creditCard);
    // Create a transaction
    $transactionRequestType = new AnetAPI\TransactionRequestType();
    $transactionRequestType->setTransactionType("authCaptureTransaction");
    $transactionRequestType->setAmount($request->camount);
    $transactionRequestType->setPayment($paymentOne);
    $request = new AnetAPI\CreateTransactionRequest();
    $request->setMerchantAuthentication($merchantAuthentication);
    $request->setRefId($refId);
    $request->setTransactionRequest($transactionRequestType);
    $controller = new AnetController\CreateTransactionController($request);
    $response = $controller->executeWithApiResponse(\net\authorize\api\constants\ANetEnvironment::SANDBOX);
    if ($response != null) {
      $tresponse = $response->getTransactionResponse();
      if (($tresponse != null) && ($tresponse->getResponseCode() == "1")) {
        $totl = str_replace(',', '', substr(Cart::total(), 0, -3)) - str_replace(',', '', substr(Cart::tax(), 0, -3));
        return redirect('index')->with('message', 'YOUR Charge Credit Card AUTH CODE : ' . $tresponse->getAuthCode() . ' & YOUR Charge Credit Card TRANS ID  : ' . $tresponse->getTransId() . ' You successfully paid $' . $totl);
      } else {
        echo "Charge Credit Card ERROR :  Invalid response\n";
      }
    } else {
      echo  "Charge Credit Card Null response returned";
    }
    return redirect('index')->with('error', 'There is some error please try again later');
  }
}
