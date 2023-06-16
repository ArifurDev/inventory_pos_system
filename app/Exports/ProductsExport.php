<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;

class ProductsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Product::select('category_name','category_id','supplier_name','supplier_id','product_name','product_code','product_storehouse','product_route','product_image','buy_date','expaire_date','buying_price','seling_price')->get();
    }
}
