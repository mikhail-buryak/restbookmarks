# API restBookmarks
Bookmarking service allows you to add a URL and posting comments.

# Deploy
If you use docker, clone, build and run case.

        git clone https://mikhail-buryak@bitbucket.org/mikhail-buryak/restbookmarks.git
        cd restbookmarks/development
        docker-compose build
        docker-compose up -d

You can also put contents of a [application folder](https://bitbucket.org/mikhail-buryak/restbookmarks/src/6aaef0df030e03d2f8bbe08a0cb0c64c3e873f84/development/app/?at=master), in to domain folder on your server.

**Stack**

* Docker
* Nginx
* MySQL
* Lumen