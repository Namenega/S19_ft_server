service mysql restart
mysql -u root -e "CREATE DATABASE wordpress;"
mysql -u root -e "CREATE USER 'namenega'@'localhost';"
mysql -u root -e "GRANT ALL PRIVILEGES ON *.* TO 'namenega'@'localhost' IDENTIFIED BY 'mymdp' WITH GRANT OPTION;"
mysql -u root -e "update mysql.user set plugin='mysql_native_password' where user='namenega';"
mysql -u root -e "FLUSH PRIVILEGES;"

service nginx start && service php7.3-fpm start && service mysql restart