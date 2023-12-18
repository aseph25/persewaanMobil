<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('register/index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register/index');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari request
        $validatedData = $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required',
            'nomor_sim' => 'required',
            'password' => 'required',
        ]);

        // Simpan data pengguna baru ke dalam database
        $user = User::create($validatedData);

        // Redirect atau berikan respons sesuai kebutuhan Anda
        if ($user) {
            return redirect('/login')->with('berhasil', 'Akun berhasil dibuat! Silahkan login.');
        } else {
            return redirect('/register')->with('gagal', 'Pendaftaran gagal!');
        }
    }

    public function logout(Request $request){
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
