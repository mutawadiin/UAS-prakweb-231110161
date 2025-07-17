@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Tambah Perjalanan</h1>
    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('perjalanan.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Rencana</label>
            <select name="rencana_id" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
                <option value="">Pilih Rencana</option>
                @foreach($rencana as $r)
                    <option value="{{ $r->id }}">{{ $r->nama_rencana }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Peserta</label>
            <select name="peserta_id[]" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" multiple required>
                @foreach($peserta as $p)
                    <option value="{{ $p->id }}">{{ $p->nama }}</option>
                @endforeach
            </select>
            <span class="text-xs text-gray-500">(Tekan Ctrl / Cmd untuk memilih lebih dari satu)</span>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Kegiatan</label>
            <input type="text" name="kegiatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Catatan</label>
            <textarea name="catatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent"></textarea>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Status</label>
            <select name="status" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">
                <option value="aktif">Aktif</option>
                <option value="selesai">Selesai</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Simpan</button>
    </form>
</div>
@endsection 