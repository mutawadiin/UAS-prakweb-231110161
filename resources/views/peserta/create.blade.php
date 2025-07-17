@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Tambah Peserta</h1>
    @if($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 px-4 py-2 rounded shadow">
            {{ $errors->first() }}
        </div>
    @endif
    <form action="{{ route('peserta.store') }}" method="POST" class="space-y-5">
        @csrf
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Nama</label>
            <input type="text" name="nama" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Alamat</label>
            <input type="text" name="alamat" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">No. Telp</label>
            <input type="text" name="no_telp" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Email</label>
            <input type="email" name="email" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent">
        </div>
        <div>
            <label class="block text-primary-dark font-semibold mb-1">Identitas (KTP/SIM)</label>
            <input type="text" name="identitas" class="border border-primary-light rounded-lg w-full px-3 py-2 focus:ring-2 focus:ring-accent" required>
        </div>
        <button type="submit" class="w-full bg-accent hover:bg-primary text-white font-bold py-2 rounded-lg shadow transition">Simpan</button>
    </form>
</div>
@endsection 