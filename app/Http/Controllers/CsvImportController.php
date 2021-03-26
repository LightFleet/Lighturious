<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CsvImportController extends Controller {

    public function import(Request $request)
    {
        $path = $request->file('csv_file')->getRealPath();

        $data = array_map('str_getcsv', file($path));

        $csv_header_fields = [];
        foreach ( $data[0] as $key => $value )
        {
            $csv_header_fields[] = Str::slug($value);
        }

        $csv_data = array_slice($data, 1, count($data));


        foreach ( $csv_data as $product )
        {
            $data = array_combine($csv_header_fields, $product);
            $newProduct = new Product();

            $newProduct->sku = $data['sku'];
            $newProduct->description = $data['description'];
            $newProduct->CPT = $data['cpt'];
            $newProduct->JHB = $data['jhb'];
            $newProduct->DBN = $data['dbn'];
            $newProduct->totalStock = $data['total-stock'];
            $newProduct->dealerPrice = $data['dealer-price'];
            $newProduct->retailPrice = $data['retail-price'];
            $newProduct->manufacturer = $data['manufacturer'];
            $newProduct->imageUrl = $data['image-url'];

            $newProduct->save();
        }

        return redirect('/products');
    }
}
