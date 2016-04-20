<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Bookmark;

class BookmarksController extends Controller
{
	public function getHistory(Request $request)
	{
		// Check request params
		$validator = Validator::make($request->all(), [
			'offset' => ['numeric']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		$take = 10;
		$offset = $request->input('offset');
		$items = Bookmark::orderBy('created_at', 'desc')->skip($offset)->take($take + 1)->get();
		$itemsCount = count($items);
		$items->forget($take);
		$url = url($request->getPathInfo());

		return response()->json([
			'items' => $items,
			'pagePrev' => ($offset - $take >= 0)? $url.'?offset='.($offset-$take) : false,
			'pageNext' => ($itemsCount > $take)? $url.'?offset='.($offset+$take) : false,
		]);
	}

	public function getBookmark(Request $request)
	{
		// Check request params
		$validator = Validator::make($request->all(), [
			'url' => ['required', 'string', 'url', 'exists:bookmarks,url']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		$bookmark = Bookmark::where('url', $request->input('url'))->with('comments')->first();

		return response()->json($bookmark);
	}

	public function postBookmark(Request $request)
	{
		// Check request params
		$validator = Validator::make($request->all(), [
			'url' => ['required', 'string', 'url']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		$bookmark = Bookmark::where('url', $request->input('url'))->first();

		if($bookmark !== null)
			return response()->json(['id' => $bookmark->id], 409);

		$bookmark = new Bookmark();
		$bookmark->url = $request->input('url');
		$bookmark->save();

		return response()->json(['id' => $bookmark->id]);
	}
}
