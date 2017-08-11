<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Article;

class ArticleRepository extends BaseRepository implements RestfulInterface{
    public function getModel()
    {
        return Article::class;
    }
}
