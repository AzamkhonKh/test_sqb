# Выполнение тестового задания

ссылка на документ [тык](https://www.dropbox.com/scl/fi/si6it9mevzf5o1luv3emt/test_sqb.gdoc?dl=0&rlkey=9pf3gogpeyt5d5xcl68anbbcf)


**_used stack_:**

1. **laravel 8**

2. **DB MySQL 8.0.28-0ubuntu0.21.10.3** // it could be any SQL based DB

##to run app after gut pull

`composer install`

first define .env file (write DB_* settings), install composer data then:
`php artisan migrate`

`php artisan serve`

default endpoint localhost:8000

open GET endpoint/ sample (http://127.0.0.1:8000/)
and REST API GET endpoint/api/currency (sample: `http://127.0.0.1:8000/api/currency?from=2022-04-20&to=2022-04-23`)
then will see changes
