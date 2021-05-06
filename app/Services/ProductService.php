<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder;

class ProductService{
    public function getlistProduct()
    {
        $product = Product::orderBy('name', 'asc')
        ->paginate(5);
        return $product;
    }

    public function productData($request)
    {
        $sort_by = $request->get('sortby', 'name');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'name'){
            $product = Product::whereRaw("(name LIKE '%$query%')")
                    ->orWhereHas('category', function(Builder $q) use ($query){
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orWhereHas('producer', function(Builder $q) use ($query){
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orderBy('name', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'categoryName'){
            $product = Product::whereRaw("(name LIKE '%$query%')")
            ->orWhereHas('category', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orWhereHas('producer', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('categories', 'products.id_category', '=', 'categories.id')
            ->orderBy('categories.name', $sort_type)
            ->select('products.*', 'categories.name as categoryName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'producerName'){
            $product = Product::whereRaw("(name LIKE '%$query%')")
            ->orWhereHas('category', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orWhereHas('producer', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('producers', 'products.id_producer', '=', 'producers.id')
            ->orderBy('producers.name', $sort_type)
            ->select('products.*', 'producers.name as producerName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
     return $product;
    }

    public function createProduct($data)
    {
        try{
            if(!array_key_exists('slug' ,$data)){
                $data['slug']= \Str::slug($data['name']) . time();

            }
            
             return Product::create($data);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
    }

    public function update($data, $product){

        try
        {
            if(!array_key_exists('slug' ,$data)){
                $data['slug']= \Str::slug($data['name']) . time();
            }
            $product->update($data);
        }
        catch (\Exception $e) {
            return $e->getMessage();
            // return null;
        }
        return $product->fresh();

    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
    }

    public function trash()
    {
        $product = Product::onlyTrashed()
        ->orderBy('name', 'asc')
        ->paginate(5);
        return $product;
    }

    public function productTrashData($request)
    {
        $sort_by = $request->get('sortby', 'name');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'name'){
            $product = Product::onlyTrashed()->whereRaw("(name LIKE '%$query%')")
                    ->orWhereHas('category', function(Builder $q) use ($query){
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orWhereHas('producer', function(Builder $q) use ($query){
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orderBy('name', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'categoryName'){
            $product = Product::onlyTrashed()->whereRaw("(name LIKE '%$query%')")
            ->orWhereHas('category', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orWhereHas('producer', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('categories', 'products.id_category', '=', 'categories.id')
            ->orderBy('categories.name', $sort_type)
            ->select('products.*', 'categories.name as categoryName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'producerName'){
            $product = Product::onlyTrashed()->whereRaw("(name LIKE '%$query%')")
            ->orWhereHas('category', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orWhereHas('producer', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('producers', 'products.id_producer', '=', 'producers.id')
            ->orderBy('producers.name', $sort_type)
            ->select('products.*', 'producers.name as producerName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
     return $product;
    }

    public function restore($id)
    {
        $product = Product::onlyTrashed()->find($id);
        return $product->restore();
    }

    public function deleteTrash($id)
    {
        $product = Product::onlyTrashed()->find($id);
        return $product->forceDelete();
    }

}
