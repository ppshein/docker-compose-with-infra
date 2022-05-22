# Application Deployment 

This is complete solution to deploy application into VM and which can be used inside cicd tools like Jenkins or something like that.

**All strings should included [A-Z and space]**

| key | value |
|--|--|
| env | Environment (sit, uat, prod) |


**HELP SECTION**

    ./deploy --help
    

**How to deploy services into VM**

    ./deploy infraApply <env>
	./deploy infraApply sit
    
    
**How to destroy services in VM**

    ./deploy infraDestroy <env>
	./deploy infraDestroy sit


# Application Folder Structure

### env
This is environment folder that we can put all sort of envirnment file into this folder. By for now, it has SIT environment called **sit.env** and **prod.env**.

    MYSQL_ROOT_PASSWORD=MYSQL_ROOT_PASSWORD
    MYSQL_USER=MYSQL_USER
    MYSQL_PASSWORD=MYSQL_PASSWORD
    MYSQL_DATABASE=MYSQL_DATABASE
    MYSQL_HOST=mysql
    
    MONGO_HOST=mongodb
    MONGO_USERNME=root
    MONGO_PASSWORD=password
    MONGO_DATABASE=MyDatabase
    MONGO_COLLECTION=MyCollection
    
    MONGO_INITDB_ROOT_USERNAME=root
    MONGO_INITDB_ROOT_PASSWORD=password
    
    XDEBUG_ENABLED=1
    XDEBUG_REMOTE_AUTOSTART=1
    XDEBUG_MAXNESTING_LEVEL=1000
    XDEBUG_REMOTE_CONNECT_BACK=1
    XDEBUG_REMOTE_HOST=host.docker.internal
    PHP_IDE_CONFIG=serverName=localhost
	
	
### mongo-seed
This folder is to import dummy data into Mongo database. If it is required to add more data, it can be updated inside **init.json** file which is dummy data object. **seed.sh** is bash file that import data from **init.json** into mongodb.

### mongodb
This folder is to store all data related to mongodb

### mysql-database
This folder is to store all data relate to mysql. However there is **init.sql** file that to be imported into mysql database once database creating finished.

### php
This folder is PHP application folder.