## Mikhail Buryak ##
=================

# Responses API restBookmarks
Bookmarking service allows you to add a URL and posting comments.

## Bookmark [/api/bookmark]

### Get a bookmark from url with comments [GET]
/api/bookmark?url=https://apiblueprint.org

+ Parameters
    + url: `https://apiblueprint.org` (required, string, format:url, exist) - Url of bookmark

+ Response 200 (application/json)
    + Body

        {
		  "id": 1,
		  "url": "https://www.google.com",
		  "created_at": "2016-04-20 19:58:13",
		  "comments": [
		    {
		      "id": 1,
		      "text": "For don't forget",
		      "ip": "192.168.99.1",
		      "created_at": "2016-04-20 19:59:00"
		    }
		  ]
		}

+ Response 400 (application/json)
    + Body

        {
		  "url": [
		    "The selected url is invalid."
		  ]
		}



### Create new bookmark and get it id [POST]
/api/bookmark?url=https://apiblueprint.org

+ Parameters
    + url: `https://apiblueprint.org` (required, string, max:1023) - Url of bookmark

+ Response 200 (application/json)
    + Body

        {
		  "id": 2
		}

+ Response 400 (application/json)
    + Body

        {
		  "url": [
		    "The selected url is invalid."
		  ]
		}

+ Response 409 (application/json)
    + Body

        {
		  "id": 1
		}



### Get a history of bookmarks [/history][GET]
http://192.168.99.100:8000/api/bookmark/history

+ Parameters
    + offset: `10` (numeric) - Offset for take bookmarks

+ Response 200 (application/json)
    + Body

		{
		  "items": [
		    {
		      "id": 16,
		      "url": "https://www.google.com/15",
		      "created_at": "2016-04-20 20:12:03"
		    },
		    {
		      "id": 15,
		      "url": "https://www.google.com/14",
		      "created_at": "2016-04-20 20:11:57"
		    },
		    {
		      "id": 14,
		      "url": "https://www.google.com/13",
		      "created_at": "2016-04-20 20:11:50"
		    },
		    {
		      "id": 13,
		      "url": "https://www.google.com/12",
		      "created_at": "2016-04-20 20:11:43"
		    },
		    {
		      "id": 12,
		      "url": "https://www.google.com/11",
		      "created_at": "2016-04-20 20:11:38"
		    },
		    {
		      "id": 11,
		      "url": "https://www.google.com/10",
		      "created_at": "2016-04-20 20:11:33"
		    },
		    {
		      "id": 10,
		      "url": "https://www.google.com/9",
		      "created_at": "2016-04-20 20:11:28"
		    },
		    {
		      "id": 9,
		      "url": "https://www.google.com/8",
		      "created_at": "2016-04-20 20:11:23"
		    },
		    {
		      "id": 8,
		      "url": "https://www.google.com/7",
		      "created_at": "2016-04-20 20:11:17"
		    },
		    {
		      "id": 7,
		      "url": "https://www.google.com/6",
		      "created_at": "2016-04-20 20:11:12"
		    }
		  ],
		  "pagePrev": false,
		  "pageNext": "http://192.168.99.100:8000/api/bookmark/history?offset=10"
		}

+ Response 400 (application/json)
    + Body

		{
		  "offset": [
		    "The offset must be a number."
		  ]
		}






## Comment [/api/comment]

### Create new comment [bookmark/{bookmark.id}][POST]
/api/comment/bookmark/1?text=For don't forget

+ Parameters
    + bookmark.id: `1` (required, numeric, exist) - Id of bookmark
    + text: `For don't forget` (required, string, max:1023) - Comment text

+ Response 200 (application/json)
    + Body

		{
		  "id": 2
		}

+ Response 400 (application/json)
    + Body

		{
		  "id": [
		    "The selected id is invalid."
		  ]
		}


### Edit comment [{comment.id}][PUT]
/api/comment/1?text=Awesome

+ Parameters
    + comment.id: `1` (required, numeric, exist) - Id of comment
    + text: `For don't forget` (required, string, max:1023) - Comment text

+ Response 200 (application/json)
    + Body

		{
		  "id": 1
		}

+ Response 400 (application/json)
    + Body

		{
		  "id": [
		    "The selected id is invalid."
		  ]
		}

+ Response 403 (application/json)
    + Body

		{
		  "message": "client ip not match"
		}

+ Response 410 (application/json)
    + Body

		{
		  "expired_at": "2016-04-20 19:34:10"
		}


### Delete comment [{comment.id}][PUT]
/api/comment/1

+ Parameters
    + comment.id: `1` (required, numeric, exist) - Id of comment

+ Response 200 (application/json)
    + Body

		{}

+ Response 400 (application/json)
    + Body

		{
		  "id": [
		    "The selected id is invalid."
		  ]
		}

+ Response 403 (application/json)
    + Body

		{
		  "message": "client ip not match"
		}

+ Response 410 (application/json)
    + Body

		{
		  "expired_at": "2016-04-20 19:34:10"
		}



**Stack**

* Docker
* Nginx
* MySQL
* Lumen