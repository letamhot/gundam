<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravelista\Comments\Commentable;

class Comment extends Model
{
    use Commentable;
    protected $table = 'comments';

    protected $primaryKey = 'id';
    protected $fillable = ['commenter_id ', 'commenter_type ', 'guest_name', 'guest_email', 'commentable_type', 'commentable_id', 'comment', 'approved', 'child_id'];
    public function user()
    {
        return $this->belongsTo(User::class, 'commenter_id', 'id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'commentable_id', 'id');
    }
}