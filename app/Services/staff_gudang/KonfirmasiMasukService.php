<?php

namespace App\Services\staff_gudang;

use App\Repositories\staff_gudang\KonfirmasiMasukRepository;

class KonfirmasiMasukService
{
    protected $repository;

    public function __construct(KonfirmasiMasukRepository $repository)
    {
        $this->repository = $repository;
    }


    public function approveTransaction($id, $notes = null)
    {
     
        return $this->repository->updateStatus($id, 'diterima', $notes);
    }

    public function rejectTransaction($id, $notes = null)
    {
       
        return $this->repository->updateStatus($id, 'ditolak', $notes);
    }
}
