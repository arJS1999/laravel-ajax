<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    public function index() {

     return view('currency');
    }   

    public function exchangeCurrency(Request $request) {

      $amount = ($request->amount)?($request->amount):(1);
      // echo($amount);exit();

      $apikey = 'd11880e9e896073f5a3b';

      $from_Currency = urlencode($request->from_currency);
      $to_Currency = urlencode($request->to_currency);
      $query = "{$from_Currency}_{$to_Currency}";

      // change to the free URL if you're using the free version
      $json = file_get_contents("http://free.currencyconverterapi.com/api/v5/convert?q={$query}&compact=y&apiKey={$apikey}");


      $obj = json_decode($json, true);

      $val = $obj["$query"];

      $total = $val['val'] * 1;

      $formatValue = number_format($total, 3, '.', '');

      $data = "$amount $from_Currency = $to_Currency $formatValue";

      echo $data; die;



  }
}
