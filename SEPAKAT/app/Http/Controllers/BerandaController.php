<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index(Request $request)
    {   
        $products = Product::latest()->paginate(4);
        return view('beranda.index',compact('products'));
    }
    public function show(Request $request)
    {
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);
        return view('beranda.show',compact('products'));
    }
    public function detail(Request $request,$id)
    {   
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);
        return view('beranda.detail',compact('products'));
    }
}

