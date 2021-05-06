<?php

namespace App\Services;

use App\Models\Producer;

class ProducerService {

    public function getListProducer(){
        $producer = Producer::orderBy('name', 'asc')
        ->paginate(5);
        return $producer;
    }

    //Form index User Admin
    public function dataProducer($request){
       
        $sort_by = $request->get('sortby', 'name');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'name'){
            $producer = Producer::whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('name', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'address'){
            $producer = Producer::whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('address', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'phone'){
            $producer = Producer::whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('phone', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
     return $producer;
     
   


}

    public function create($data){
        try{
            if(!array_key_exists('slug' ,$data)){
                $data['slug']= \Str::slug($data['name']) . time();

            }
             return Producer::create($data);
        }
        catch(\Exception $e){
            return $e->getMessage();
        }
       
    }

    public function update($data, $producer){

        try
        {
            if(!array_key_exists('slug' ,$data)){
                $data['slug']= \Str::slug($data['name']) . time();
            }
            $producer->update($data);
            // dd($data);

        }
        catch (\Exception $e) {
            return $e->getMessage();
            // return null;
        }
        return $producer->fresh();

    }

    public function destroy($id)
    {
        $producer = Producer::find($id);
        $producer->delete();
    }

    public function trash(){
        $producer = Producer::onlyTrashed()
        ->orderBy('name', 'asc')
        ->paginate(5);
        return $producer;
    }

     //Form index Category Admin
     public function producerTrashData($request){
       
        $sort_by = $request->get('sortby', 'name');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'name'){
            $producer = Producer::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('name', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'address'){
            $producer = Producer::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('address', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'phone'){
            $producer = Producer::onlyTrashed()->whereRaw("(name LIKE '%$query%' 
                    OR address LIKE '%$query%' OR phone LIKE '%$query%')")
                    ->orderBy('phone', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        return $producer;
    }

    public function restore($id)
    {
        $producer = Producer::onlyTrashed()->find($id);
        return $producer->restore();
    }

    public function deleteTrash($id)
    {
        $producer = Producer::onlyTrashed()->find($id);
        return $producer->forceDelete();
    }
}