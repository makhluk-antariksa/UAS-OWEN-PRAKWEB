@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detail Perawatan</h1>
<div class="bg-white rounded shadow p-4 max-w-lg">
    <div class="mb-2"><span class="font-semibold">Tanaman:</span> {{ $perawatan->tanaman->nama_tanaman ?? '-' }}</div>
    <div class="mb-2"><span class="font-semibold">Tanggal Perawatan:</span> {{ $perawatan->tanggal_perawatan }}</div>
    <div class="mb-2"><span class="font-semibold">Jenis Perawatan:</span> {{ $perawatan->jenis_perawatan }}</div>
    <div class="mb-2"><span class="font-semibold">Catatan:</span> {{ $perawatan->catatan }}</div>
    <a href="{{ route('perawatan.index') }}" class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
</div>
@endsection 