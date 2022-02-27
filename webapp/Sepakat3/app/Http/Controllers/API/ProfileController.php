<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileController extends Controller
{
    
    public function index()
    {
        $data = User ::all();
        if($data){
            return response()->json($data, 200);
        }
        else
            return response()->json('Data Not Found', 404);
    }

  
//     public function store(Request $request)
//     {
//     $data = new User();
//     $data->name = $request->name;
//     $data->email = $request->email;
//     $data->alamat = $request->alamat;
//     $data->no_telp = $request->no_telp;
//     $data->gambar = $request->gambar;
   
//     $data->save();

// return response()->json([
//     'name' => $data->name,
//     'email' => $data->email,
//     'alamat' => $data->alamat,
//     'no_telp' => $data->no_telp,
//     'gambar' => $data->gambar,
//     'result' => 'Insert data successfully!'
// ]);
//     }

    public function update(Request $request, $id)
    {

        if($data = User::find($id))
        {   
            $name = $request->name;
    $email = $request->email;
    $alamat = $request->alamat;
    $no_telp = $request->no_telp;
    $gambar = $request->gambar;

    $data = User::find($id);
    $data->name = $name;
    $data->email = $email;
    $data->alamat = $alamat;
    $data->no_telp = $no_telp;
    $data->gambar = $gambar;
    $data->save();


             
return response()->json([
    'name' => $data->name,
    'email' => $data->email,
    'alamat' => $data->alamat,
    'no_telp' => $data->no_telp,
    'gambar' => $data->gambar,
    'result' => 'Change data successfully!'
        ], 201);
        }
        else
            return response()->json('Data Not Found', 404);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    if($data = User::find($id))
    {
        $data->delete();
        return response()->json([
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email,
            'alamat' => $data->alamat,
            'no_telp' => $data->no_telp,
            'gambar' => $data->gambar,
            'message' => 'Delete data successfully!'
        ], 200);
    }
    else
        return response()->json('Data Not Found', 404);
}
    }
