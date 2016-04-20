<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model {

	protected $table = 'bookmarks';

	protected $hidden = ['pivot'];

	public $timestamps = false;

	public function comments()
	{
		return $this->belongsToMany('App\Comment', 'bookmarks_comments', 'bookmark_id', 'comment_id');
	}
}
