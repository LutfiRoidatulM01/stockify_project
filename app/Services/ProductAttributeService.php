<?php

namespace App\Services;


use App\Repositories\ProductAttributeRepository;

class ProductAttributeService
{
    protected $productAttributeRepository;

    public function __construct(ProductAttributeRepository $productAttributeRepository)
    {
        $this->productAttributeRepository = $productAttributeRepository;
    }

    public function getAllAttributes()
    {
        return $this->productAttributeRepository->getAll();
    }

    public function getAttributeById($id)
    {
        return $this->productAttributeRepository->findById($id);
    }

    public function createAttribute($data)
    {
        return $this->productAttributeRepository->create($data);
    }

    public function updateAttribute($id, $data)
    {
        return $this->productAttributeRepository->update($id, $data);
    }

    public function deleteAttribute($id)
    {
        return $this->productAttributeRepository->delete($id);
    }
}
