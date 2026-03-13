<?= $this->extend('layout/admin_template') ?>
<?= $this->section('content') ?>

<div class="px-6 py-8 max-w-4xl mx-auto font-sans text-slate-800">
    <div class="flex items-center gap-4 mb-8">
        <div class="w-12 h-12 bg-amber-50 rounded-2xl flex items-center justify-center text-amber-600 shadow-sm border border-amber-100">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
            </svg>
        </div>
        <div>
            <h3 class="text-2xl font-black text-slate-900 tracking-tight">Edit Indikator <span class="text-blue-900">Kinerja</span></h3>
            <p class="text-[11px] text-slate-400 font-bold uppercase tracking-widest mt-1">Pemutakhiran Deskripsi & Parameter Strategis</p>
        </div>
    </div>

    <div class="bg-white rounded-[24px] border border-slate-200 shadow-sm overflow-hidden">
        <?php if (session()->getFlashdata('error')): ?>
            <div class="m-6 p-4 rounded-xl bg-rose-50 border border-rose-100 text-rose-700 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                <?= session()->getFlashdata('error') ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('admin/indikator/update/'.$indikator['id']) ?>" method="post" class="p-8 space-y-8">
            
            <div class="bg-slate-50 p-6 rounded-2xl border border-slate-100 space-y-4">
                <div class="flex items-center gap-2 mb-2">
                    <span class="px-2 py-1 bg-slate-200 text-slate-600 rounded text-[9px] font-black uppercase tracking-tighter">Read Only Mode</span>
                </div>
                
                <div>
                    <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Sasaran Strategis</label>
                    <div class="flex items-start gap-3 p-3 bg-white border border-slate-200 rounded-xl">
                        <svg class="w-5 h-5 text-blue-900 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                        <span class="text-sm font-bold text-slate-700">
                            <?php foreach($sasaran as $s): ?>
                                <?php if ($s['id'] == $indikator['sasaran_id']): ?>
                                    <?= esc($s['kode_sasaran']) ?> — <?= esc($s['nama_sasaran']) ?> 
                                    <span class="ml-2 text-blue-600 text-xs">(TA <?= esc($s['tahun']) ?>)</span>
                                <?php endif ?>
                            <?php endforeach ?>
                        </span>
                    </div>
                    <input type="hidden" name="sasaran_id" value="<?= $indikator['sasaran_id'] ?>">
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Kode Indikator</label>
                        <input type="text" value="<?= $indikator['kode_indikator'] ?>" disabled class="w-full bg-slate-100 border-slate-200 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-500 cursor-not-allowed">
                        <input type="hidden" name="kode_indikator" value="<?= $indikator['kode_indikator'] ?>">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Satuan</label>
                        <input type="text" value="<?= $indikator['satuan'] ?>" disabled class="w-full bg-slate-100 border-slate-200 rounded-xl px-4 py-2.5 text-sm font-bold text-slate-500 cursor-not-allowed">
                        <input type="hidden" name="satuan" value="<?= $indikator['satuan'] ?>">
                    </div>

                    <div>
                        <label class="block text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-2">Target PK</label>
                        <input type="text" value="<?= $indikator['target_pk'] ?>" disabled class="w-full bg-slate-100 border-slate-200 rounded-xl px-4 py-2.5 text-sm font-black text-blue-900/50 cursor-not-allowed">
                        <input type="hidden" name="target_pk" value="<?= $indikator['target_pk'] ?>">
                    </div>
                </div>
            </div>

            <div class="space-y-6">
                <div class="flex items-center gap-3">
                    <div class="h-px bg-slate-100 grow"></div>
                    <span class="text-[10px] font-black text-blue-600 uppercase tracking-widest bg-blue-50 px-3 py-1 rounded-full border border-blue-100">Editor Utama</span>
                    <div class="h-px bg-slate-100 grow"></div>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-3 flex items-center gap-2">
                        Nama Indikator Kinerja
                        <span class="w-1.5 h-1.5 bg-blue-600 rounded-full animate-pulse"></span>
                    </label>
                    <textarea name="nama_indikator" required 
                              class="w-full h-32 p-4 bg-white border-2 border-slate-200 rounded-2xl text-sm font-medium focus:border-blue-600 focus:ring-4 focus:ring-blue-50 outline-none transition-all duration-300 resize-none shadow-sm"
                              placeholder="Contoh: Persentase lulusan yang mendapatkan pekerjaan dalam waktu 6 bulan..."><?= esc($indikator['nama_indikator']) ?></textarea>
                </div>

                <div>
                    <label class="block text-[11px] font-black text-slate-700 uppercase tracking-wider mb-4 text-center">Distribusi Target Triwulan</label>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                        <?php for ($i=1; $i<=4; $i++): ?>
                        <div class="group relative bg-white border border-slate-100 rounded-2xl p-4 shadow-sm hover:shadow-md transition-all">
                            <label class="block text-[9px] font-black text-slate-400 text-center uppercase mb-2">TW <?= $i ?></label>
                            <div class="text-center font-black text-slate-600 text-lg">
                                <?= $indikator['target_tw'.$i] ?>
                            </div>
                            <input type="hidden" name="target_tw<?= $i ?>" value="<?= $indikator['target_tw'.$i] ?>">
                            <div class="absolute top-2 right-2 text-slate-300">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"></path></svg>
                            </div>
                        </div>
                        <?php endfor ?>
                    </div>
                </div>
            </div>

            <div class="flex flex-col sm:flex-row items-center justify-between gap-4 pt-8 border-t border-slate-100">
                <div class="flex items-center gap-2 text-slate-400">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    <p class="text-[10px] font-medium italic">Hanya deskripsi indikator yang diperbolehkan untuk diubah secara langsung.</p>
                </div>
                
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <a href="<?= base_url('admin/indikator') ?>" 
                       class="flex-1 sm:flex-none text-center px-6 py-3 rounded-xl text-sm font-bold text-slate-500 hover:bg-slate-50 transition-all border border-transparent hover:border-slate-200">
                        Batal
                    </a>
                    <button type="submit" 
                            class="flex-1 sm:flex-none px-8 py-3 bg-blue-900 text-white rounded-xl text-sm font-bold shadow-lg shadow-blue-900/20 hover:bg-blue-800 hover:-translate-y-0.5 transition-all">
                        Simpan Perubahan
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>