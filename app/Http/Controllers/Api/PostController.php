<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PostResourceModel;
use App\Http\Resources\PostResource;
class PostController extends Controller
{
    public function index()
    {
        //get all posts
        $posts = PostResourceModel::latest()->paginate(500);

        //return collection of posts as a resource
        return new PostResource(true, 'List Data Posts', $posts);
    }
}
