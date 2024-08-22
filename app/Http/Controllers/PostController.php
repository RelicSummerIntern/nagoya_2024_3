<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('updated_at', 'desc')->get();
        return view('post.index', compact('posts'));
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = new Post();
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->user_id = Auth::id();
        $post->save();

        return redirect()->route('post.index')->with('success', '投稿が作成されました');
    }

    public function myPosts()
    {
        $posts = Post::where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return view('my-posts', compact('posts'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('post.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
        ]);

        $post = Post::findOrFail($id);
        $post->title = $validatedData['title'];
        $post->body = $validatedData['body'];
        $post->save();

        return redirect()->route('myposts')->with('success', '投稿が更新されました');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect()->route('myposts')->with('success', '投稿が削除されました');
    }

    public function ai()
    {
                return view('ai');
    }
    public function ai_answer()
    {
                return view('ai_answer');
    }
    
    public function exams()
    {
                return view('exams');
    }

    public function score01()
    {
                return view('score01');
    }
    public function score02()
    {
                return view('score02');
    }
    public function score03()
    {
                return view('score03');
    }

    public function school_registor()
    {
        $schools=School::all();
        return view('school_registor', ['schools'=>$schools]);
    }
    public function school_store(Request $request)
    {   
        // モデルを使ってデータを追加
        User::where('id',$request->input('user_id'))
            ->update(['school_id'=>$request->input('univercity_id')]);
            
        return view('/');
    }

    public function ranking01()
    {
                return view('ranking01');
    }
    public function ranking01_japanese()
    {
                return view('ranking01_japanese');
    }
    public function ranking01_math()
    {
                return view('ranking01_math');
    }
    public function ranking01_english()
    {
                return view('ranking01_english');
    }
    public function ranking01_science()
    {
                return view('ranking01_science');
    }
    public function ranking01_society()
    {
                return view('ranking01_society');
    }



    public function ranking02()
    {
                return view('ranking02');
    }
    public function ranking02_japanese()
    {
                return view('ranking02_japanese');
    }
    public function ranking02_math()
    {
                return view('ranking02_math');
    }
    public function ranking02_english()
    {
                return view('ranking02_english');
    }
    public function ranking02_science()
    {
                return view('ranking02_science');
    }
    public function ranking02_society()
    {
                return view('ranking02_society');
    }




    public function ranking03()
    {
                return view('ranking03');
    }
    public function ranking03_japanese()
    {
                return view('ranking03_japanese');
    }
    public function ranking03_math()
    {
                return view('ranking03_math');
    }
    public function ranking03_english()
    {
                return view('ranking03_english');
    }
    public function ranking03_science()
    {
                return view('ranking03_science');
    }
    public function ranking03_society()
    {
                return view('ranking03_society');
    }
    

}

