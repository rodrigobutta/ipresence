## Install

1) Instal dependencies
```
composer install
```

2) Create absolute symlink in public to store cache (for now) in /storage/cache (outside public) 
** execute it under /, not in /public **
```
ln -s $PWD/storage/cache public/cache
```

3) The .ENV file has some configurations worth to see, but if you'll only test with the provided json as source, theres no need to config anything there.


**OPTIONAL (Adding a second source MYSQL DATABASE with the same quotes)**

I've added an alternative MySql source with the same quotes in the quotes.json to show the use of database abstraction and so.
So if you want to use it, you need to:
1) Config database credentials in **.env** file.
2) Run migrations (wich will create a QUOTES table) 
```
php database/migrations.php
```
3) Run seeds (wich will populate QUOTES table with the same quotes retrieved from the repository quotes.json file) 
```
php database/seeds.php
```



## Run Tests
```
./vendor/bin/phpunit --testdox --bootstrap vendor/autoload.php tests
```


## Run


### A) Online

https://ipresence.rodrigobutta.com/shout/steve-jobs?limit=2


### B) Local from command 

Start local server (pwd in the root of the app)
```
php -S localhost:8080 -t public
```

Test OK
```
curl -s http://localhost:8080/shout/steve-jobs?limit=2
```

Test limit
```
curl -s http://localhost:8080/shout/steve-jobs?limit=15
```

Test not found
```
curl -s http://localhost:8080/shout/rodrigo-butta
```


### B) Command line (without HTTP server)
```
cd public
php command.php shout steve-jobs 5
```


### C) From local server (XAMP, MAMP, ...)

(remember to point server root to /public)
Then in the browser run http://localhost:8080/shout/steve-jobs?limit=2


