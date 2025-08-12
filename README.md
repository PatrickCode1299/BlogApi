On windows run cmd and do git clone https://github.com/PatrickCode1299/BlogApi.git  cd into the directory you cloned the repo and cd into 10.0 once more.

While in the working directory run this command composer update.

Next run php artisan migrate

Then run php artisan serve

Call the api locally using built in curl, here is a sample syntax used to test blog creation endpoint: 

curl -X POST "http://127.0.0.1:8000/api/blogs/1/posts" ^
-H "Authorization: vg@123" ^
-H "Accept: application/json" ^
-H "Content-Type: application/json" ^
-d "{\"blog_post_title\":\"Tech Trends 2025\",\"blog_post_content\":\"Latest  trends and breakthroughs for 2025.\"}", 
