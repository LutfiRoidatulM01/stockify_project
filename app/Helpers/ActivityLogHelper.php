<?php

namespace App\Helpers;

use App\Models\UserActivity; // Model UserActivity
use Illuminate\Support\Facades\Auth; // Untuk mendapatkan user yang login

class ActivityLogHelper
{
    /**
     * Fungsi untuk mencatat aktivitas ke tabel UserActivity
     *
     * @param string $message - Pesan log aktivitas
     */
    public static function log($message)
    {
        // Cek apakah user sedang login
        if (Auth::check()) {
            UserActivity::create([
                'user_id' => Auth::id(), // ID user yang login
                'log' => $message,       // Pesan aktivitas
            ]);
        }
    }
}
