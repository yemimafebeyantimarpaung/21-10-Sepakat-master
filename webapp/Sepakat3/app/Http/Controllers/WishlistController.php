<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use League\CommonMark\Extension\Table\Table;

class WishlistController extends Controller
{


    public function index(){

        $user = Auth::user();
        $aucations = DB::table('user_aucations')->where('user_id', $user->id)->get();
        foreach ($aucations as $key => $a) {
            $aucations[$key]->product = DB::table('products')->where('id', $a->product_id)->first();
        }

        $data = [
            "user" => $user,
            "aucations" => $aucations,
        ];

        return view('wishlist.index', $data);
    }


}
