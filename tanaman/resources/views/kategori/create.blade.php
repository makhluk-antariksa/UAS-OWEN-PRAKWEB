@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Tambah Kategori</h1>
@if($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('kategori.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
        <label class="block">Nama Kategori</label>
        <input type="text" name="nama_kategori" value="{{ old('nama_kategori') }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Deskripsi</label>
        <textarea name="deskripsi" class="border rounded px-2 py-1 w-full">{{ old('deskripsi') }}</textarea>
    </div>
    <div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Simpan</button>
        <a href="{{ route('kategori.index') }}" class="ml-2 text-gray-600">Batal</a>
    </div>
</form>
@endsection 