<?php

namespace App\Services;

use App\Models\Category;

class CategoriesService {

    public function getListCategory(){
        $category = Category::orderBy('name', 'asc')
        ->paginate(5);
        return $category;
    }

    //Form index User Admin
    public function dataCategory($request){
       
        $sort_by = $request->get('sortby', 'customerName');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $category = Category::when($query, function($que) use ($query){
                        $que->where('name', 'LIKE', '%'.$query.'%');
                        })
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
     return $category;
     
   


}

    public function create($request){
        try{
             return Category::create(
            ['name' => $request->name,
              'slug' => $request->name]
            );
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function update($request, $id){

        try
        {
            $category= Category::find($id);
            $category->update(['name'=> $request->name,'slug' => $request->name ]);
        }
        catch (\Exception $e) {
            return $e->getMessage();
            // return null;
        }
        return $category->fresh();

    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
    }

    public function trash(){
        $category = Category::onlyTrashed()
        ->orderBy('name', 'asc')
        ->paginate(5);
        return $category;
    }

     //Form index Category Admin
     public function datatrashCategory($request){
       
        $sort_by = $request->get('sortby', 'customerName');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        $user = Category::onlyTrashed()->when($query, function($que) use ($query){
                        $que->where('name', 'LIKE', '%'.$query.'%');
                        })
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        return $user;
    }

    public function restore($id)
    {
        $category = Category::onlyTrashed()->find($id);
        return $category->restore();
    }

    public function deleteTrash($id)
    {
        $category = Category::onlyTrashed()->find($id);
        return $category->forceDelete();
    }
}