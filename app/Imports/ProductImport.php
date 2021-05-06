<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Producer;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class ProductImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $category = Category::where("name", "like", "%".$row['id_category']."%")->first();
        $producer = Producer::where("name", "like", "%".$row['id_producer']."%")->first();
        // // dd($category);
        $row['id_category'] = $category->id;
        $row['id_producer']         = $producer->id;
        return new Product([
            'name'        => $row['name'],
            'slug'        => $row['slug'],
            'id_category' => $row['id_category'],
            'id_producer' => $row['id_producer'],
            'amount'      => $row['amount'],
            'image'       => $row['image'],
            'image1'      => $row['image1'],
            'image2'      => $row['image2'],
            'price'       => $row['price'],
            'new'         => $row['new'],
            'description' => $row['description'],
        ]);

    }
    
}
