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
		$comment->ip = $request->ip();
		$bookmark->comments()->save($comment);

		return response()->json(['id' => $comment->id]);
	}

	public function putComment($id, Request $request)
	{
		// Check request params
		$validator = Validator::make(array_merge($request->all(), ['id' => $id]), [
			'id' => ['required', 'numeric', 'exists:comments'],
			'text' => ['required', 'string', 'max:1023']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		$comment = Comment::find($id);

		if ($comment->created_at < date('Y-m-d H:i:s', strtotime('-1 hour')))
			return response()->json(['expired_at' => date('Y-m-d H:i:s', strtotime($comment->created_at.'+1 hour'))], 410);

		if ($comment->ip !== $request->ip())
			return response()->json(['message' => 'client ip not match'], 403);

		$comment->text = $request->input('text');
		$comment->save();

		return response()->json(['id' => $comment->id]);
	}
}
