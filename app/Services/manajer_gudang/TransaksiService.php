<?php

namespace App\Services\manajer_gudang;

use App\Repositories\manajer_gudang\TransaksiRepository;

class TransaksiService
{
    protected $transaksiRepository;

    public function __construct(TransaksiRepository $transaksiRepository)
    {
        $this->transaksiRepository = $transaksiRepository;
    }

    public function getAllTransactions()
    {
        return $this->transaksiRepository->getAll();
    }

    public function getTransactionById($id)
    {
        return $this->transaksiRepository->findById($id);
    }

    public function createTransaction(array $data)
    {
        return $this->transaksiRepository->create($data);
    }

    public function updateTransaction($id, array $data)
    {
        return $this->transaksiRepository->update($id, $data);
    }

    public function deleteTransaction($id)
    {
        return $this->transaksiRepository->delete($id);
    }
}
