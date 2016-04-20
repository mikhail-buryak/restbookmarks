<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Bookmark;
use App\Comment;

class CommentsController extends Controller
{
	public function postComment($id, Request $request)
	{
		// Check request params
		$validator = Validator::make(array_merge($request->all(), ['id' => $id]), [
				'id' => ['required', 'numeric', 'exists:bookmarks'],
				'text' => ['required', 'string', 'max:1023']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		$bookmark = Bookmark::find($id);
		$comment = new Comment();
		$comment->text = $request->input('text');
		$bookmark->comments()->save($comment);

		return response()->json(['id' => $comment->id]);
	}
}
