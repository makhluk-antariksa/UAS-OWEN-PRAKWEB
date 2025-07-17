@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Tanaman</h1>
@if($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tanaman.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4" x-data="{ tambahKategori: false }">
    @csrf
    <div>
        <label class="block">Nama Tanaman</label>
        <input type="text" name="nama_tanaman" value="{{ old('nama_tanaman') }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Kategori</label>
        <select name="kategori_id" class="border rounded px-2 py-1 w-full" x-on:change="tambahKategori = ($event.target.value === 'tambah')">
            <option value="">- Pilih Kategori -</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
            @endforeach
            <option value="tambah">+ Tambah Kategori Baru</option>
        </select>
        <div x-show="tambahKategori" class="mt-2">
            <input type="text" name="kategori_baru" placeholder="Nama kategori baru" class="border rounded px-2 py-1 w-full" value="{{ old('kategori_baru') }}">
            <small class="text-gray-500">Isi jika ingin menambah kategori baru</small>
        </div>
    </div>
    <div>
        <label class="block">Deskripsi</label>
        <textarea name="deskripsi" class="border rounded px-2 py-1 w-full">{{ old('deskripsi') }}</textarea>
    </div>
    <div>
        <label class="block">Gambar</label>
        <input type="file" name="gambar" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Tanggal Tanam</label>
        <input type="date" name="tanggal_tanam" value="{{ old('tanggal_tanam') }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi') }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('tanaman.index') }}" class="ml-2 text-gray-600">Batal</a>
    </div>
</form>
<!-- Alpine.js CDN untuk interaksi -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
@endsection 