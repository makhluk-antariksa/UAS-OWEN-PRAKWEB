@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Detail Kategori</h1>
<div class="bg-white rounded shadow p-4 max-w-lg">
    <div class="mb-2"><span class="font-semibold">Nama Kategori:</span> {{ $kategori->nama_kategori }}</div>
    <div class="mb-2"><span class="font-semibold">Deskripsi:</span> {{ $kategori->deskripsi }}</div>
    <a href="{{ route('kategori.index') }}" class="inline-block mt-4 bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700">Kembali</a>
</div>
@endsection 