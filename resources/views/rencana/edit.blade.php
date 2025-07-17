@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Edit Rencana Liburan</h1>
    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('rencana.update', $rencana->id) }}" method="POST" class="space-y-5">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Nama Rencana</label>
            <input type="text" name="nama_rencana" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="{{ $rencana->nama_rencana }}" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Destinasi</label>
            <input type="text" name="destinasi" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="{{ $rencana->destinasi }}" required>
        </div>
        <div class="flex gap-4">
            <div class="flex-1">
                <label class="block text-primary-dark font-semibold mb-1">Tanggal Berangkat</label>
                <input type="date" name="tgl_berangkat" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="{{ $rencana->tgl_berangkat }}" required>
            </div>
            <div class="flex-1">
                <label class="block text-primary-dark font-semibold mb-1">Tanggal Pulang</label>
                <input type="date" name="tgl_pulang" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="{{ $rencana->tgl_pulang }}" required>
            </div>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Estimasi Biaya</label>
            <input type="number" name="estimasi_biaya" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" value="{{ $rencana->estimasi_biaya }}" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Catatan</label>
            <textarea name="catatan" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">{{ $rencana->catatan }}</textarea>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Status</label>
            <select name="status" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">
                <option value="aktif" @if($rencana->status=='aktif') selected @endif>Aktif</option>
                <option value="selesai" @if($rencana->status=='selesai') selected @endif>Selesai</option>
            </select>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Update</button>
    </form>
</div>
@endsection
