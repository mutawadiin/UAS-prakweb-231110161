@extends('layouts.app')
@section('content')
<div class="max-w-5xl mx-auto">
    <div class="flex flex-col md:flex-row md:justify-between md:items-center mb-6 gap-2">
        <div>
            <h1 class="text-3xl font-bold text-primary-dark flex items-center gap-2">
                <i class="fa-solid fa-route"></i> Daftar Perjalanan
            </h1>
            <p class="text-gray-500 mt-1 text-sm">Catat dan kelola perjalanan yang dilakukan dalam setiap rencana liburan.</p>
        </div>
        <a href="{{ route('perjalanan.create') }}" class="bg-accent hover:bg-primary text-white px-5 py-2 rounded-lg shadow transition font-semibold flex items-center gap-2">
            <i class="fa fa-plus"></i> Tambah Perjalanan
        </a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-3 mb-4 rounded shadow flex items-center gap-2"><i class="fa fa-check-circle"></i> {{ session('success') }}</div>
    @endif
    <div class="bg-white rounded-xl shadow-lg overflow-x-auto">
        @if($perjalanan->count() > 0)
        <table class="min-w-full divide-y divide-gray-200">
            <thead>
                <tr class="bg-primary-light text-white">
                    <th class="py-3 px-4 text-left">Rencana</th>
                    <th class="py-3 px-4 text-left">Peserta</th>
                    <th class="py-3 px-4 text-left">Kegiatan</th>
                    <th class="py-3 px-4 text-left">Status</th>
                    <th class="py-3 px-4 text-left">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
                @foreach($perjalanan as $item)
                <tr class="hover:bg-background-light transition {{ $loop->even ? 'bg-gray-50' : '' }}">
                    <td class="py-2 px-4 font-semibold text-primary-dark">{{ $item->rencana->nama_rencana ?? '-' }}</td>
                    <td class="px-4">
                        <div class="flex flex-col gap-1">
                            @foreach($item->peserta as $p)
                                <span class="inline-block bg-info text-primary-dark px-2 py-1 rounded text-xs font-semibold">{{ $p->nama }}</span>
                            @endforeach
                        </div>
                    </td>
                    <td class="px-4">{{ $item->kegiatan }}</td>
                    <td class="px-4">
                        <span class="px-3 py-1 rounded-full text-xs font-bold shadow {{ $item->status == 'aktif' ? 'bg-accent text-white' : 'bg-info text-primary-dark' }}">
                            <i class="fa fa-circle {{ $item->status == 'aktif' ? 'text-green-300' : 'text-info' }} mr-1"></i> {{ ucfirst($item->status) }}
                        </span>
                    </td>
                    <td class="px-4 flex gap-2">
                        <a href="{{ route('perjalanan.show', $item->id) }}" class="text-info hover:underline flex items-center gap-1"><i class="fa fa-eye"></i> Lihat</a>
                        <a href="{{ route('perjalanan.edit', $item->id) }}" class="text-primary hover:underline flex items-center gap-1"><i class="fa fa-pen"></i> Edit</a>
                        <form action="{{ route('perjalanan.destroy', $item->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline flex items-center gap-1" onclick="return confirm('Yakin hapus?')"><i class="fa fa-trash"></i> Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="flex flex-col items-center justify-center py-16 text-gray-400">
            <i class="fa fa-route text-6xl mb-4"></i>
            <p class="text-lg font-semibold">Belum ada perjalanan tercatat.</p>
            <a href="{{ route('perjalanan.create') }}" class="mt-4 bg-accent hover:bg-primary text-white px-4 py-2 rounded-lg shadow flex items-center gap-2"><i class="fa fa-plus"></i> Tambah Perjalanan Pertama</a>
        </div>
        @endif
    </div>
</div>
@endsection 