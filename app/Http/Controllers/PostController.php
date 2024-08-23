<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\School;
use App\Models\User;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;

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
    public function ai_answer2()
    {
                return view('ai_answer2');
    }
    public function ai_answer_not()
    {
                return view('ai_answer_not');
    }
    
    
    public function exams()//模試選択画面へ
    {
        
        $exams = Exam::all();

        return view('exams',['exams'=>$exams,]);

    }

    public function score_enter(Request $request)//模試のidを受け取って、スコア入力画面へ
    {
        // $request->validate([
        //     'exam' => 'required|exists:exams,id'
        // ]);
        $request->all();
        $exam=Exam::find($request->exam_id); 
        $subjects=Subject::all();

        return view('score01', ['subjects'=>$subjects,'exam'=>$exam]);
    }


    public function ranking(Request $request)//登録をしたデータを受け取って、ランキングへ
    {
        // // リクエストデータのバリデーション
        // $request->validate([
        //     'exam' => 'required|exists:exams,', // テーブル名とカラム名を指定
        // ]);
    
        // $subjects=Subject::all('subject_name');
        // User::where('id', $user_id)
        // ->update(['school_id' => $request->input('exam')]);
        $exams=Exam::all();

        $user_id = Auth::id();

        
        foreach ($scoresData as $scoreData) {
            Score::create([
                'user_id' => $userId,
                'exam_id' => $examId,
                'subject_id' => $scoreData['subject_id'],
                'score' => $scoreData['score']
            ]);
        }

        $scoresData = $request->input('scores');
        
        return view('ranking01',['exams'=>$exams]);
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

    public function school_register()
    {
        $schools=School::all();
        return view('school_register', ['schools'=>$schools]);
    }

    public function school_store(Request $request)
{   
    // リクエストデータのバリデーション
    $request->validate([
        'school' => 'required|exists:schools,id',
    ]);
    $user_id = Auth::id();
    // ユーザーの school_id を更新
    User::where('id', $user_id)
        ->update(['school_id' => $request->input('school')]);

    session()->flash('success', '希望する大学を登録しました。');

    return redirect(RouteServiceProvider::HOME);
}


    public function ranking01()
    {
        // フォームからのデータを取得
        $eigo = $request->input('eigo', 0);
        $kokugo = $request->input('kokugo', 0);
        $suugaku = $request->input('suugaku', 0);
        $rika = $request->input('rika', 0);
        $shakai = $request->input('shakai', 0);
    
        // 点数を合計
        $totalScore = $eigo + $kokugo + $suugaku + $rika + $shakai;
    
        // 合計点数をビューに渡す
        return view('ranking01', ['totalScore' => $totalScore]);
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

