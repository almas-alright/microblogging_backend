<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use \App\Interfaces\PostRepositoryInterface;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{
    public function __construct(Post $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function getAll()
    {
        // TODO: Implement getAll() method.
    }

    /**
     * @inheritDoc
     */
    public function find($id)
    {
        // TODO: Implement find() method.
    }

    /**
     * @inheritDoc
     */
    public function create(array $attributes)
    {
        // TODO: Implement create() method.
    }

    /**
     * @inheritDoc
     */
    public function update($id, array $attributes)
    {
        // TODO: Implement update() method.
    }

    /**
     * @inheritDoc
     */
    public function delete($id)
    {
        // TODO: Implement delete() method.
    }
}
