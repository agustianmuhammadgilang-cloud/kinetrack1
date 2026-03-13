<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\JabatanModel;
use App\Models\BidangModel;
use App\Models\TahunAnggaranModel;
use App\Models\TwModel;
use App\Models\IndikatorModel;
use App\Models\PengukuranModel;
use App\Models\NotificationModel;



class Dashboard extends BaseController
{
    protected $notifModel;

    public function __construct()
    {
        $this->notifModel = new NotificationModel();
    }

    public function index()
    {
        $userModel       = new UserModel();
        $jabatanModel    = new JabatanModel();
        $bidangModel     = new BidangModel();
        $tahunModel      = new TahunAnggaranModel();
        $twModel         = new TwModel();
        $indikatorModel  = new IndikatorModel();
        $pengukuranModel = new PengukuranModel();
        

        $userId = session('user_id');

        /* ===============================
         * A. RINGKASAN SISTEM
         * =============================== */
        $totalUser    = $userModel->countAllResults();
        $totalJabatan = $jabatanModel->countAllResults();
        $totalUnit    = $bidangModel->countAllResults();

        /* ===============================
         * B. TAHUN ANGGARAN AKTIF
         * =============================== */
        $tahunAktif = $tahunModel
            ->where('status', 'active')
            ->first();

        /* ===============================
         * C. TRIWULAN AKTIF
         * =============================== */
        $twAktif = null;
        if ($tahunAktif) {
            $twAktif = $twModel
                ->where('tahun_id', $tahunAktif['id'])
                ->where('is_open', 1)
                ->first();
        }

        /* ===============================
 * D. PROGRES KINERJA GLOBAL (TAHUN AKTIF)
 * =============================== */
$totalIndikator = 0;
$indikatorTerisi = 0;

if ($tahunAktif) {

    // TOTAL INDIKATOR PADA TAHUN AKTIF
    $totalIndikator = $indikatorModel
        ->join(
            'sasaran_strategis',
            'sasaran_strategis.id = indikator_kinerja.sasaran_id'
        )
        ->where('sasaran_strategis.tahun_id', $tahunAktif['id'])
        ->countAllResults();

    // INDIKATOR YANG SUDAH DIISI (DISTINCT)
    $indikatorTerisi = $pengukuranModel
        ->select('pengukuran_kinerja.indikator_id')
        ->where('pengukuran_kinerja.tahun_id', $tahunAktif['id'])
        ->groupBy('pengukuran_kinerja.indikator_id')
        ->countAllResults();
}

$indikatorBelumTerisi = max(0, $totalIndikator - $indikatorTerisi);

$persentaseProgres = $totalIndikator > 0
    ? round(($indikatorTerisi / $totalIndikator) * 100, 2)
    : 0;

/* ===============================
 * E. KATEGORI DOKUMEN (ADMIN)
 * =============================== */

        /* ===============================
         * F. NOTIFIKASI
         * =============================== */
        $notifications = $this->notifModel
            ->where('user_id', $userId)
            ->orderBy('created_at', 'DESC')
            ->limit(5)
            ->findAll();

        $unreadCount = $this->notifModel
            ->where('user_id', $userId)
            ->where('status', 'unread')
            ->countAllResults();

        /* ===============================
         * DATA KE VIEW
         * =============================== */
        return view('admin/dashboard', [
            'total_user'       => $totalUser,
            'total_jabatan'    => $totalJabatan,
            'total_unit'       => $totalUnit,

            'tahun_aktif'      => $tahunAktif,
            'tw_aktif'         => $twAktif,

            'total_indikator'        => $totalIndikator,
            'indikator_terisi'       => $indikatorTerisi,
            'indikator_belum_terisi' => $indikatorBelumTerisi,
            'persentase_progres'     => $persentaseProgres,

            'notifications'    => $notifications,
            'unreadCount'      => $unreadCount,
        ]);
    }

    public function markRead($id)
    {
        $this->notifModel->update($id, ['status' => 'read']);
        return $this->response->setJSON(['success' => true]);
    }

    public function markAllRead()
{
    $userId = session('user_id');

    $this->notifModel
        ->where('user_id', $userId)
        ->where('status', 'unread')
        ->set(['status' => 'read'])
        ->update();

    return $this->response->setJSON([
        'success' => true
    ]);
}

}
