<?php
 
namespace App\Http\Controllers\Api\V1;
use App\User;
use Validator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
 
class AuthController extends Controller
{
   
    /**
     * @ login function
     * body: username,password
     * 
     */
    public function login(Request $request){
        $validator = Validator::make($request->all(),[
            'email' => 'required',
            'password' => 'required',
        ]);
         
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $tokenResult =  $user->createToken('Personal Access Token');
            $token = $tokenResult->token;
            if($request->remember_me){
                $token->expires_at = Carbon::now()->addWeeks(1);
            }
            $token->save();
 
            return response()->json([
                'access_token'=>$tokenResult->accessToken,
                'token_type' => 'Bearer', 
                'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
            ]);
        }else{
            return response()->json(['error'=>'Unauthorized'],401);
        }
    }
 
    /**
     * @ logout function
     */
    public function logout(Request $request){
        $request->user()->token()->revoke();
        return response()->json(['massage'=>'sucessfully logout'],200);
    }
}