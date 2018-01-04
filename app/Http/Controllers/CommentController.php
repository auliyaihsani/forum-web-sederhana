<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Forum;
class CommentController extends Controller

{
  // fungsi stoe untukmengirim komentar
    public function buat_komentar(Request $request, Forum $forum)
  {
    $this->validate(request(), [
        'isi_komentar' => 'required',
    ]);

      $comment = New Comment;
      $comment->isi_komentar=$request->isi_komentar;
      $comment->user_id=auth()->user()->id;

      $forum->comments()->save($comment);

      return back()->withMessage('komentar berhasil dibuat');
  }




}
