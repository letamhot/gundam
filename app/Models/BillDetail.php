<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;
    protected $table = 'bill_details';
    protected $fillable = ['id_product', 'id_bill', 'quantity', 'price'];

    public function bills()
    {
        return $this->belongsTo("App\models\Bill", 'id_bill');
    }

    public function product()
    {
        return $this->belongsTo("App\models\Product", 'id_product');
    }
}
