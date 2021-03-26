<?php

namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductsImport implements ToModel, WithHeadingRow {

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Product([
            'sku'          => $row['sku'],
            'desription'   => $row['description'],
            'CPT'          => $row['CPT'],
            'JHB'          => $row['JHB'],
            'DBN'          => $row['DBN'],
            'totalStock'   => $row['totalStock'],
            'dealerPrice'  => $row['dealerPrice'],
            'detailPrice'  => $row['detailPrice'],
            'manufacturer' => $row['manufacturer'],
            'imageUrl'     => $row['imageUrl'],
        ]);
    }
}
