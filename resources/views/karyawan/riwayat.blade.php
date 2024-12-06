<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-4 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Absensi</h1>

        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Tanggal</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Waktu Masuk</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Waktu Keluar</th>
                        <th class="text-left px-6 py-3 text-sm font-medium text-gray-600 border-b">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($absensi as $item)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-gray-800 border-b">{{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ \Carbon\Carbon::parse($item->waktu_masuk)->format('H:i') }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->waktu_keluar ? \Carbon\Carbon::parse($item->waktu_keluar)->format('H:i') : 'Belum keluar' }}</td>
                            <td class="px-6 py-4 text-gray-800 border-b">{{ $item->status }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center text-gray-500">Tidak ada riwayat absensi</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
