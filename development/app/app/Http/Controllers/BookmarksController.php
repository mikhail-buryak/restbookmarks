<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;

class BookmarksController extends Controller
{
	const MODEL = "App\Bookmark";

	use RESTActions;

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
		$items = \App\Bookmark::orderBy('created_at', 'desc')->skip($offset)->take($take + 1)->get();
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
			'url' => ['string', 'url']
		]);

		if ($validator->fails())
			return response()->json($validator->errors(), 400);

		return response()->json([]);
	}

}
