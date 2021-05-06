<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravelista\Comments\Commentable;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Commentable;

    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'id_category', 'id_producer', 'amount', 'image', 'image1','image2', 'price', 'new', 'description'];

    protected $dates = ['deleted_at'];

    public function producer()
    {
        return $this->belongsTo(Producer::class, 'id_producer')->withTrashed();
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'id_category')->withTrashed();
    }
    public function bills(){
        return $this->belongsToMany(Bill::class, 'bill_details', 'product_id','bill_id',  'id')->withPivot(['quantity', 'price']);
    }

    // public function comment()
    // {
    //     return $this->hasMany(Comment::class, 'commentable_id', 'id');
    // }
    
}
