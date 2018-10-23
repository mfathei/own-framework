#### Create Own Framework

run unit test `phpunit test`

after adding front.php (front controller) we can use
`http://127.0.0.1:4321/front.php/hello?name=Fabien`
`http://127.0.0.1:4321/front.php/bye`

after restructuring our framework use this to run server
`php -S 0.0.0.0:4321 -t web web/front.php`

now u can call page like :
`http://127.0.0.1:4321/hello?name=Mahdy`
`http://127.0.0.1:4321/bye`

after using Symfony\Routing and adding $routes in app.php we can now call page like this:
`http://127.0.0.1:4321/hello/Mahdy`
`http://127.0.0.1:4321/bye`

after updating composer.json file to autoload src/ you must run this:
`composer dump-autoload`
