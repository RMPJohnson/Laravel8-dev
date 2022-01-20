# Laravel 8.x boilerplate with Docker configuration

Laravel is well known PHP open-source framework. It intended for the development of web applications following the model–view–controller architectural pattern and based on Symfony. Our Goal in this project is to create a basic architecture of a project that includes all necessary items that we use while developing any web application. We also create a docker file that includes Apache, PHP and MySQL. This application is tested on Ubuntu 20.0 LTS.

## Configure Docker on your Machine.

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
docker-comopse build && docker-compose up -d
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
php artisan key:generate
php artisan migrate
php artisan db:seed
```

## What's Inside?
In this boilerplate we have split this application in two section one is for public are where you don't need to become a member are required a specific access to view resources.
### Public
for public area you just need to open your browser and run the URL that is provided by your docker images for-example.
```bash
http://localhost:8000
```
The public area of the website is available now you can see a one static page and have few images and text.
### Management System:
if you want to access the management system of the app then you need to login with admin access. but don't worry your first account is already created with admin access.
```bash
http://localhost:8000/administrator
```
Add email and password:
```bash
Email: admin@gmail.com
Password: admin123
```
***Note: Please change your change after first login.***

There will be a dashboard in-front of you where can change your password. Update your profile information and create roles and permission.

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
