<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\update;

class UpdateController extends Controller
{
    public function store(Request $req){
    	$up=new update;
    	$up->id=$req->id;
    	$up->product=$req->product;
    	$up->price=$req->price;
    	$up->total=$req->total;
    	$up->save();
    	echo "send";

    }
}
