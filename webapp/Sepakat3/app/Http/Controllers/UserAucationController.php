<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserAucationController extends Controller
{

    public function postJoin(Request $request){

        $this->validate($request, [
            'product_id' => ['required', 'exists:products,id'],
            'harga' => ['required', 'numeric']
        ]);

        $user = Auth::user();

        $aucation = DB::table('user_aucations')->where('product_id', $request->product_id)->where('user_id', $user->id)->first();

        if($aucation){

            DB::table('user_aucations')->where('product_id', $request->product_id)->where('user_id', $user->id)->update([
                'harga'=> $request->harga,
                'updated_at' => now()
            ]);

        }
        else{

            DB::table('user_aucations')->insert([
                'user_id' => $user->id,
                'product_id' => $request->product_id,
                'harga'=> $request->harga,
                'created_at' => now(),
                'updated_at' => now()
            ]);

        }

        return redirect()->route('beranda.index');

    }


}
