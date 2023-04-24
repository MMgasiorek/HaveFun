<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Repositories\CommentRepository;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function create()
    {
        return view('comments.create');
    }

    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = Auth::id();
        $comment->event_id = $request->input('event_id');
        $comment->save();

        return back()->with('success','comment added');  
    }

    public function delete(CommentRepository $commentRepo, int $id) 
    {
        $commentRepo->delete($id);

        return back()->with('success','removed correctly');
    }
}
