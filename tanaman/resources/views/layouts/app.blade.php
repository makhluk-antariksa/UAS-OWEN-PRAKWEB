<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Tanaman & Perawatan</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen" style="background-image: url('https://www.rukita.co/stories/wp-content/uploads/2020/10/merawat-tanaman-indoor.jpg'); background-size: cover; background-position: center;">
    <div class="min-h-screen w-full" style="background: rgba(255,255,255,0.85);">
    <nav class="bg-green-700 text-white px-4 py-3 mb-6 shadow flex gap-4 items-center">
        <a href="/" class="font-bold text-lg hover:underline">Home</a>
        <a href="/dashboard" class="hover:underline">Dashboard</a>
        <a href="/tanaman" class="hover:underline">Tanaman</a>
        <a href="/kategori" class="hover:underline">Kategori</a>
        <a href="/perawatan" class="hover:underline">Perawatan</a>
    </nav>
    <div class="container mx-auto px-4">
        @yield('content')
    </div>
    </div>
</body>
</html> 