<?php

namespace App\Http\Controllers;

use App\Http\Requests;

use App\Mailers\AppMailer;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function postComment(Request $request, AppMailer $mailer)
    {
        $this->validate($request, [
            'comment' => 'required'
        ]);

        $comment = Comment::create([
            'ticket_id' => $request->input('ticket_id'),
            'user_id'   => Auth::user()->id,
            'comment'   => $request->input('comment'),
        ]);
    }
}
