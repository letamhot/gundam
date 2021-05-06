<?php

namespace App\Services;

use App\Models\Bill;
use App\Models\Product;
use App\Models\BillDetail;
use Illuminate\Database\Eloquent\Builder;

class BillService
{
    
    public function getlistBill()
    {
        $bill = Bill::orderBy('phone', 'asc')
        ->paginate(5);
        return $bill;
    }
    public function dataBill($request)
    {
        $sort_by = $request->get('sortby', 'phone');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'phone'){
            $bill = Bill::whereRaw("(phone LIKE '%$query%' OR address LIKE '%$query%' OR priceTotal LIKE '%$query%')")
            ->orWhereHas('user', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('phone', $sort_type)
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'address'){
            $bill = Bill::whereRaw("(phone LIKE '%$query%' OR address LIKE '%$query%' OR priceTotal LIKE '%$query%')")
            ->orWhereHas('user', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('address', $sort_type)
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'priceTotal'){
            $bill = Bill::whereRaw("(phone LIKE '%$query%' OR address LIKE '%$query%' OR priceTotal LIKE '%$query%')")
            ->orWhereHas('user', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('priceTotal', $sort_type)
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'userName'){
            $bill = Bill::whereRaw("(phone LIKE '%$query%' OR address LIKE '%$query%' OR priceTotal LIKE '%$query%')")
            ->orWhereHas('user', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('users', 'bills.id_user', '=', 'users.id')
            ->orderBy('bills.phone', $sort_type)
            ->select('bills.*', 'users.name as userName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
     return $bill;
        
    }

    public function editBill($data, $id)
    {
        try
        { 
            $bill = Bill::find($id);
            $bill->update($data);
        }
        catch (\Exception $e) {
            return $e->getMessage();
            // return null;
        }
        return $bill->fresh();
       
    }

    public function destroy($id)
    {
        $bill = Bill::find($id);
        foreach($bill->products as $product){
            $product->increment('amount', $product->pivot->quantity);
    
        }       
        $bill->delete();



    }

    public function getBillDetail()
    {
        $billDetail = BillDetail::orderBy('quantity', 'asc')
        ->paginate(5);
        return $billDetail;
    }
    public function dataBillDetail($request){
        $sort_by = $request->get('sortby', 'quantity');
        $sort_type = $request->get('sorttype', 'asc');
        $query = $request->get('query');
        $query = str_replace(" ", "%", $query);
        if($sort_by == 'quantity'){
            $billDetail = BillDetail::whereRaw("(quantity LIKE '%$query%' OR price LIKE '%$query%')")
                   
                    ->orWhereHas('product', function(Builder $q) use ($query){
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orderBy('quantity', $sort_type)
                    ->orderBy($sort_by, $sort_type)
                    ->paginate(5);
        }
        if($sort_by == 'price'){
            $billDetail = BillDetail::whereRaw("(quantity LIKE '%$query%' OR price LIKE '%$query%')")
                   
            ->orWhereHas('product', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->orderBy('quantity', $sort_type)
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
        if($sort_by == 'productName'){
            $billDetail = BillDetail::whereRaw("(quantity LIKE '%$query%' OR price LIKE '%$query%')")
            ->orWhereHas('product', function(Builder $q) use ($query){
                $q->where('name', 'LIKE', '%' . $query . '%');
            })
            ->join('products', 'products.id_product', '=', 'products.id')
            ->orderBy('products.name', $sort_type)
            ->select('products.*', 'products.name as productName')
            ->orderBy($sort_by, $sort_type)
            ->paginate(5);
        }
     return $billDetail;
    }

    public function destroybillDetail($id)
    {
        
        $billDetail = BillDetail::find($id);

            $billDetail->bills->delete();
            $billDetail->delete();
        
    }

}
