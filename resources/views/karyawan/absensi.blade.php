<x-layout>
    <x-slot:title>{{ $title }}</x-slot:title>

    <br>
    <br>
    <div class="flex-1 flex items-center justify-center ">
        <div class="max-w-lg w-full bg-gray-300 p-8 rounded-lg shadow-lg shadow shadow-black">
            <h1 class="text-2xl font-bold mb-6 text-center">Formulir Absensi</h1>

            <form action="{{ route('karyawan.absensi.submit') }}" method="POST" >
                @csrf
                <div class="mb-4 ">
                    <label for="nama" class="block text-sm font-medium text-gray-800">Nama</label>
                    <input
                        type="text"
                        name="nama"
                        id="nama"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-400"
                        value="{{ Auth::user()->name }}" >
                </div>
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <div class="mb-4">
                    <label for="status" class="block text-sm font-medium text-gray-700">Status Kehadiran</label>
                    <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                        <option value="Hadir">Hadir</option>
                        <option value="Sakit">Sakit</option>
                        <option value="Cuti">Cuti</option>
                        <option value="Alpa">Alpa</option>
                        <option value="Izin">Izin</option>
                    </select>
                </div>

                <button type="submit" class="w-full py-2 px-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 mt-4">
                    Absen Sekarang
                </button>
            </form>
        </div>
    </div>
</x-layout>
