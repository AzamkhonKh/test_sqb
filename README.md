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

open endpoint/table

then will see changes
