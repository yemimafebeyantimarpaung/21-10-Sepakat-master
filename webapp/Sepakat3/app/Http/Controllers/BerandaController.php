<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BerandaController extends Controller
{
    public function index(Request $request, $search = "")
    {
        if($search){
            $products = Product::where('nama', 'like', '%' . $search . '%')->latest()->paginate(4);
        }
        else{
            $products = Product::latest()->paginate(4);
        }

        return view('beranda.index',compact('products'));
    }

    public function postSearch(Request $request){

        $this->validate($request, [
            'search' => ['required']
        ]);

        return redirect()->route('search/{search}', ['search'=>$request->search]);

    }

    public function show(Request $request)
    {
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);

        foreach ($products as $key => $p) {
            $products[$key]->aucations = $aucations = DB::table('user_aucations')->where('product_id', $p->id)->orderBy('harga')->get();

            foreach ($products[$key]->aucations as $key2 => $a) {
                $products[$key]->aucations[$key2]->user = DB::table('users')->where('id', $a->user_id)->first();
            }

        }


        return view('beranda.show',compact('products'));
    }
    public function detail(Request $request,$id)
    {
        $products = Product :: join('users','products.usersId','=','users.id')->where('products.id', '=', $request->id)->get(['users.*','products.*']);

        foreach ($products as $key => $p) {
            $products[$key]->aucations = $aucations = DB::table('user_aucations')->where('product_id', $p->id)->orderBy('harga')->get();

            foreach ($products[$key]->aucations as $key2 => $a) {
                $products[$key]->aucations[$key2]->user = DB::table('users')->where('id', $a->user_id)->first();
            }

        }


        return view('beranda.detail',compact('products'));
    }
}

