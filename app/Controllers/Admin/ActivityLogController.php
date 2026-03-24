<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\ActivityLogModel;

class ActivityLogController extends BaseController
{
    protected $activityLogModel;

    public function __construct()
    {
        // Inisialisasi model log aktivitas
        $this->activityLogModel = new ActivityLogModel();
    }

    /**
     * Menampilkan semua log aktivitas (Khusus Role Admin)
     */
    public function index()
    {
        // Proteksi akses: Hanya admin yang boleh melihat seluruh log sistem
        if (session()->get('role') !== 'admin') {
            return redirect()->back()->with('error', 'Akses ditolak: Anda tidak memiliki otoritas.');
        }

        // Mengambil 100 data aktivitas terbaru untuk monitoring
        $limit = 100; 

        $data = [
            'title' => 'Audit Log System',
            'logs'  => $this->activityLogModel->getAllLogsWithUser($limit), 
        ];

        return view('admin/activity_logs/index', $data);
    }

    /**
     * Menampilkan log aktivitas milik user yang sedang login (Staff / Atasan / Pimpinan)
     */
    public function myLogs()
    {
        $userId = session()->get('user_id');

        $data = [
            'title' => 'Log Aktivitas Saya',
            // Mengambil 50 aktivitas terakhir khusus untuk user terkait
            'logs'  => $this->activityLogModel->getLogsByUser($userId, 50),
        ];

        return view('admin/activity_logs/my_logs', $data);
    }
}