#Getting Started with MySQL#

This section is meant to introduce basic usage of MySQL. MySQL is a database software system that runs on a machine. One instance of MySQL can have multiple databases. One database can have multiple tables. One table can have multiple rows and columns. Here, we will see how to log in to MySQL and how to create a database, create a table within a database, and how to add data and query data from a table.

##Installing MySQL##

Ubuntu users can install MySQL with the following command:

        sudo apt-get install mysql-client mysql-server

##Logging into MySQL##

It is important to note that MySQL asks for a new password when being installed. This password is important as we will use it everytime we connect to it. The default user for MySQL is root. Thus, we can connect to MySQL via the following command:

    mysql -u root -p

Remember that all commands in MySQL end with a semicolon(;). Although not a requirement, MySQL commands are generally written in upper case.

##How to Create and Delete a MySQL Database##

You can view all databases contained on the MySQL system by typing:

    SHOW DATABASES;

You can create a database with the following command:

    CREATE DATABASE database_name;

You can delete a database with the following command:

    DROP DATABASE database_name;

To select a database to use, issue the following command:

    USE database_name;

Once a database is selected, you can show all tables in a database with the following command:

    SHOW tables;

##How to Create a Table in a MySQL Database##

Once a database is selected using the *USE* command, you can create a table using the *CREATE TABLE* command. Note that when creating a table, one must explictly define the datatypes of the data contained in the columns of the table. The following is an example of a table being created called potluck with 5 rows (id, name, food, confirmed, and signup date). Note that the first column is an ID that auto-increments. This means everytime a new entry is placed into the table, it is assigned a new ID value that is equal to the previous ID value plus one.

    CREATE TABLE potluck (id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20),
    food VARCHAR(30),
    confirmed CHAR(1),
    signup_date DATE);

Once this table exist, we can ask MySQL to describe its layout to use using the following command:

    DESCRIBE potluck;

##How to Add Data into a Table##

Once a database is selected, we can insert data into a table using the *INSERT INTO* command. The following example will insert data into the potluck table created above.

    INSERT INTO potluck (id,name,food,confirmed,signup_date) VALUES (NULL, "Delvison", "Pizza","Y", '2014-12-25');

To view all data in our sample *potluck* table we can issue the following command:

    SELECT * FROM potluck;

##How to Update Data in a Table##

Often times, it occurs that data must be updated in a database. Considering our sample entry into our *potluck* table above, lets say we want to change the item Delvison is bringing from Pizza to Chicken. We can do so with the following command:

    UPDATE potluck SET food= 'Chicken' WHERE potluck . name ='Delvison';

##How to Delete a Row in a Table##

Considering our sample *potluck* table, lets say that Delvison is no longer attending. Thus, we must remove his entry from the table. This can be done with the following command:

    DELETE FROM potluck WHERE name='delvison';
    
##How to Connect to MySQL Remotely##

Often times it occurs that MySQL is deployed on a dedicated separate server. To connect to a MySQL server remotely use the following command.

     mysql -u USERNAME -p -h IP_HERE


##Doing More##

If you've reached this point then you have just mastered the basics of MySQL. Remember that MySQL is the world's most popular database system. For developers, this means that there is an endless amount of support available online. From tutorials to solutions to common problems, everything is just a web search away :)
