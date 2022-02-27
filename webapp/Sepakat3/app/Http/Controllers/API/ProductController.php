<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::all();
        if($product){
            return response()->json($product, 200);
        }
        else
            return response()->json('Data Not Found', 404);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->nama = $request->nama;
        $product->kategori = $request->kategori;
        $product->harga = $request->harga;
        $product->stok = $request->stok;
        $product->satuan = $request->satuan;
        $product->gambar = $request->gambar;
        $product->deskripsi = $request->deskripsi;
        $product->usersId = $request->usersId;
        $product->save();
        

        return response()->json([
            'id' => $product->id,
            'nama' => $product->nama,
            'kategori' => $product->kategori,
            'harga' => $product->harga,
            'stok' => $product->stok,
            'satuan' => $product->satuan,
            'gambar' => $product->gambar,
            'deskripsi' => $product->deskripsi,
            'usersId' => $product->usersId,
            'message' => 'Insert data successfully!'
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($product = Product::find($id))
        {   
            $nama = $request->nama;
            $kategori = $request->kategori;
            $harga = $request->harga;
            $stok = $request->stok;
            $satuan = $request->satuan;
            $gambar = $request->gambar;
            $deskripsi = $request->deskripsi;
            $usersId = $request->usersId;

            $product->nama = $nama;
            $product->kategori = $kategori;
            $product->harga = $harga;
            $product->stok = $stok;
            $product->satuan = $satuan;
            $product->gambar = $gambar;
            $product->usersId = $usersId;
            $product->save();

            return response()->json([
                'id' => $product->id,
                'nama' => $product->nama,
                'kategori' => $product->kategori,
                'harga' => $product->harga,
                'stok' => $product->stok,
                'satuan' => $product->satuan,
                'gambar' => $product->gambar,
                'deskripsi' => $product->deskripsi,
                'usersId' => $product->usersId,
                'message' => 'Change data successfully!'
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
        if($product = Product::find($id))
        {
            $product->delete();
            return response()->json([
                'id' => $product->id,
                'nama' => $product->nama,
                'kategori' => $product->kategori,
                'harga' => $product->harga,
                'stok' => $product->stok,
                'satuan' => $product->satuan,
                'gambar' => $product->gambar,
                'deskripsi' => $product->deskripsi,
                'usersId' => $product->usersId,
                'message' => 'Delete data successfully!'
            ], 200);
        }
        else
            return response()->json('Data Not Found', 404);
    }
}
