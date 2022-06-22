<?php

namespace Comment\Http\Controllers;

use Comment\Models\Comment;
use Exception;
use Illuminate\Http\Request;

class CommentController extends CommentSetupController
{
    public function index()
    {
        $comments = Comment::latest()->get();
        return view('comment::index', compact('comments'));
    }

    public function create()
    {
        return view('comment::create');
    }

    public function store(Request $request, Comment $comment)
    {

        $request->validate($comment->rules());

        $comment->user_id = 'default';
        $comment->description = $request->input('description');
        $comment->reply = $request->input('reply');

        $comment->save();

        return redirect()->route('comments.index')->withSuccess('Created Successfully!');
    }

    public function show(Comment $comment)
    {
        return view('comment::show', compact('comment'));
    }

    public function edit(Comment $comment)
    {
        return view('comment::edit', compact('comment'));
    }

    public function update(Request $request, Comment $comment)
    {
        $request->validate($comment->rules());

        $comment->update([
            'user_id' => 'default',
            'description' => $request->input('description'),
            'reply' => $request->input('reply')
        ]);

        return redirect()->route('comments.index')->withSuccess('Updated Successfully!');
    }

    public function destroy(Comment $comment)
    {
        try
        {
            $comment->delete();

            return redirect()->route('comments.index')->withSuccess('Delete Successfully!');
        }
        catch(Exception $th)
        {
            dd($th->getMessage());
        }
    }
}
