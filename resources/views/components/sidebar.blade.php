<div class="sidebar hidden">
    <ul
        class="flex flex-col gap-2 absolute left-0 z-10 top-14 bottom-0 w-8/12 bg-slate-100 md:w-4/12 lg:w-3/12 xl:w-2/12">
        @if (Auth::check())
            @if (auth()->user()->role === 'Admin')
                <x-navlink href="/dashboard_admin" :active="request()->is('dashboard_admin')">
                    <i class="fas fa-th-large px-2"></i>Dashboard Admin
                </x-navlink>
                <x-navlink href="/manajemen_absensi" :active="request()->is('manajemen_absensi')">
                    <i class="fas fa-calendar-check px-2"></i>Manajemen Absensi
                </x-navlink>
                <x-navlink href="/data_karyawan" :active="request()->is('data_karyawan')">
                    <i class="fa-solid fa-users px-2"></i>Data Karyawan
                </x-navlink>
                <x-navlink href="/jabatan" :active="request()->is('jabatan')">
                    <i class="fa-solid fa-user-tie px-2"></i>Jabatan
                </x-navlink>
                <x-navlink href="/kontrak" :active="request()->is('kontrak')">
                    <i class="fa-solid fa-file-contract px-2"></i>Kontrak
                </x-navlink>
                <x-navlink href="/persetujuan_izin&cuti" :active="request()->is('persetujuan_izin&cuti')">
                    <i class="fa-solid fa-envelope px-2"></i>Persetujuan Izin & Cuti
                </x-navlink>
            @elseif (auth()->user()->role === 'Karyawan')
                <x-navlink href="/dashboard" :active="request()->is('dashboard')">
                    <i class="fas fa-th-large px-2"></i>Dashboard
                </x-navlink>
                <x-navlink href="/" :active="request()->is('/')">
                    <i class="fas fa-calendar-check px-2"></i>Absensi
                </x-navlink>
                <x-navlink href="/riwayat" :active="request()->is('riwayat')">
                    <i class="fa-solid fa-clock-rotate-left px-2"></i>Riwayat
                </x-navlink>
                <x-navlink href="/pengajuan_cutiizin" :active="request()->is('pengajuan_cutiizin')">
                    <i class="fa-solid fa-envelope px-2"></i>Pengajuan Izin & Cuti
                </x-navlink>
            @endif
            <x-navlink href="/profile" :active="request()->is('profile')">
                <i class="fa-solid fa-id-badge px-2"></i>Profile
            </x-navlink>
        @endif
    </ul>
</div>
