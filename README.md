<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
</p>

## WHIPIX Task

This Api-application is a task introduced to WHIPIX inc, 


## Introduction

this projects aims to enable the user to register and login to perform many actions over the task model like create,update,delete,show,show specific category,set a deadline for the task, handle it's visibility ,and many other useful functions . 



## Installation

This REST-API built in laravel V 5.5 so make sure your php CLI (command line interface) version is matches version requirements . the project is also using passport-password grant for authentication.

- Install Laravel and handle .env file
- Run Passport:install
- Run Migrations
- register a new user 
- there isn't a login page , so you have to go to ../oauth/token with the grant_type, client_ID, client_secrets, username, password And scope to generate a token for the registered user and setup a postman environment to be able to perform other actions with this registered user
- or you can import my database-> whipix.sql -> into your migrated database and use my postman collection that is located at the root folder (collection V2) and setup postman environment which is located at the root folder too .
- now you good to go  

## Files Functionality

I'll mention most of critical files and it's own functionality to get a better understanding of structure of our project.  

- Controllers/RegisterController : used to register a new user
- Controllers/SearchUserController : used to search for a specific user
- Controllers/TaskController : used to handle model:task actions
- Requests/StoreUserRequesr : used to validate rules apply on create new user request
- Requests/SearchUserRequest : used to validate rules apply on searching for a user
- Requests/StoreTaskRequesr : used to validate rules apply on creating a new task
- Requests/UpdateTaskRequest : used to validate rules apply on updating a exists task
- Requests/DeadLineTaskRequest : used to validate rules apply on a exists task->deadline
- Requests/ToPrivateTaskRequest : used to validate rules apply on a exists task->visibility
- Policies/TasksPolicy : this policy checks if the user own the task which he/she perform action over. 
- Traits/Orderable : used to fetch records according to Date->DESC
- Transformer/TaskTransformer : used to handle the fractal response of an action over task model
- Transformer/UserTransformer : used to handle the fractal response of an action over User model
- Routes/Api : used to handle the endpoints.


## Root Folder

The root folder of the task has 

- application files
- my Mysql database , it's name : whipix.sql
- my postman collection V2  , it's name : whipix.postman_collection , it contains all the requests of the task with suitable body and correct headers but you have to import my  environment which is located at the root folder first.
- my environment names are : whipix(kamel).postman_environment , WHIPIX(mostafa).postman_environment , they has the token used in most of the collection requests.



## Conculation

- This task was a really big challenge despite it's not 100% completed but i am working on improving my skills and can push another update soon to fix the login issue maybe i will gonna use JWT for more stability  .
