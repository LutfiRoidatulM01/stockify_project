<?php

namespace App\Exports\admin;

use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection, WithHeadings, WithEvents
{
    protected $products;

    public function __construct($products)
    {
        $this->products = $products;
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'SKU',
            'Kategori',
            'Supplier',
            'Harga Beli',
            'Harga Jual',
            'Stok',
            'Deskripsi',
            
        ];
    }

    public function collection()
    {
        return $this->products->map(function ($product) {
            return [
                $product->name,
                $product->sku,
                $product->category->name,
                $product->supplier->name,
                $product->purchase_price,
                $product->selling_price,
                $product->totalStock(),
                $product->description,
            ];
        });
    }

    public function registerEvents(): array
    {
        return [
            AfterSheet::class => function(AfterSheet $event) {
                $event->sheet->getDelegate()->getStyle('A1:H1')
                    ->getFont()->setBold(true);
            },
        ];
    }

       
}
