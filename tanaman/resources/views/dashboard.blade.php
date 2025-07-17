@extends('layouts.app')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard</h1>
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-green-100 border-l-4 border-green-600 p-6 rounded shadow">
        <div class="text-2xl font-bold text-green-700">{{ \App\Models\Tanaman::count() }}</div>
        <div class="text-gray-700">Total Tanaman</div>
    </div>
    <div class="bg-blue-100 border-l-4 border-blue-600 p-6 rounded shadow">
        <div class="text-2xl font-bold text-blue-700">{{ \App\Models\Kategori::count() }}</div>
        <div class="text-gray-700">Total Kategori</div>
    </div>
    <div class="bg-yellow-100 border-l-4 border-yellow-600 p-6 rounded shadow">
        <div class="text-2xl font-bold text-yellow-700">{{ \App\Models\Perawatan::count() }}</div>
        <div class="text-gray-700">Total Perawatan</div>
    </div>
</div>
<div class="bg-white rounded shadow p-6">
    <h2 class="text-xl font-semibold mb-2">Halo, Selamat Datang! Saya Owen👋</h2>
    <p class="text-gray-700">Bagikan tanammu, baca tips berkebun, dan ikuti event seru bersama pecinta tanaman lainnya.
<br><br>
Semua fitur CRUD, pencarian cepat, dan validasi data sudah adaaa, siap bantuin kamu buat merawat tanaman supaya lebih terstruktur dan efisien!
</p></p>
</div>
@endsection 