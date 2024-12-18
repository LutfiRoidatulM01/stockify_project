<?php

namespace App\Repositories\admin;

use App\Models\ProductAttribute;

class ProductAttributeRepository
{
    public function getAll()
    {
        return ProductAttribute::with('product')->get();
    }

    public function findById($id)
    {
        return ProductAttribute::findOrFail($id);
    }

    public function create($data)
    {
        return ProductAttribute::create($data);
    }

    public function update($id, $data)
    {
        $atribut = $this->findById($id);
        $atribut->update($data);
        return $atribut;
    }

    public function delete($id)
    {
        $atribut = $this->findById($id);
        $atribut->delete();
        return true;
    }
}
