<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
class Producer extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'producers';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'slug', 'address', 'phone', 'taxCode', 'image'];
    protected $dates = ['deleted_at'];



    public function products()
    {
        return $this->hasMany(Product::class, 'id_producer', 'id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Set the proper slug attribute.
     *
     * @param string $value
     */
    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::slug($value);
    }
}
