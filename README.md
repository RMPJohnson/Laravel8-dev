# adeel-laravel-8-dev
this is a potential starting point for our new backend.  It includes some basic functionality outlined in this README file.

# Laravel 8.x boilerplate with docker configuration

Laravel is well known PHP open-source framework. It intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony. Our Goal in this project is to create a basic architecture of a project that includes all necessary items that we use while developing any web application. We also create a docker file that includes Apache, PHP and MySQL. This application is tested on Ubuntu 20.0 LTS.
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<img alt="GitHub watchers" src="https://img.shields.io/github/watchers/RMPJohnson/DigitalDirectory?style=social">
<img alt="GitHub code size in bytes" src="https://img.shields.io/github/languages/code-size/RMPJohnson/DigitalDirectory">
<img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/RMPJohnson/DigitalDirectory">
<img alt="Weblate component license" src="https://img.shields.io/weblate/l/godot-engine/godot">
</p>

## Configure Docker on your machine.

### Step1: Install Docker
```bash
sudo apt install docker.io
```
### Step2: Check Docker
```bash
$ docker --version
```
### Step3: Download code
You need to donwload code form github here a link for download
```bash
git clone https://github.com/RMPJohnson/DigitalDirectory.git [projectname]
```
or you can directly [Download](https://github.com/RMPJohnson/DigitalDirectory/archive/refs/heads/main.zip) it.

### Step4: Run Docker
we have already created docker yml file and DockerFile. So you don't need to worry about the images. all the necessary images and packages are already included in docker file and database configuration. We already installed phpmyadmin as well.
```bash
docker-compose up -d
```
or 
```bash
docker-compose build && docker-compose up -d
```
### Step3: Connect Docker image
```bash
 docker exec -it [image_name] bash
```

## Sources and Laravel Settings:
After login in Laravel_app image and downloading git repo all source code is in src directory so you need to run few command for Laravel configuration but no need to download new code. you need to have .env file and add your database configuration like username and password for database.


```bash
composer update
composer dump-autoload

```
## Change database settings in .env:
Please change all these variable according to your database server settings. You can define additional settings as per your requirement.
```bash
DB_CONNECTION=mysql
DB_HOST=*******
DB_PORT=****
DB_DATABASE=*******
DB_USERNAME=******
DB_PASSWORD=*****
```
Run following commands after changes in .env file
```bash
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## What's Inside?
In this boilerplate we have split this application into two sections.  One is for guest users where content is available without needing to become a member.  The other is a registered admin user who can see content that requires specific access to view resources.
### Public (Guest user)
To view guest content you just need to open your browser and run the URL that is provided by your docker image setup. For example:
```bash
http://localhost:8000
```
You'll see that the guest area is available as you will see one static page that has a few images and text.
### Management System:
if you want to access the management system of the app then you need to login with admin access. But don't worry--your first account is already created with admin access!
```bash
http://localhost:8000/administrator
```
Add email and password:
```bash
Email: admin@gmail.com
Password: admin123
```
***Note: Please change your password after first login.***

Once you login, you will see a dashboard where can change your password. Here you can update your profile information and create roles and permissions.

# Features:
1. Inspinia Bootstrap theme for admin area. [documentation](http://webapplayers.com/inspinia_admin-v2.9.4/)
2. User Laravel Authentication. [documentation](https://laravel.com/docs/5.7/authentication)
3. Roles & Permissions [documentation](https://codeanddeploy.com/blog/laravel/laravel-8-user-roles-and-permissions-step-by-step-tutorial#kjNAJj9MlMLUcT2n1u7o2VOaO)
4. User Management (Change password, Profile)
5. Roles Management
6. Permission Management
7. Landing page for front-end.
8. Implementation of Repository Design Patterns. [documentation](https://dev.to/carlomigueldy/getting-started-with-repository-pattern-in-laravel-using-inheritance-and-dependency-injection-2ohe)

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
