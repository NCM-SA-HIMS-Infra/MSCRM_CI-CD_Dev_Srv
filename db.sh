#!/bin/bash

#Create database and user section

mysql -u root -pfkPLpF!%XS

create database yutani_mscrm20k01;

create user mscrm_user identified by 'Jz*P?,f{5Hbq';

GRANT ALL PRIVILEGES ON * . * TO mscrm_user;

flush privileges;

#Import database section

mysql -u root -pfkPLpF!%XS yutani_mscrm20k01 < /var/www/html/MSCRM_DB_Bk_After.sql;

echo "You run script file";

exit 0



