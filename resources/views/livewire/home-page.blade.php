{{-- resources/views/livewire/home-page.blade.php --}}
<div class="min-h-screen bg-gray-50">
    <!-- Header/Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center space-x-2">
                    <div class="w-10 h-10 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-xl">🏠</span>
                    </div>
                    <span class="text-2xl font-bold text-gray-800">KOSKU</span>
                </div>
                <div class="space-x-4">
                    <a href="#promosi" class="text-gray-600 hover:text-blue-600">Promosi</a>
                    <a href="#fasilitas" class="text-gray-600 hover:text-blue-600">Fasilitas</a>
                    <a href="#kamar" class="text-gray-600 hover:text-blue-600">Kamar</a>
                    <a href="#lokasi" class="text-gray-600 hover:text-blue-600">Lokasi</a>
                    <a href="{{ route('login') }}" 
                       class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Masuk
                    </a>
                    <a href="{{ route('register') }}" 
                       class="border border-blue-600 text-blue-600 px-6 py-2 rounded-lg hover:bg-blue-50 transition">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="bg-gradient-to-r from-blue-600 to-blue-800 text-white py-20">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-5xl font-bold mb-6">Temukan Kos Nyaman & Terjangkau</h1>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Kos dengan fasilitas lengkap, lokasi strategis, dan harga bersahabat. 
                Booking sekarang dan dapatkan promo spesial!
            </p>
            <a href="#kamar" 
               class="bg-white text-blue-600 px-8 py-3 rounded-lg text-lg font-semibold hover:bg-gray-100 transition inline-block">
                Lihat Kamar Tersedia
            </a>
        </div>
    </section>

    <!-- Promosi Section -->
    <section id="promosi" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">💎 Promo Spesial</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                @foreach($promosi as $promo)
                <div class="{{ $promo['color'] }} p-6 rounded-xl shadow-md hover:shadow-lg transition">
                    <div class="text-4xl mb-4">{{ $promo['icon'] }}</div>
                    <h3 class="text-xl font-bold mb-2">{{ $promo['title'] }}</h3>
                    <p class="text-gray-600">{{ $promo['description'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Fasilitas Section -->
    <section id="fasilitas" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">✨ Fasilitas Unggulan</h2>
            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6">
                @foreach($fasilitas as $fasil)
                <div class="bg-white p-6 rounded-xl shadow-sm text-center hover:shadow-md transition">
                    <div class="text-3xl mb-3">{{ $fasil['icon'] }}</div>
                    <h4 class="font-bold mb-1">{{ $fasil['name'] }}</h4>
                    <p class="text-sm text-gray-500">{{ $fasil['desc'] }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Kamar Tersedia Section -->
    <section id="kamar" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">🚪 Kamar Tersedia</h2>
            
            @if($kamarTersedia->count() > 0)
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($kamarTersedia as $kamar)
                <div class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    @if($kamar->foto)
                    <img src="{{ asset('storage/' . $kamar->foto) }}" 
                         alt="{{ $kamar->nama_kamar }}" 
                         class="w-full h-48 object-cover">
                    @else
                    <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                        <span class="text-4xl">🛏️</span>
                    </div>
                    @endif
                    
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold">{{ $kamar->nama_kamar }}</h3>
                                <p class="text-gray-500">No. {{ $kamar->nomor_kamar }}</p>
                            </div>
                            <span class="bg-green-100 text-green-800 px-3 py-1 rounded-full text-sm">
                                {{ strtoupper($kamar->status) }}
                            </span>
                        </div>
                        
                        <p class="text-gray-600 mb-4 line-clamp-2">{{ $kamar->deskripsi }}</p>
                        
                        @if($kamar->fasilitas)
                        <div class="mb-4">
                            <p class="text-sm text-gray-500 mb-2">Fasilitas:</p>
                            <div class="flex flex-wrap gap-2">
                                @foreach(explode(',', $kamar->fasilitas) as $fasil)
                                <span class="bg-gray-100 px-3 py-1 rounded-full text-sm">
                                    {{ trim($fasil) }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                        @endif
                        
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between items-center">
                                <span>3 Bulan</span>
                                <span class="font-bold text-lg">Rp {{ number_format($kamar->harga_3bulan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>6 Bulan</span>
                                <span class="font-bold text-lg">Rp {{ number_format($kamar->harga_6bulan, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <span>1 Tahun</span>
                                <span class="font-bold text-lg">Rp {{ number_format($kamar->harga_1tahun, 0, ',', '.') }}</span>
                            </div>
                        </div>
                        
                        <div class="flex space-x-3">
                            <a href="{{ route('login') }}" 
                               class="flex-1 bg-blue-600 text-white text-center py-3 rounded-lg hover:bg-blue-700 transition font-semibold">
                                Booking Sekarang
                            </a>
                            <button class="bg-gray-100 text-gray-700 px-4 rounded-lg hover:bg-gray-200 transition">
                                💬
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @else
            <div class="text-center py-12">
                <div class="text-6xl mb-4">😔</div>
                <h3 class="text-2xl font-bold mb-2">Kamar Sedang Penuh</h3>
                <p class="text-gray-600">Silahkan hubungi admin untuk informasi kamar terbaru</p>
            </div>
            @endif
        </div>
    </section>

    <!-- Lokasi Section -->
    <section id="lokasi" class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">📍 Lokasi Strategis</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Kos Mahasiswa Premium</h3>
                    <p class="text-gray-600 mb-6">
                        Terletak di jantung kota, dekat dengan kampus, mall, dan fasilitas umum. 
                        Akses transportasi mudah dan lingkungan yang aman.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-xl">🏫</span>
                            </div>
                            <div>
                                <p class="font-semibold">Dekat Kampus</p>
                                <p class="text-gray-500">5 menit ke Universitas</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-xl">🛒</span>
                            </div>
                            <div>
                                <p class="font-semibold">Dekat Mall</p>
                                <p class="text-gray-500">10 menit ke pusat perbelanjaan</p>
                            </div>
                        </div>
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-blue-100 rounded-lg flex items-center justify-center mr-4">
                                <span class="text-xl">🚌</span>
                            </div>
                            <div>
                                <p class="font-semibold">Akses Transportasi</p>
                                <p class="text-gray-500">Halte bus & stasiun dekat</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-200 h-96 rounded-xl overflow-hidden">
                    <!-- Google Maps Embed atau gambar lokasi -->
                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-blue-400 to-blue-600">
                        <div class="text-center text-white">
                            <div class="text-6xl mb-4">🗺️</div>
                            <p class="text-xl font-semibold">Jl. Contoh No. 123</p>
                            <p class="text-lg">Jakarta Pusat</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center space-x-2 mb-4">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-xl">🏠</span>
                        </div>
                        <span class="text-2xl font-bold">KOSKU</span>
                    </div>
                    <p class="text-gray-300">
                        Penyedia kos nyaman dengan fasilitas lengkap dan harga terjangkau.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <span class="mr-2">📞</span> 0812-3456-7890
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">📧</span> info@kosku.com
                        </li>
                        <li class="flex items-center">
                            <span class="mr-2">📍</span> Jl. Contoh No. 123, Jakarta
                        </li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Tautan Cepat</h4>
                    <ul class="space-y-2">
                        <li><a href="#promosi" class="text-gray-300 hover:text-white">Promosi</a></li>
                        <li><a href="#fasilitas" class="text-gray-300 hover:text-white">Fasilitas</a></li>
                        <li><a href="#kamar" class="text-gray-300 hover:text-white">Kamar</a></li>
                        <li><a href="#lokasi" class="text-gray-300 hover:text-white">Lokasi</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-bold mb-4">Jam Operasional</h4>
                    <ul class="space-y-2">
                        <li>Senin - Jumat: 08:00 - 17:00</li>
                        <li>Sabtu: 08:00 - 15:00</li>
                        <li>Minggu: 10:00 - 14:00</li>
                    </ul>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} KOSKU. All rights reserved.</p>
            </div>
        </div>
    </footer>
</div>

@push('styles')
<style>
.line-clamp-2 {
    overflow: hidden;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
}
</style>
@endpush