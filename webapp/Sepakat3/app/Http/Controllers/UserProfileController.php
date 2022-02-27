<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index() {
        $data = array('title' => 'User Profil');
        return view('profile.index', $data);
    }

    public function setting() {
        $data = array('title' => 'Setting Profil');
        return view('profile.setting', $data);
    }
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        User::findOrFail($request->user()->id)->update([
            'name' => $request->name,
            'no_telp' => $request->no_telp,
            'alamat' => $request->alamat,
            'email' => $request->email,
        ]);

        return redirect()->route('profil')->with('success', 'Data berhasil diupdate');
    }
    public function store(Request $request)
    {
        $request->validate([
        'gambar' => 'required|image|mimes:jpeg,png,jpg|max:5000',
        ]);
        $usersId=Auth::user()->id;
        $file = $request->file('gambar');
        $namaFile =$file->getClientOriginalName();
        $tujuanFile ='images/user';
        $file->move($tujuanFile,$namaFile);

        // User::findOrFail($request->user()->id)->update([
            // 'gambar' => $namaFile,
        // ]);
        $data = new User;
        $data->gambar = $namaFile;
        $data->usersId = $usersId;
        $data->save();

        return back()->with('success', 'Data berhasil diupdate');
     }
}
