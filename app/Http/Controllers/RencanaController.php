<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RencanaLiburan;

class RencanaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rencana = RencanaLiburan::all();
        return view('rencana.index', compact('rencana'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('rencana.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'nama_rencana.required' => 'Nama rencana wajib diisi.',
            'destinasi.required' => 'Destinasi wajib diisi.',
            'tgl_berangkat.required' => 'Tanggal berangkat wajib diisi.',
            'tgl_berangkat.date' => 'Tanggal berangkat tidak valid.',
            'tgl_pulang.required' => 'Tanggal pulang wajib diisi.',
            'tgl_pulang.date' => 'Tanggal pulang tidak valid.',
            'estimasi_biaya.required' => 'Estimasi biaya wajib diisi.',
            'estimasi_biaya.numeric' => 'Estimasi biaya harus berupa angka.',
            'status.required' => 'Status wajib diisi.',
        ];
        $validated = $request->validate([
            'nama_rencana' => 'required',
            'destinasi' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_pulang' => 'required|date',
            'estimasi_biaya' => 'required|numeric',
            'catatan' => 'nullable',
            'status' => 'required',
        ], $messages);
        // Cek duplikat nama_rencana + tgl_berangkat
        $exists = \App\Models\RencanaLiburan::where('nama_rencana', $validated['nama_rencana'])
            ->where('tgl_berangkat', $validated['tgl_berangkat'])->exists();
        if ($exists) {
            return back()->withInput()->withErrors(['nama_rencana' => 'Nama rencana dan tanggal berangkat sudah ada!']);
        }
        RencanaLiburan::create($validated);
        return redirect()->route('rencana.index')->with('success', 'Rencana berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $rencana = RencanaLiburan::findOrFail($id);
        return view('rencana.show', compact('rencana'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $rencana = RencanaLiburan::findOrFail($id);
        return view('rencana.edit', compact('rencana'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'nama_rencana.required' => 'Nama rencana wajib diisi.',
            'destinasi.required' => 'Destinasi wajib diisi.',
            'tgl_berangkat.required' => 'Tanggal berangkat wajib diisi.',
            'tgl_berangkat.date' => 'Tanggal berangkat tidak valid.',
            'tgl_pulang.required' => 'Tanggal pulang wajib diisi.',
            'tgl_pulang.date' => 'Tanggal pulang tidak valid.',
            'estimasi_biaya.required' => 'Estimasi biaya wajib diisi.',
            'estimasi_biaya.numeric' => 'Estimasi biaya harus berupa angka.',
            'status.required' => 'Status wajib diisi.',
        ];
        $validated = $request->validate([
            'nama_rencana' => 'required',
            'destinasi' => 'required',
            'tgl_berangkat' => 'required|date',
            'tgl_pulang' => 'required|date',
            'estimasi_biaya' => 'required|numeric',
            'catatan' => 'nullable',
            'status' => 'required',
        ], $messages);
        // Cek duplikat nama_rencana + tgl_berangkat (kecuali id sendiri)
        $exists = \App\Models\RencanaLiburan::where('nama_rencana', $validated['nama_rencana'])
            ->where('tgl_berangkat', $validated['tgl_berangkat'])
            ->where('id', '!=', $id)->exists();
        if ($exists) {
            return back()->withInput()->withErrors(['nama_rencana' => 'Nama rencana dan tanggal berangkat sudah ada!']);
        }
        $rencana = RencanaLiburan::findOrFail($id);
        $rencana->update($validated);
        return redirect()->route('rencana.index')->with('success', 'Rencana berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rencana = RencanaLiburan::findOrFail($id);
        $rencana->delete();
        return redirect()->route('rencana.index')->with('success', 'Rencana berhasil dihapus!');
    }
}
