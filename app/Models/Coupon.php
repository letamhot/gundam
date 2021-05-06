<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Coupon extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $table = 'coupons';
    protected $primaryKey = 'id';
    protected $fillable = ['sale', 'amount', 'expiration_date'];

    public function bills()
    {
        return $this->hasMany(Bill::class, 'id_coupon')->withTrashed();
    }

}
