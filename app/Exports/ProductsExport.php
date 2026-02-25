<?php
namespace App\Exports;

use App\Models\Produit;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class ProductsExport implements FromQuery, WithHeadings, WithMapping
{
    public function query()
    {
        return  Produit::query()->select('id', 'name', 'prix', 'stock', 'created_at'); 
    }

    public function headings(): array
    {
        return [
            'ID',
            'Nom du produit',
            'Prix',
            'État du stock',
            'Date création',
        ];
    }

    public function map($product): array
    {
        return [
            $product->id,
            $product->name,
            $product->prix . ' MAD',
            $product->stock ? 'En stock' : 'Rupture',
            $product->created_at->format('d/m/Y'),
        ];
    }
}