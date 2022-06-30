<?php

namespace App\Http\Controllers;


use App\Features\Comment\IndexCommentFeature;
use Lucid\Units\Controller;


class CommentController extends Controller
{
    /**
     * @return mixed
     */
    public function create()
    {
        return $this->serve(CreateCommentFeature::class);
    }

    /**
     * @return mixed
     */
    public function store()
    {
        return $this->serve(StoreCommentFeature::class);
    }

    /**
     * @return mixed
     */
    public function index()
    {
        return $this->serve(IndexCommentFeature::class);
    }

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function edit(Comment $comment)
    {
        return $this->serve(EditCommentFeature::class, [
            'comment' => $comment
        ]);
    }

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function update(Comment $comment)
    {
        return $this->serve(UpdateCommentFeature::class, [
            'comment' => $comment,
        ]);
    }

    /**
     * @param Comment $comment
     * @return mixed
     */
    public function destroy(Comment $comment)
    {
        return $this->serve(DeleteCommentFeature::class, [
            'post' => $comment,
        ]);
    }
}
