# Ft_server

42network - s19 school - Brussels

creation of a webserver with Docker that runs services like phpMyAdmin, Wordpress, database with NGinx.

To start the project, run in the terminal :

>> docker build -t image_name .

then

>> docker run -p 80:80 -p 443:443 -ti image_name

go to your browser and search for :

https://localhost

it's done :)
