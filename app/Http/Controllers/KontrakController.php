<?php

namespace App\Http\Controllers;

use App\Models\Kontrak;
use Illuminate\Http\Request;

class KontrakController extends Controller
{
    // Menampilkan daftar kontrak
    public function index(Request $request)
    {
        $search = $request->input('search');

        $kontrak = Kontrak::when($search, function ($query) use ($search) {
            $query->where('nama', 'LIKE', "%$search%") // Filter kolom nama
                ->orWhere('durasi_kontrak', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('tanggal_mulai', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('tanggal_selesai', 'LIKE', "%$search%") // Filter kolom role
                ->orWhere('deskripsi', 'LIKE', "%$search%"); // Filter kolom role
        })
        ->orderBy('id', 'desc') // Urutkan berdasarkan ID secara menurun
        ->paginate(10); // Batasi 10 data per halaman
        return view('admin.kontrak', [
            "title" => "Kontrak",
            "kontrak" =>$kontrak,
            'search'=>$search
        ]);
    }

    // Menampilkan halaman tambah kontrak
    public function create()
    {
        return view('admin.kontrak_create', ["title" => "Kontrak Create"]);
    }

    // Menyimpan data kontrak baru
    public function store(Request $request, Kontrak $kontrak)
    {
       $dataValidate = $request->validate([
            'nama' => 'required|in:Permanen,Sementara,Magang',
            'durasi_kontrak' => 'nullable|integer|min:0',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'deskripsi'=> 'nullable|string',
        ]);
        $kontrak->create($dataValidate);

        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil ditambahkan.');
    }

    // Menampilkan halaman edit kontrak
    public function edit(Kontrak $kontrak)
    {
        return view('admin.kontrak_edit', [
            "title" => "Kontrak Edit",
            "kontrak" => $kontrak,
        ]);
    }

    // Memperbarui data kontrak
    public function update(Request $request, Kontrak $kontrak)
    {
        $dataValidate = $request->validate([
            'nama' => 'required|in:Permanen,Sementara,Magang',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'durasi_kontrak' => 'nullable|integer|min:0',
        ]);

        $kontrak->update($dataValidate);

        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil diperbarui.');
    }

    // Menghapus kontrak
    public function destroy(Kontrak $kontrak)
    {
        $kontrak->delete();
        return redirect()->route('kontrak.index')->with('success', 'Kontrak berhasil dihapus.');
    }
}
