@extends('layouts.app')

@section('content')
<h1 class="text-2xl font-bold mb-4">Edit Perawatan</h1>
@if($errors->any())
    <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ route('perawatan.update', $perawatan) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')
    <div>
        <label class="block">Tanaman</label>
        <select name="tanaman_id" class="border rounded px-2 py-1 w-full">
            <option value="">- Pilih Tanaman -</option>
            @foreach($tanamans as $tanaman)
                <option value="{{ $tanaman->id }}" {{ (old('tanaman_id', $perawatan->tanaman_id) == $tanaman->id) ? 'selected' : '' }}>{{ $tanaman->nama_tanaman }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label class="block">Tanggal Perawatan</label>
        <input type="date" name="tanggal_perawatan" value="{{ old('tanggal_perawatan', $perawatan->tanggal_perawatan) }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Jenis Perawatan</label>
        <input type="text" name="jenis_perawatan" value="{{ old('jenis_perawatan', $perawatan->jenis_perawatan) }}" class="border rounded px-2 py-1 w-full">
    </div>
    <div>
        <label class="block">Catatan</label>
        <textarea name="catatan" class="border rounded px-2 py-1 w-full">{{ old('catatan', $perawatan->catatan) }}</textarea>
    </div>
    <div>
        <button type="submit" class="bg-yellow-600 text-white px-4 py-2 rounded hover:bg-yellow-700">Update</button>
        <a href="{{ route('perawatan.index') }}" class="ml-2 text-gray-600">Batal</a>
    </div>
</form>
@endsection 