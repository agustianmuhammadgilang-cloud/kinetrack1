<?= $this->extend('layout/staff_template') ?>
<?= $this->section('content') ?>

<style>
    @keyframes bell-swing {
        0%, 100% { transform: rotate(0deg); }
        20% { transform: rotate(15deg); }
        40% { transform: rotate(-10deg); }
        60% { transform: rotate(5deg); }
        80% { transform: rotate(-5deg); }
    }
    .bell-group:hover .bell-icon {
        animation: bell-swing 1s ease-in-out infinite;
    }
    .card-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05);
    }
</style>

<div class="min-h-screen bg-slate-50 px-6 py-8 font-sans text-slate-800">

    <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 mb-10">
        <div>
            <h1 class="text-3xl font-bold text-slate-900 tracking-tight">
                Dashboard Kinerja
            </h1>
            <p class="text-slate-500 mt-1 text-sm">
                Selamat datang kembali, <span class="font-semibold text-slate-700"><?= session('nama') ?></span>.
            </p>
            
            <?php if (!empty($tahunAktif)): ?>
                <div class="mt-3 inline-flex items-center px-3 py-1 rounded-full bg-blue-50 border border-blue-200 shadow-sm">
                    <span class="w-2 h-2 rounded-full bg-blue-600 mr-2 animate-pulse"></span>
                    <span class="text-xs font-semibold text-blue-800 uppercase tracking-wide">
                        Tahun Akademik <?= esc($tahunAktif['tahun']) ?>
                    </span>
                </div>
            <?php endif; ?>
        </div>

        <div class="flex items-center gap-3 self-end md:self-center">
            <div x-data="{ openNotif: false }" class="relative bell-group">
                <button @click="openNotif = !openNotif"
                        class="relative p-2.5 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-300 text-slate-600 hover:text-blue-700 transition-all duration-300">
                    <svg class="w-6 h-6 bell-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span id="notifBadge" class="hidden absolute -top-1 -right-1 bg-rose-500 text-white text-[10px] font-bold px-1.5 py-0.5 rounded-full ring-2 ring-white">0</span>
                </button>

                <div x-show="openNotif" 
                     x-transition:enter="transition ease-out duration-200"
                     x-transition:enter-start="opacity-0 translate-y-2"
                     x-transition:enter-end="opacity-100 translate-y-0"
                     @click.outside="openNotif=false"
                     style="display: none;"
                     class="absolute right-0 mt-3 w-80 bg-white border border-slate-100 shadow-xl rounded-2xl z-50 overflow-hidden ring-1 ring-black/5">
                    <div class="px-4 py-3 border-b border-slate-100 bg-slate-50">
                        <h3 class="text-sm font-semibold text-slate-700">Notifikasi Terbaru</h3>
                    </div>
                    <ul id="notifList" class="max-h-60 overflow-y-auto divide-y divide-slate-50"></ul>
                    <div class="p-3 bg-slate-50 border-t border-slate-100 text-center">
                        <button @click="markAllNotif()" class="text-xs font-medium text-blue-600 hover:underline">Tandai semua dibaca</button>
                    </div>
                </div>
            </div>

            <div class="w-px h-8 bg-slate-200 mx-1 hidden sm:block"></div>

            <div x-data="{ openProfile: false }" class="relative">
                <button @click="openProfile = !openProfile"
                        class="flex items-center gap-3 p-1.5 pr-3 rounded-xl bg-white border border-slate-200 shadow-sm hover:shadow-md hover:border-blue-300 transition-all duration-300 group">
                    <div class="relative">
                        <img src="<?= base_url('uploads/profile/' . (session('foto') ?? 'default.png')) ?>"
                             class="w-9 h-9 rounded-lg object-cover ring-2 ring-slate-100 group-hover:ring-blue-100 transition-all">
                        <div class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-green-500 border-2 border-white rounded-full"></div>
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-xs font-bold text-slate-700 leading-tight tracking-wide uppercase"><?= session('nama') ?></p>
                        <p class="text-[10px] text-slate-400 font-medium tracking-wider">STAFF POLBAN</p>
                    </div>
                    <svg class="w-4 h-4 text-slate-400 group-hover:text-blue-500 transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <div x-show="openProfile" 
                     @click.outside="openProfile = false"
                     style="display: none;"
                     class="absolute right-0 mt-3 w-52 bg-white border border-slate-100 shadow-xl rounded-2xl z-50 overflow-hidden ring-1 ring-black/5">
                    <div class="p-2 space-y-1">
                        <a href="<?= base_url('staff/profile') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-slate-600 hover:bg-blue-50 hover:text-blue-700 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                            Profil Saya
                        </a>
                        <hr class="border-slate-100 mx-2">
                        <a href="<?= base_url('logout') ?>" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-rose-600 hover:bg-rose-50 transition-all">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" /></svg>
                            Keluar Sistem
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-10">
        
        <div class="lg:col-span-2 relative bg-white rounded-2xl p-8 shadow-sm border border-slate-200 card-hover transition-all duration-300 group overflow-hidden">
            <div class="absolute -right-6 -top-6 w-32 h-32 bg-blue-50 rounded-full opacity-50 transition-transform group-hover:scale-110"></div>
            
            <div class="relative z-10">
                <div class="flex items-center gap-2 mb-6 text-blue-600 font-bold text-xs uppercase tracking-[0.2em]">
                    <span class="p-2 bg-blue-100 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2" />
                        </svg>
                    </span>
                    Monitoring Tugas PIC
                </div>
                
                <div class="flex flex-col md:flex-row md:items-end justify-between gap-6">
                    <div>
                        <div class="flex items-baseline gap-2">
                            <h3 class="text-6xl font-black text-slate-800 tracking-tighter"><?= esc($totalPicAktif ?? 0) ?></h3>
                            <span class="text-slate-400 font-semibold text-lg">Indikator Aktif</span>
                        </div>
                        <p class="text-slate-500 mt-2 max-w-sm">Terdapat beberapa tanggung jawab indikator yang memerlukan pembaruan data capaian pada periode ini.</p>
                    </div>
                    
                    <a href="<?= site_url('staff/task') ?>" class="w-full md:w-auto px-6 py-3 bg-slate-900 text-white text-sm font-bold rounded-xl hover:bg-blue-600 transition-colors flex items-center justify-center gap-2 group/btn">
                        Kelola Semua Tugas
                        <svg class="w-4 h-4 transition-transform group-hover/btn:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path d="M13 7l5 5m0 0l-5 5m5-5H6" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>
                    </a>
                </div>
            </div>
        </div>

        <div class="bg-blue-600 rounded-2xl p-8 text-white shadow-lg shadow-blue-200 relative overflow-hidden">
            <svg class="absolute bottom-[-20%] right-[-10%] w-40 h-40 text-blue-500 opacity-50" fill="currentColor" viewBox="0 0 20 20">
                <path d="M2 11a1 1 0 011-1h2a1 1 0 011 1v5a1 1 0 01-1 1H3a1 1 0 01-1-1v-5zM8 7a1 1 0 011-1h2a1 1 0 011 1v9a1 1 0 01-1 1H9a1 1 0 01-1-1V7zM14 2a1 1 0 011-1h2a1 1 0 011 1v14a1 1 0 01-1 1h-2a1 1 0 01-1-1V2z" />
            </svg>
            <div class="relative z-10">
                <h4 class="text-blue-100 text-xs font-bold uppercase tracking-widest mb-4">Status Sistem</h4>
                <p class="text-xl font-medium leading-relaxed mb-6">Pastikan seluruh data pengukuran diinput secara akurat dan tepat waktu.</p>
                <div class="pt-4 border-t border-blue-400/50">
                    <div class="flex items-center justify-between text-sm">
                        <span>Integritas Data</span>
                        <span class="font-bold">100% Verified</span>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bg-white border border-slate-200 rounded-2xl p-6 shadow-sm">
    <div class="flex items-center mb-6">
        <div class="w-1 h-5 bg-blue-600 rounded-full mr-3"></div>
        <h4 class="text-base font-bold text-slate-800 tracking-tight">Aksi Cepat & Navigasi</h4>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
        
        <a href="<?= site_url('staff/task') ?>"
           class="flex flex-col p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-blue-400 hover:shadow-md transition-all group">
            <div class="p-3 w-fit rounded-xl bg-white text-blue-600 shadow-sm group-hover:bg-blue-600 group-hover:text-white transition-all mb-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <span class="block text-sm font-bold text-slate-700">Isi Pengukuran</span>
            <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Input Realisasi</span>
        </a>

        <a href="<?= site_url('staff/activity-logs') ?>"
           class="flex flex-col p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-indigo-400 hover:shadow-md transition-all group">
            <div class="p-3 w-fit rounded-xl bg-white text-indigo-600 shadow-sm group-hover:bg-indigo-600 group-hover:text-white transition-all mb-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <span class="block text-sm font-bold text-slate-700">Log Aktivitas</span>
            <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Riwayat Perubahan</span>
        </a>

        <a href="<?= site_url('staff/grafik') ?>"
           class="flex flex-col p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-emerald-400 hover:shadow-md transition-all group">
            <div class="p-3 w-fit rounded-xl bg-white text-emerald-600 shadow-sm group-hover:bg-emerald-600 group-hover:text-white transition-all mb-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                </svg>
            </div>
            <span class="block text-sm font-bold text-slate-700">Grafik Kinerja</span>
            <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Visualisasi Capaian</span>
        </a>

        <a href="<?= site_url('staff/profile') ?>"
           class="flex flex-col p-5 rounded-2xl bg-slate-50 border border-slate-100 hover:bg-white hover:border-amber-400 hover:shadow-md transition-all group">
            <div class="p-3 w-fit rounded-xl bg-white text-amber-600 shadow-sm group-hover:bg-amber-600 group-hover:text-white transition-all mb-4">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                </svg>
            </div>
            <span class="block text-sm font-bold text-slate-700">Profil Saya</span>
            <span class="text-[10px] text-slate-400 uppercase tracking-wider font-semibold mt-1">Pengaturan Akun</span>
        </a>

    </div>
</div>

    <div class="mt-16 pt-8 border-t border-slate-200 flex flex-col md:flex-row items-center justify-between gap-4">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 bg-slate-200 rounded-lg flex items-center justify-center font-bold text-slate-400 text-xs">KT</div>
            <p class="text-xs text-slate-400 font-medium tracking-wide uppercase">
                © <?= date('Y') ?> <span class="text-slate-600 font-bold">KINETRACK</span> — Politeknik Negeri Bandung
            </p>
        </div>
        <div class="flex gap-6">
            <span class="text-[10px] text-slate-300 uppercase tracking-widest font-bold italic">Reliable</span>
            <span class="text-[10px] text-slate-300 uppercase tracking-widest font-bold italic">Accountable</span>
        </div>
    </div>

</div>

<?= $this->endSection() ?>