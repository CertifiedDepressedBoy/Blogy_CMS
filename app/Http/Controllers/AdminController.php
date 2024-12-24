<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

    //admin list
    public function adminList(){
        $admins = User::where('role','admin')->get();
        return view('Admin.admins',compact('admins'));
    }

    //admin remove
    public function remove($id){
        User::where('id',$id)->delete();
        return redirect()->route('admin.list');
    }

    //redirect to create new admin page
    public function addnewadmin(){
        return view('Admin.createAdmin');
    }

    //store new admin
    public function create(Request $request){
        $request->validate([
            'username' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'role' => 'admin',
            'password' => Hash::make($request->password),
        ]);
        return redirect()->route('admin.list');
    }

    //admin categories list
    public function categories(){
        $categories = Category::all();
        return view('Admin.categories',compact('categories'));
    }

    //create categories
    public function categoriesCreate(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
            ]);
            Category::create([
                'name' => $request->name
            ]);
            return redirect()->route('admin.categories');
        }
        return view('Admin.categoriesCreate');
    }

    //update categories
    public function categoriesUpdate(Request $request , $id){
        if($request->isMethod('post')){
            $request->validate([
                'name' => 'required',
            ]);
            Category::where('id',$id)->update([
                'name' => $request->name,
            ]);
            return redirect()->route('admin.categories');
        }
        $name = Category::where('id',$id)->first();
        return view('Admin.categoryUpdate',compact('name'));
    }

    //delete categories
    public function categoriesDelete($id){
        Category::where('id',$id)->delete();
        return redirect()->route('admin.categories');
    }

    //posts
    public function posts(){
        $posts = Post::select('posts.id', 'posts.title','posts.description','posts.user_name','categories.name as category_name')
                        ->leftJoin('categories','posts.category_id','categories.id')
                        ->get();
        return view('Admin.posts',compact('posts'));
    }

    //posts delete
    public function postsDelete($id){
        $post = Post::select('image')->where('id',$id)->first();
        if( file_exists(public_path('/assets/images/'.$post['image'])) ){
            unlink(public_path('/assets/images/'.$post['image']));
        }
        Post::where('id',$id)->delete();
        return redirect()->route('admin.posts');
    }
}
