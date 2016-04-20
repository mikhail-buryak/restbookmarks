# Responses API restBookmarks
Bookmarking service allows you to add a URL and posting comments.

# Deploy
If you use docker, clone, build and run case.

        git clone https://mikhail-buryak@bitbucket.org/mikhail-buryak/restbookmarks.git
        cd restbookmarks/development
        docker-compose build
        docker-compose up -d

You can also put contents of a [application folder](https://bitbucket.org/mikhail-buryak/restbookmarks/src/ba216e27aa58afdf5902dd1826fde6e334af797b/development/app/?at=master), in to domain folder on your server.

**Stack**

* Docker
* Nginx
* MySQL
* Lumen