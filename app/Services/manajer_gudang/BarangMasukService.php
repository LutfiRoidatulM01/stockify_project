<?php

namespace App\Services\manajer_gudang;

use App\Repositories\manajer_gudang\BarangMasukRepository;

class BarangMasukService
{
    protected $repository;

    public function __construct(BarangMasukRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllMasukTransactions()
    {
        return $this->repository->getAllMasukTransactions();
    }

    public function createTransaction($data)
    {
        return $this->repository->createTransaction($data);
    }

    public function getTransactionById($id)
    {
        return $this->repository->getTransactionById($id);
    }

    public function updateTransaction($id, $data)
    {
        return $this->repository->updateTransaction($id, $data);
    }

    public function deleteTransaction($id)
    {
        return $this->repository->deleteTransaction($id);
    }
}
