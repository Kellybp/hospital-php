#User Manual

##Requirements
1) Local server such as WAMP or XAMP
2) Local server database (should be included in WAMP or XAMP)

##How to setup 
1) Put the hospital-php directory in your local server WWW directory
2) Create database table 
3) Import sql for dummy database into table
4) Edit the Models/database.php 
    *Fill in DATABASETABLENAME with your table name
    *Fill in USERNAME and PASSWORD with your database username and password
5) Start your local server
6) Open a browser of your choice, open localhost/hospital-php
7) Log in as:

| username     | Password      | Role                              |
| ------------ | ------------- | --------------------------------- |
| Doc          | Doc           | Doctor - Sees nothing             |
| Rec          | Rec           | Receptionist - Can update general info   |
| admin        | admin         | Admin (God Tier Access)           |