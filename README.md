

## About Project

This project is a News Admin panel developed by laravel 8 containing: <br>
- User Registeration and authentication
- Defining different Roles to users and control user access<br>
- News CRUD with image and file upload

## initiating project 

- You should have XAMPP installed in your machine 
- Run php artisan DB:seed
- Run php artisan migrate
- Run php artisan serve <br>
After seeding database there will be two users first one with the email of<br>
admin@admin.info and password: "password" and with the role of super admin<br>
and a second user with email of author@author.com and password: "password"<br>

## Additional information

- New registered  users can only see news list<br>
- Authors can write news, delete or edit thier own posts <br>
- Super admin can assign a role to a user or alter the existing role of a user<br>

