<?php

namespace App\Repositories;

use App\Models\Author;

class PostAuthorRepository implements PostAuthorRepositoryInterface
{

    public function get($postAuthorId)
    {
        return Author::find($postAuthorId);
    }

    public function all()
    {
        return Author::all();

    }

    public function delete($postAuthorId)
    {
        // TODO: Implement delete() method.
    }

    public function update($postAuthorId, array $postAuthorData)
    {
        Author::find($postAuthorId)->update($postAuthorData);
    }

    public function store(array $postAuthorData)
    {
        Author::create($postAuthorData);
    }

    public function getPostsByUrlKey(string $urlKey)
    {
        $posts = Author::where('url_key', $urlKey);

        if(!empty($posts->get()->toArray())){
            return $posts->first()->posts();
        }

        abort(404, 'Post not found');
    }
}
