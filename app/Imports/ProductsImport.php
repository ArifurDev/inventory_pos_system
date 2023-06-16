<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Product([
            'category_name' => $row[0],
            'category_id' => $row[1],
            'supplier_name' => $row[2],
            'supplier_id' => $row[3],
            'product_name' => $row[4],
            'product_code' => $row[5],
            'product_storehouse' => $row[6],
            'product_route' => $row[7],
            'product_image' => $row[8],
            'buy_date' => $row[9],
            'expaire_date' => $row[10],
            'buying_price' => $row[11],
            'seling_price' => $row[12],
        ]);
    }
}
