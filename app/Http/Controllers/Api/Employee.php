<?php

namespace App\Http\Controllers\Api;

use App\Models\PostResourceModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// 
use App\Http\Resources\PostResource;
class Employee extends Controller
{
    protected $PostResourceModel;
    public function __construct(PostResourceModel $PostResourceModel) {
        $this->PostResourceModel = $PostResourceModel;
    }


    public function index() {
                //get all posts
                $posts = PostResourceModel::latest()->paginate(2);
                //return collection of posts as a resource
                return new PostResource(true, 'List Data Employe', $posts);
        
    }
}


