import csv
import sys
import re

#The database must be created with this: CREATE DATABASE hotels CHARACTER SET utf8 COLLATE utf8_general_ci;
#You must remove emojis from the result!
#tr -dc '[:print:]\n' < f.sql > f2.sql

reader = csv.reader(open(sys.argv[1], "r"))
line = 0
str = "create table hotels("
for row in reader:
    line = line + 1
    if line > 1:
        break
    #this is the first row
    colno = 0
    for col in row:
        colno += 1
        if "_id" in col:
            if colno == 1:
                str = str + col + " integer primary key,"
            else:
                str = str + col + " integer,"
        else:
            if "overview" in col:
                str = str + col + " varchar(3000),"
            else:
                if "addressline1" in col or "addressline2" in col:
                    str = str + col + " varchar(1000),"
                else:
                    str = str + col + " varchar(200),"
    str2 = str[:-1]+') ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_unicode_ci;'
    print str2


for row in reader:
    str = "insert into hotels values("
    line = line + 1
    if line == 1:
        continue
    for col in row:
        if col == "":
           str = str + "NULL,"
        else:
           str = str + "\"" + col + "\","
    str2 = str[:-1]+');'
    print str2
#    if line > 100000:
#        break
