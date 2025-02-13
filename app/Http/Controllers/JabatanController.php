<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Jabatan $jabatan, Request $request)
    {
        $search = $request->input('search');
        $jabatans = $jabatan->when($search, function ($query) use ($search) {
            $query->where('nama_jabatan', 'LIKE', "%$search%") // Filter kolom nama
                ->orWhere('deskripsi', 'LIKE', "%$search%"); // Filter kolom role
        })
        ->orderBy('id', 'desc') // Urutkan berdasarkan ID secara menurun
        ->paginate(10); // Batasi 10 data per halaman
        $title = 'Daftar Jabatan'; // Judul halaman
        return view('admin.jabatan',['search' => $search], compact('jabatans', 'title'));
    }

    // Menampilkan form untuk menambah jabatan
    public function create()
    {
        $title = 'Tambah Jabatan';
        return view('admin.create_jabatan', compact('title'));
    }

    // Menyimpan jabatan baru
    public function store(Request $request, Jabatan $jabatan)
    {
        $dataValidate = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jabatan->create($dataValidate);
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit jabatan
    public function edit( Jabatan $jabatan)
    {
        return view('admin.edit_jabatan', ['jabatan' => $jabatan, 'title' => 'Edit Jabatan']);
    }

    // Memperbarui jabatan
    public function update(Request $request, Jabatan $jabatan)
    {
        $dataValidate = $request->validate([
            'nama_jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
        ]);

        $jabatan->update($dataValidate);
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil diperbarui');
    }

    // Menghapus jabatan
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();
        return redirect()->route('jabatan.index')->with('success', 'Jabatan berhasil dihapus');
    }
   
}

