<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = 'comments';

	protected $hidden = ['pivot'];

	protected $fillable = [];

	protected $dates = [];

	public $timestamps = false;

	public static $rules = [
		// Validation rules
	];

	public function bookmark()
	{
		return $this->belongsTo('App\Bookmark', 'bookmarks_comments', 'comment_id', 'bookmark_id');
	}
}
