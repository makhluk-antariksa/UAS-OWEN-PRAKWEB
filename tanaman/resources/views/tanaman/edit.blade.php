@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Tanaman</h1>
@if($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('tanaman.update', $tanaman) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block">Nama Tanaman</label>
        <input type="text" name="nama_tanaman" value="{{ old('nama_tanaman', $tanaman->nama_tanaman) }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Kategori</label>
        <select name="kategori_id" class="border rounded px-2 py-1 w-full">
            <option value="">- Pilih Kategori -</option>
            @foreach($kategoris as $kategori)
                <option value="{{ $kategori->id }}" {{ (old('kategori_id', $tanaman->kategori_id) == $kategori->id) ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block">Deskripsi</label>
        <textarea name="deskripsi" class="border rounded px-2 py-1 w-full">{{ old('deskripsi', $tanaman->deskripsi) }}</textarea>
    </div>
    <div>
        <label class="block">Gambar</label>
        @if($tanaman->gambar)
            <img src="{{ asset('storage/'.$tanaman->gambar) }}" alt="Gambar Tanaman" class="h-24 mb-2">
        @endif
        <input type="file" name="gambar" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Tanggal Tanam</label>
        <input type="date" name="tanggal_tanam" value="{{ old('tanggal_tanam', $tanaman->tanggal_tanam) }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Lokasi</label>
        <input type="text" name="lokasi" value="{{ old('lokasi', $tanaman->lokasi) }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
        <a href="{{ route('tanaman.index') }}" class="ml-2 text-gray-600">Batal</a>
    </div>
</form>
@endsection 