<?php

namespace App\Services;

use App\Models\Comment;

class CommentService {
    public function getlistCommnet()
    {
        $comment = Comment::paginate(5);
        return $comment;
    }

    public function deleteCommnet($id)
    {
        $comment = Comment::find($id);
        $comment->each->delete();

    }
}