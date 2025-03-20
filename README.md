# Library

A website to showcase books and change their status.



## Requirements


XAMPP (or another SQL admin tool)

Composer

NodeJS

# Installation
1. Clone the repository
2. Install composer in the root:

```
$ composer install
```
3. Generate env file

4. Create database and migrations:
```
$ php artisan migrate:refresh --seed
```
5. Run Tailwindcss and JS:
```
$ npm run dev
```
6. Run project:
```
$ php artisan serve
```


# Instructions

Main page: localhost/books
Create book: localhost/books/create

# Images
![index](https://github.com/Akii-Dev/Library/blob/main/public/images/bookindex.png?raw=true)
![edit](https://github.com/Akii-Dev/Library/blob/main/public/images/editbook.png?raw=true)