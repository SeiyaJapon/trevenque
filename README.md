# Test #

### Environment information ###
To mount the environment docker is needed. Although it is prepared for mac. For other operating systems it may not work properly.

There is a Makefile file.

The make (or make help) command returns information from all commands.

To start the environment, follow these steps:

1.- make build
2.- make laravel-prepare
3.- create the .env file with the database data
```
DB_CONNECTION=mysql
DB_HOST=trevenque-db
DB_PORT=3306
DB_DATABASE=TrevenqueDb
DB_USERNAME=user
DB_PASSWORD=password
```
4.- make install-components

With this you will have an environment with 2 users:

1.- Teacher:
prueba@mail.com - 123123123

2.- Student:
prueba@mail.com - 123123123

If you log as teachear, you can create Titles, Courses and Qualify students courses.

You need make relationship between user and course manually into students_courses table.
After this you can qualify.

If you log as student, you can see your last qualifies.