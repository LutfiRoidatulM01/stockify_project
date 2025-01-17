<?php

namespace App\Repositories\admin;

use App\Models\UserActivity;

class LaporanAktivitasRepository
{
    public function getAllActivities()
    {
        return UserActivity::all();
    }
}
