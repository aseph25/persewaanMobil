<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;



class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all(); // Mengambil semua data barang dari model Barang
        return view('barang/index', ['barangs' => $barangs]); // Mengirimkan data barang ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tambahbarang/index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merek' => 'required',
            'model' => 'required',
            'nomor_plat' => 'required',
            'foto' => 'required|image',
            'jumlah' => 'required|numeric',
            'harga' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);
        
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/foto');
            $validatedData['foto'] = basename($fotoPath);
        }
        
        $barang = new Barang;
        $barang->merek = $validatedData['merek'];
        $barang->model = $validatedData['model'];
        $barang->nomor_plat = $validatedData['nomor_plat'];
        $barang->foto = $validatedData['foto'];
        $barang->jumlah = $validatedData['jumlah'];
        $barang->harga = $validatedData['harga'];
        $barang->tanggal_mulai = $validatedData['tanggal_mulai'];
        $barang->tanggal_selesai = $validatedData['tanggal_selesai'];
        $barang->user_id = auth()->user()->id;
        $barang->save();
        
        
    
        return redirect('/barang')->with('berhasil', 'Data barang berhasil disimpan.');
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
        $barang = Barang::find($id);
        return view('barang/edit',[
            'barang' => $barang,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'merek' => 'required|max:255',
            'model' => 'required|min:3',
            'nomor_plat' => 'required|max:20',
            'foto' => 'nullable|image',
            'jumlah' => 'required',
            'harga' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
        ]);
        
        // Update the barang data in the database
        $barang = Barang::find($id);
        $barang->merek = $validatedData['merek'];
        $barang->model = $validatedData['model'];
        $barang->nomor_plat = $validatedData['nomor_plat'];
        $barang->jumlah = $validatedData['jumlah'];
        $barang->harga = $validatedData['harga'];
        $barang->tanggal_mulai = $validatedData['tanggal_mulai'];
        $barang->tanggal_selesai = $validatedData['tanggal_selesai'];
        
        if ($request->hasFile('foto')) {
            // Delete the old photo from storage
            Storage::delete('public/foto/' . $barang->foto);
        
            // Store the new photo in storage
            $foto = $request->file('foto');
            $fotoPath = $foto->store('public/foto');
            $barang->foto = basename($fotoPath);
        }
        
        $barang->save();
        
        // Redirect atau berikan pesan sukses jika diperlukan
        return redirect('barang')->with('berhasil', 'Data Berhasil Diupdate');        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
                // Ambil data barang dari database
                $barang = Barang::find($id);
    
                // Menghapus foto lama dari penyimpanan
                Storage::delete('public/foto/' . $barang->foto);
            
                // Lanjutkan dengan menghapus data barang dari database
                $barang->delete();
            
                // Redirect atau berikan pesan sukses jika diperlukan
                return redirect('barang')->with('berhasil', 'Data Berhasil Dihapus');
    }
}
