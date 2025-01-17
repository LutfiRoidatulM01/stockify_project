<?php

namespace App\Services\admin;

use App\Repositories\admin\PengaturanStokRepository;

class PengaturanStokService
{
    protected $pengaturanStokRepository;

    public function __construct(PengaturanStokRepository $pengaturanStokRepository)
    {
        $this->pengaturanStokRepository = $pengaturanStokRepository;
    }

    public function updateMinimumStock($id, $minimumStock)
    {
        return $this->pengaturanStokRepository->updateMinimumStock($id, $minimumStock);
    }
}
