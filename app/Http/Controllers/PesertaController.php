<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $peserta = Peserta::all();
        return view('peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('peserta.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama.required' => 'Identitas peserta wajib diisi.',
            'nama.unique' => 'Identitas peserta sudah terdaftar.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.unique' => 'Nomor telepon sudah terdaftar.',
            'email.email' => 'Format email tidak valid.',
            'identitas.required' => 'Identitas wajib diisi.',
            'identitas.unique' => 'Identitas sudah terdaftar.',
        ];
        $validated = $request->validate([
            'nama' => 'required|unique:pesertas,nama',
            'alamat' => 'required',
            'no_telp' => 'required|unique:pesertas,no_telp',
            'email' => 'nullable|email',
            'identitas' => 'required|unique:pesertas,identitas',
        ], $messages);
        Peserta::create($validated);
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.show', compact('peserta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $peserta = Peserta::findOrFail($id);
        return view('peserta.edit', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nama.required' => 'Identitas peserta wajib diisi.',
            'nama.unique' => 'Identitas peserta sudah terdaftar.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_telp.required' => 'Nomor telepon wajib diisi.',
            'no_telp.unique' => 'Nomor telepon sudah terdaftar.',
            'email.email' => 'Format email tidak valid.',
            'identitas.required' => 'Identitas wajib diisi.',
            'identitas.unique' => 'Identitas sudah terdaftar.',
        ];
        $validated = $request->validate([
            'nama' => 'required|unique:pesertas,nama,' . $id,
            'alamat' => 'required',
            'no_telp' => 'required|unique:pesertas,no_telp,' . $id,
            'email' => 'nullable|email',
            'identitas' => 'required|unique:pesertas,identitas,' . $id,
        ], $messages);
        $peserta = Peserta::findOrFail($id);
        $peserta->update($validated);
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $peserta = Peserta::findOrFail($id);
        $peserta->delete();
        return redirect()->route('peserta.index')->with('success', 'Peserta berhasil dihapus!');
    }
}
