# Shelter API
An api to allow for simple managment of animal shelters. The goal of the task was to enable CRUD operations for employees, animals and shelters.
I decided to do it simple way following SOLID principles as well allowing for easy growth - for example adding other animals then cats. I had to make some assumptions to finish the task, including:
- Employee can work only at one Shelter
- Employee and Animal cannot exist without Shelter

Note that data i decided to include in database is only for demo purposes.

## Requirements
- docker

## Installation
- Download the project
- run ```./vendor/bin/sail up``` (-d for detached mode)
- use ```./vendor/bin/sail bash``` to go into terminal and use artisan commands
- run ```composer install```

## Usage
You can view available routes by using: ```php artisan route:list```

## Testing
Run tests by running: ```php artisan test``` in docker terminal


### Note
This is a recruitment task so some simplifications and decisions have been made, real life problem solution could vary.
