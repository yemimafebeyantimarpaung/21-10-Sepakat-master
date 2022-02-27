<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class APIController extends Controller
{
        public function sendResponse($data,$message)
         {
         $respones = [
             'status' => 'succes',
             'message' => $message,
             'data' => $data,
         ];
         return response()-> json($response, 200);
         }
         public function sendResponseWithParam($data,$message)
         {
         $respones = [
             'status' => 'succes',
             'message' => $message,
             'data' => $data,
             'param' => $param,
         ];
         return response()-> json($response, 200);
         }
     }
