<?php

namespace App\Services\staff_gudang;

use App\Repositories\staff_gudang\KonfirmasiKeluarRepository;

class KonfirmasiKeluarService
{
    protected $repository;

    public function __construct(KonfirmasiKeluarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function confirmTransaction($id, $notes = null)
    {
        return $this->repository->updateStatus($id, 'dikeluarkan', $notes);
    }
}
