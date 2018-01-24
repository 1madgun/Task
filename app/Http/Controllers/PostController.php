<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Post, App\Comment;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('post.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
			$validator = Validator::make($request->all(), [
				'title' => 'required|max:50',
				'article' => 'required',
				'author' => 'required',
				'image' => 'sometimes|image|mimes:jpeg,png|min:1',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withInput()->with('errors', $validator->errors());
			}

			$post = new Post;

			if ($request->hasFile('image')) {
				$file = $request->file('image');
				$destination_path = 'img/post/';
				$filename = str_random(6).'_'.$file->getClientOriginalName();
				$file->move($destination_path,$filename);
				$post->image = $destination_path.$filename;
			}
			else{
				$post->image = "";
			}

			$post->title = $request->input('title');
			$post->article = $request->input('article');
			$post->author = $request->input('author');
			$post->save();

      return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = DB::select('select posts.*, users.name from posts join users on posts.author = users.id where posts.id = '.$id);
        $comment = DB::select('select comments.*, users.name from comments join users on comments.komentator = users.id where comments.post_id = '.$id.' order by comments.created_at desc');
        return view('post.show')->with('post',$post)->with('comment',$comment);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('post.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
			$validator = Validator::make($request->all(), [
				'title' => 'required|max:50',
				'article' => 'required',
				'author' => 'required',
				'image' => 'sometimes|image|mimes:jpeg,png|min:1',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withInput()->with('errors', $validator->errors());
			}

			$post = Post::find($id);

			if ($request->hasFile('image')) {
				$file = $request->file('image');
				$destination_path = 'img/post/';
				$filename = str_random(6).'_'.$file->getClientOriginalName();
				$file->move($destination_path,$filename);
				$post->image = $destination_path.$filename;
			}

			$post->title = $request->input('title');
			$post->article = $request->input('article');
			$post->author = $request->input('author');
			$post->save();

        return redirect()->route('post.show',$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = Comment::select('post_id')->where('post_id', '=', $id);
        $comment->delete();
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('post.index');
    }

    public function data()
    {
       // $post = Post::all();
        $post = DB::select('select posts.*, users.name from posts join users on posts.author = users.id order by posts.created_at desc');
       return view('post.data')->with('post', $post);
    }

    public function profil()
    {
        return view('post.profil');
    }
}
