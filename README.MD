#User Manual

##Requirements

1) Local server such as [WAMP](https://sourceforge.net/projects/wampserver/files/latest/download) or [XAMPP](https://www.apachefriends.org/download.html)
   *Please review this tutorial if you have any difficulties [how to geek](https://www.howtogeek.com/177129/beginner-geek-how-to-host-your-own-website-on-windows-wamp/)
2) Local server database (if using WAMP, it will be phpmyadmin)

##How to setup 

1) Put the hospital-php directory in your local server WWW directory
2) Create database table named DATABASETABLENAME (you can name it whatever) 
3) Import [sql](dataBase.sql) into your DATABASETABLENAME
4) Edit [Models/database.php](Models/database.php)
    *Fill in DATABASETABLENAME with your DATABASETABLENAME
    *Fill in USERNAME and PASSWORD with your database username and password
5) Start your local server
6) Open a browser of your choice, open localhost/hospital-php
7) Log in as:

| username     | Password      | Role                              |
| ------------ | ------------- | --------------------------------- |
| Doc          | Doc           | Doctor - Sees nothing             |
| Rec          | Rec           | Receptionist - Can update general info   |
| admin        | admin         | Admin (God Tier Access)           |
