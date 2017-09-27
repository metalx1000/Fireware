#!/bin/bash

db="db.sqlite"
table="table1"

echo "Creating Database"
echo "Directory the Database is in must be writeable for web user."
chmod 777 .
sqlite3 $db "create table $table (id INTEGER PRIMARY KEY,pid TEXT,name TEXT,rank TEXT,station TEXT);"
chmod 777 "$db"
#sqlite3 $db "insert into $table (pid,f,l) values ('$(date +%s)','john','smith');"
#sqlite3 $db "select * from $table";
