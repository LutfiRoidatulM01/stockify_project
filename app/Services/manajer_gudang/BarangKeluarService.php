<?php

namespace App\Services\manajer_gudang;

use App\Repositories\manajer_gudang\BarangKeluarRepository;

class BarangKeluarService
{
    protected $repository;

    public function __construct(BarangKeluarRepository $repository)
    {
        $this->repository = $repository;
    }

    public function getAllKeluarTransactions()
    {
        return $this->repository->getAllKeluarTransactions();
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
