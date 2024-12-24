<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CategoryController extends Controller
{
    //show
    public function culture(Request $request,$name)
    {
        $data = Category::select('posts.id as id','title','description','image','posts.created_at','posts.view_count','categories.name as category_name','categories.id as category_id')
                        ->leftJoin('posts','categories.id','posts.category_id')
                        ->where('categories.name',$name)
                        ->get();
        $popular = Post::select('posts.id as id','title','description','image','posts.created_at','posts.view_count','categories.name as category_name','categories.id as category_id')
                        ->where('categories.name',$name)
                        ->leftJoin('categories','posts.category_id','categories.id')
                        ->orderBy('posts.view_count','desc')
                        ->take(3)
                        ->get();
        $countCulture = Post::where('category_id','1')->count();
        $countBusiness = Post::where('category_id','2')->count();
        $countPolitics = Post::where('category_id','3')->count();
        return view('posts.category',compact('data','popular','countBusiness','countPolitics','countCulture'));

    }
}
