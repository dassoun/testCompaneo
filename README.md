# COMPANEO, would you REST?  
## Introduction
**[Companeo](http://www.companeo.com/)** is seeking a **php developer** and this exercise will ensure that you are the one we are looking for.

## Dev Environment
You will work with a LAMP like stack but we switch **mySql** by **PostGreSql** 
- Linux distribution ( any one ) 
- [Postgresql Database](http://www.postgresql.org/download/linux/)
- [Apache2](http://www.linux-france.org/prj/edu/archinet/systeme/ch16s02.html)
- [PHP5.*](http://php.net/) 
- your favorite code editor
- a github account

### Exercise
The goal of this exercise is to build a back-end **REST API** with **PHP version 5** which will **get/update/add/delete** data format from a PostGreSQL database.

Every data will be transmitted by JSON .
So we expect you to give us a project that works with the get/post/put/delete methodes available.

### Code Convention
We want you to use :
- **CamelCase** named function
- **PhpDocs comments** for each function/object
- **explicit commit message** for each stage.
- **MVC pattern**


#### Expected URL:
url hostname will be `http://localhost/` + expected url api (see below).
- `api/teams`: *get* all teams data from the database.
- `api/teams/:id`: *get* team data by Unique id from database.
- `api/teams/:id`: *edit* existing team on database by Unique id.
- `api/teams/:id`: *delete* existing team on database by Unique id.
- `api/teams/:id/matchs`: *get* every matchs this team are in.
- `api/team`: *add* new team inside the database. be sure the name of the new team is different from the others.
- `api/events`: *get* all events data from the database.
- `api/events/:id`:  *get* event data by Unique id from the database.
- `api/events/:id`: *edit* event on database by Unique id by Unique id.
- `api/events/:id`: *delete* event by its Unique id.
- `api/event`: *add* new event. 
- `api/matchs`: *get* every matchs
- `api/matchs/:id`: *get* match data by its id.


#### Step 1/
Create and fulfill a new local database by running  `SQL_install.sql`.
#### Step 2/ 
Create folder inside your localhost directory.
#### Step 3/
Start coding your REST API.
#### Step 4/
Create new branch and  make a commit of your progress on it.
#### Step 5/ 
When your time is over make a pull request on the github project repository and wait for us to come back to you after we tested your work.
