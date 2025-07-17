@extends('layouts.app')
@section('content')
<div class="max-w-xl mx-auto bg-white rounded-xl shadow-lg p-8">
    <h1 class="text-2xl font-bold mb-6 text-primary-dark">Detail Peserta</h1>
    <div class="space-y-2">
        <p><span class="font-semibold text-primary-dark">Nama:</span> {{ $peserta->nama }}</p>
        <p><span class="font-semibold text-primary-dark">Alamat:</span> {{ $peserta->alamat }}</p>
        <p><span class="font-semibold text-primary-dark">No. Telp:</span> {{ $peserta->no_telp }}</p>
        <p><span class="font-semibold text-primary-dark">Email:</span> {{ $peserta->email }}</p>
        <p><span class="font-semibold text-primary-dark">Identitas:</span> {{ $peserta->identitas }}</p>
    </div>
    <a href="{{ route('peserta.index') }}" class="mt-6 inline-block text-primary hover:underline">Kembali ke Daftar</a>
</div>
@endsection 