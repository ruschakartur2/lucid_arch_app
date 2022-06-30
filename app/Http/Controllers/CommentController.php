<?php

namespace App\Http\Controllers;

use App\Features\Comment\DeleteCommentFeature;
use App\Features\Comment\IndexCommentFeature;
use App\Features\Comment\StoreCommentFeature;
use App\Features\Comment\UpdateCommentFeature;
use App\Models\Comment;
use App\Models\Post;
use Lucid\Units\Controller;

class CommentController extends Controller
{
    /**
     * @return mixed
     */
    public function store(Post $post)
    {
        return $this->serve(StoreCommentFeature::class, [
            'post' => $post,
        ]);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->serve(IndexCommentFeature::class);
    }

    /**
     * @param Post $post
     * @param Comment $comment
     * @return mixed
     */
    public function update(Post $post, Comment $comment)
    {
        return $this->serve(UpdateCommentFeature::class, [
            'post'    => $post,
            'comment' => $comment
        ]);
    }

    /**
     * @param Post $post
     * @param Comment $comment
     * @return mixed
     */
    public function destroy(Post $post, Comment $comment)
    {
        return $this->serve(DeleteCommentFeature::class, [
            'post'    => $post,
            'comment' => $comment,
        ]);
    }
}
