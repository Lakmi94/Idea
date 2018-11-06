#Getting Started with PHP#

As with learning any programming language, I highly reccommend that you tackle
the [tutorial](http://php.net/manual/en/tutorial.php) on the official PHP website. This is a good way to learn the basics. In addition to this reading there will be a small assignment below to test your skills and understanding with PHP.

##PHP Assignment 1##

This assignment will test your understanding of how PHP can be used to pass data from one webpage to another. You will produce two files *form.hml* and *receive.php*. *form.html* will simply contain a form with one submit button and one text field in which you will type a name. Clicking the submit button will take us to *receive.php*. This page should say 'Hello X' where X is the name that you typed on the previous page of *form.html*. You are to submit this small application to our server in the following folders:

- /var/www/html/youngchan/
- /var/www/html/linda/
- /var/www/html/lakmi/
- /var/www/html/regis/
- /var/www/html/nuwan/

It is important to know how HTML forms work in general for this assignment. Remember, you can transmit data from one page to another via the HTTP POST or GET methods. Use GET for this example. I will explain how the server works and how to connect to it.

##Testing on your Machine##

Ensure you have php,apache, and mysql installed on your machine. Ubuntu users can install this via:

        sudo apt-get install php5 apache2 mysql-client mysql-server php5-mysql

Files to be tested in this apache server should be placed in /var/www/html. Remember, the IP address when testing on your own machine is 127.0.0.1 or localhost. You can type any of these two into your browser followed by the correct path to view files in /var/www/html.

##Submission##

To upload the files to the server, you can use scp with the following command:

    scp -i my_pem.pem file_to_send some_username@some_server:/directory_in_server

##Connecting PHP to MySQL Database##

PHP contains builtin functionality to interface with MySQL. Of course, you must first ensure that you have MySQL running on your machine and that a database exist. [This link](http://webcheatsheet.com/php/connect_mysql_database.php) contains some great example on how to interface with an existing database.

##PHP Assignment 2##

On our server(54.149.232.134) there exists a database by the name *test1* with a table by the name *comments*. Below is a description of the table:

    mysql> describe comments;
    +-------------+-------------+------+-----+---------+----------------+
    | Field       | Type        | Null | Key | Default | Extra          |
    +-------------+-------------+------+-----+---------+----------------+
    | id          | int(11)     | NO   | PRI | NULL    | auto_increment |
    | user        | varchar(20) | YES  |     | NULL    |                |
    | comment     | text        | YES  |     | NULL    |                |
    | date_posted | date        | YES  |     | NULL    |                |
    +-------------+-------------+------+-----+---------+----------------+

Your goal is to create an interface that prints out all of the comments in a table and allows you to add more comments to the table. Design and implementation is up to you. Edit and remove features aren't neccessary though you are free to implement them if you'd like. The above section will be of great help.

Ask me for the mysql username and password on the server as you will need it.
