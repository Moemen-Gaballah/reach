# PHP Laravel Developer Task - Simple Ads API

Create a simple Ads management API that shows ads and related tags/categories. It will be a part of a module handling the Advertiser
functionalities towards these ads.


## Installation

Clone the repo `git clone https://github.com/Moemen-Gaballah/reach.git` and `cd` into it

`composer install`

Rename or copy `.env.example` file to `.env`

`php artisan key:generate`

Set your database credentials in your `.env` file


`composer install`

`npm install`

`npm run dev`

`php artisan migrate:fresh --seed`

`php artisan serve`

test `php artisan test`

`http://127.0.0.1:8000/`

Basic API Documentation : `http://127.0.0.1:8000/request-docs`

Postman Collection in root project  : `reach.postman_collection.json`

### Done

- [x] Seeder For Advertiser
- [x] Tags (CRUD)
- [x] Categories (CRUD)
- [x] Store Ads
- [x] Ads filters (by tag, by category)
- [x] Showing Advertiser Ads (Get Ads by Advertiser Id).
- [x] schedule a daily email at 08:00 PM (Job)
- [x] API Documentation
- [x] Unit Test for create categories

### TODO
- [] ERD (Entity Relationship Diagram)
- [] API Documentation with Swagger
- [] complete Unit test
- etc...


## Demo

`API Documentation.`

![image](https://raw.githubusercontent.com/Moemen-Gaballah/reach/main/public/api-docs.png)

