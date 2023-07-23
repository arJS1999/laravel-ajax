<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;


class ProductController extends Controller
{
    public function index(){
    	$cart=product::all();
    	echo json_encode($cart);
    }
    public function store(){
    	
    }
}
