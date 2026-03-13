<?php

namespace App\Controllers\Atasan;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\TahunAnggaranModel;
use App\Models\TwModel;
use App\Models\PicModel;
use App\Models\NotificationModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $userId = session('user_id');

        // 1. Ambil data user atasan
        $userModel = new UserModel();
        $atasan = $userModel
            ->select('users.*, jabatan.nama_jabatan, bidang.nama_bidang')
            ->join('jabatan', 'jabatan.id = users.jabatan_id', 'left')
            ->join('bidang', 'bidang.id = users.bidang_id', 'left')
            ->find($userId);

        // 2. Tahun Anggaran aktif
        $tahunModel = new TahunAnggaranModel();
        $tahunAktif = $tahunModel->where('status', 'active')->first();

        // 3. Triwulan aktif
        $twModel = new TwModel();
        $twAktif = $twModel->where('is_open', 1)->first();

        // 4. Total PIC aktif (indikator ditugaskan untuk ATASAN)
        $picModel = new PicModel();
        $totalPicAktif = $picModel
            ->where('user_id', $userId)
            ->countAllResults();
     // 6. Notifikasi unread
        $notifModel = new NotificationModel();
        $notifikasi = $notifModel
            ->where('user_id', $userId)
            ->where('status', 'unread')
            ->orderBy('created_at', 'DESC')
            ->findAll();

        return view('atasan/dashboard', [
            'atasan'          => $atasan,
            'tahunAktif'      => $tahunAktif,
            'twAktif'         => $twAktif,
            'totalPicAktif'   => $totalPicAktif,
            'notifikasi'      => $notifikasi,
        ]);
    }
}
