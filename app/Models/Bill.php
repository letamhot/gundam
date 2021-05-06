<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory;
    protected $table = 'bills';

    protected $primaryKey = 'id';
    protected $fillable = ['id_user', 'address', 'phone', 'priceTotal', 'status', 'id_coupon'];
    public function products(){
        return $this->belongsToMany(Product::class, 'bill_details', 'id_bill', 'id_product',  'id')->withPivot(['quantity', 'price']);
    }
    public function coupon(){
        return $this->belongsTo(Coupon::class, 'id_coupon');
    }
    public function user()
    {
        return $this->belongsTo("App\Models\User", 'id_user');
    }
    public function bill_detail()
    {
        return $this->hasMany("App\Models\BillDetail", 'id_bill', 'id');
    }

}
