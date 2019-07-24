<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        $comments = Comment::searchQuery(
            $request->input('id') ?? '',
            $request->input('title') ?? '',
            $request->input('product_id') ?? ''
        );
        return view('admin.comments.index', compact('comments'));
    }

    public function view($id)
    {
        $comment = Comment::find($id);
        return view('admin.comments.view', compact('comment'));
    }

    public function delete($id)
    {
        Comment::destroy($id);
        return back()->with(Controller::notification(DELETE));
    }

    public function comments(Request $request)
    {
        Comment::create($request->all());
        return back();
    }
}
