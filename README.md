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

1. open GET endpoint/ sample (http://127.0.0.1:8000/)
2. REST API GET endpoint/api/currency (sample: `http://127.0.0.1:8000/api/currency?from=2022-04-20&to=2022-04-23`)
3. REST API GET endpoint/api/log/currency (sample: `http://127.0.0.1:8000/api/log/currency?from=2022-04-23&to=2022-04-23`)

sample screenshots 
1. respt api response [image] (https://www.dropbox.com/s/8r8dkwg5g1szo21/Screenshot%20from%202022-04-24%2010-37-24.png?dl=0)
2. table first look [image] (https://www.dropbox.com/s/g8588gs7r0v2zg1/Screenshot%20from%202022-04-24%2010-38-00.png?dl=0)
3. to load data by given range from cb of russia [image] (https://www.dropbox.com/s/y12vx9olz7rzelo/Screenshot%20from%202022-04-24%2010-48-17.png?dl=0)