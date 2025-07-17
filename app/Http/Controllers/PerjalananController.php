<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perjalanan;
use App\Models\RencanaLiburan;
use App\Models\Peserta;

class PerjalananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perjalanan = Perjalanan::with(['rencana', 'peserta'])->get();
        return view('perjalanan.index', compact('perjalanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rencana = RencanaLiburan::all();
        $peserta = Peserta::all();
        return view('perjalanan.create', compact('rencana', 'peserta'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'rencana_id.required' => 'Rencana wajib dipilih.',
            'rencana_id.exists' => 'Rencana tidak valid.',
            'peserta_id.required' => 'Peserta wajib dipilih.',
            'peserta_id.array' => 'Peserta tidak valid.',
            'peserta_id.*.exists' => 'Peserta tidak valid.',
            'kegiatan.required' => 'Kegiatan wajib diisi.',
            'catatan.nullable' => 'Catatan tidak valid.',
            'status.required' => 'Status wajib dipilih.',
        ];
        $validated = $request->validate([
            'rencana_id' => 'required|exists:rencana_liburans,id',
            'peserta_id' => 'required|array',
            'peserta_id.*' => 'exists:pesertas,id',
            'kegiatan' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
        ], $messages);
        // Cek duplikat untuk setiap peserta
        foreach ($validated['peserta_id'] as $pid) {
            $exists = \App\Models\Perjalanan::where('rencana_id', $validated['rencana_id'])
                ->where('kegiatan', $validated['kegiatan'])
                ->whereHas('peserta', function($q) use ($pid) {
                    $q->where('peserta_id', $pid);
                })->exists();
            if ($exists) {
                return back()->withInput()->withErrors(['peserta_id' => 'Peserta sudah terdaftar pada rencana dan kegiatan yang sama!']);
            }
        }
        $perjalanan = Perjalanan::create([
            'rencana_id' => $validated['rencana_id'],
            'kegiatan' => $validated['kegiatan'],
            'catatan' => $validated['catatan'] ?? null,
            'status' => $validated['status'],
        ]);
        $perjalanan->peserta()->attach($validated['peserta_id']);
        return redirect()->route('perjalanan.index')->with('success', 'Perjalanan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $perjalanan = Perjalanan::with(['rencana', 'peserta'])->findOrFail($id);
        return view('perjalanan.show', compact('perjalanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);
        $rencana = RencanaLiburan::all();
        $peserta = Peserta::all();
        return view('perjalanan.edit', compact('perjalanan', 'rencana', 'peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $messages = [
            'rencana_id.required' => 'Rencana wajib dipilih.',
            'rencana_id.exists' => 'Rencana tidak valid.',
            'peserta_id.required' => 'Peserta wajib dipilih.',
            'peserta_id.array' => 'Peserta tidak valid.',
            'peserta_id.*.exists' => 'Peserta tidak valid.',
            'kegiatan.required' => 'Kegiatan wajib diisi.',
            'catatan.nullable' => 'Catatan tidak valid.',
            'status.required' => 'Status wajib dipilih.',
        ];
        $validated = $request->validate([
            'rencana_id' => 'required|exists:rencana_liburans,id',
            'peserta_id' => 'required|array',
            'peserta_id.*' => 'exists:pesertas,id',
            'kegiatan' => 'required',
            'catatan' => 'nullable',
            'status' => 'required',
        ], $messages);
        $perjalanan = Perjalanan::findOrFail($id);
        $perjalanan->update([
            'rencana_id' => $validated['rencana_id'],
            'kegiatan' => $validated['kegiatan'],
            'catatan' => $validated['catatan'] ?? null,
            'status' => $validated['status'],
        ]);
        $perjalanan->peserta()->sync($validated['peserta_id']);
        return redirect()->route('perjalanan.index')->with('success', 'Perjalanan berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $perjalanan = Perjalanan::findOrFail($id);
        $perjalanan->delete();
        return redirect()->route('perjalanan.index')->with('success', 'Perjalanan berhasil dihapus!');
    }
}
