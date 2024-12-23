<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $headCulture = Post::all()->sortByDesc('id')->where('category_id',1)->take(2);
        $headBusiness = Post::all()->sortByDesc('id')->where('category_id',2)->take(2);
        $headPolitic = Post::all()->sortByDesc('id')->where('category_id',3)->take(1);

        $business = Post::all()->sortByDesc('created_at')->where('category_id',2)->take(2);
        $businessNoImg = Post::where('category_id',2)->orderBy('created_at','Asc')->get()->take(3);
        $businessall = Post::where('category_id',2)->get();

        $culture = Post::all()->sortByDesc('created_at')->where('category_id',1)->take(2);
        $cultureNoImg = Post::where('category_id',1)->orderBy('created_at','Asc')->get()->take(3);

        $politics = Post::all()->sortByDesc('created_at')->where('category_id',3)->take(6);

        return view('dashboard',compact('headCulture','headPolitic','headBusiness','business','businessNoImg','businessall','culture','cultureNoImg','politics'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        return view('posts.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $data = $this->getData($request);
        if($request->hasFile('image')){
            $fileName = uniqid(). $request->file('image')->getClientOriginalName();
            $request->file('image')->move( public_path() ."/assets/images/" , $fileName  );
            $data['image'] = $fileName;
        }

        Post::create($data);
        return redirect()->route('dashboard');
    }
    public function getData($request){
        return [
            'title' => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'user_id' => Auth::user()->id,
            'user_name' => Auth::user()->name,
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $post = Post::select('posts.id as id','posts.user_name','posts.title','posts.user_id as user_id','posts.description','posts.image','posts.view_count','posts.created_at','categories.name as category_name','categories.id as category_id')
                    ->where('posts.id',$id)
                    ->leftJoin('categories','posts.category_id','categories.id')
                    ->first();
                    if ($post) {
                        Post::where('id', $id)->update(['view_count' => $post->view_count + 1]);
                    }

        //comment show
        $comments = Comment::select('comments.id','comments.comment','comments.created_at','comments.user_name','comments.user_id')
                    ->where('post_id',$id)
                    ->get();

        $popular = Post::select('posts.id as id','title','description','image','posts.created_at','categories.name as category_name')
                    ->where('category_id','1')
                    ->leftJoin('categories','posts.category_id','categories.id')
                    ->orderBy('view_count','desc')
                    ->take(3)
                    ->get();

        $countCulture = Post::where('category_id','1')->count();
        $countBusiness = Post::where('category_id','2')->count();
        $countPolitics = Post::where('category_id','3')->count();
        return view('posts.single',compact('post','comments','popular','countBusiness','countPolitics','countCulture'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Post::where('id',$id)->first();
        $category = Category::all();
        return view('posts.update',compact('category','post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'category_id' => 'required',
        ]);
        $data = $this->getData($request);
        if($request->hasFile('image')){
            if( file_exists(public_path('/assets/images'.$request->image)) ){
                unlink(public_path('productImage/'.$request->image));
            }

            $fileName = uniqid(). $request->file('image')->getClientOriginalName();
            $request->file('image')->move( public_path() ."/assets/images/" , $fileName  );
            $data['image'] = $fileName;
        }
        Post::where('id',$id)->update($data);
        return redirect()->route('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Post::where('id',$id)->delete();
        return back();
    }



    //comment create
    public function commentCreate(Request $request, $id){
        $request->validate([
            'comment' => 'required',
        ]);
        $data = [
            'comment' => $request->comment,
            'user_name' => Auth::user()->name,
            'post_id' => $id,
            'user_id' => Auth::user()->id,
        ];
        Comment::create($data);
        return back();
    }

    //comment delete
    public function commentDelete($id){
        Comment::where('id',$id)->delete();
        return back();
    }

    //search
    public function search(Request $request){
        $search = $request->search;
        $posts = Post::where('title','like','%'.$search.'%')->get();
        $countCulture = Post::where('category_id','1')->count();
        $countBusiness = Post::where('category_id','2')->count();
        $countPolitics = Post::where('category_id','3')->count();
        return view('posts.search',compact('posts','search','countBusiness','countPolitics','countCulture'));
    }
}
