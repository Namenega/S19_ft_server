# **************************************************************************** #
#                                                                              #
#                                                         :::      ::::::::    #
#    Dockerfile                                         :+:      :+:    :+:    #
#                                                     +:+ +:+         +:+      #
#    By: Nathan <Nathan@student.42.fr>              +#+  +:+       +#+         #
#                                                 +#+#+#+#+#+   +#+            #
#    Created: 2020/11/16 15:39:58 by Nathan            #+#    #+#              #
#    Updated: 2020/11/25 17:15:51 by Nathan           ###   ########.fr        #
#                                                                              #
# **************************************************************************** #

FROM debian:buster

LABEL namenega <namenega@student.s19.be>

RUN apt-get update -y \
	&& apt-get clean -y

#### install nginx ####

RUN apt-get install nginx -y
RUN apt-get install openssl -y

#### install MySQL ####

RUN apt-get install mariadb-server mariadb-client -y

#### install PHP ####

RUN apt-get install php -y \
	&& apt-get install php-mysql -y \
	&& apt-get install php7.3 php7.3-fpm php7.3-mysql php-mbstring -y

#### install phpmyadmin ####

ADD https://files.phpmyadmin.net/phpMyAdmin/5.0.1/phpMyAdmin-5.0.1-all-languages.tar.gz ./
RUN tar -zxzf phpMyAdmin-5.0.1-all-languages.tar.gz \
	&& mv phpMyAdmin-5.0.1-all-languages /var/www/html/phpMyAdmin \
	&& rm phpMyAdmin-5.0.1-all-languages.tar.gz \
	&& mkdir /var/www/html/phpMyAdmin/tmp \
	&& chmod 777 /var/www/html/phpMyAdmin/tmp/

#### install SSL ####

ADD https://github.com/FiloSottile/mkcert/releases/download/v1.4.2/mkcert-v1.4.2-linux-amd64 ./
RUN mv mkcert-v1.4.2-linux-amd64 mkcert \
	&& chmod +x /mkcert && /mkcert -install && /mkcert localhost.com

#### install Wordpress ####

ADD https://wordpress.org/latest.tar.gz /tmp
RUN cd /tmp \
	&& tar xzvf latest.tar.gz \
	&& cp /tmp/wordpress/wp-config-sample.php /tmp/wordpress/wp-config.php \
	&& mkdir /var/www/html/wordpress \
	&& cp -a /tmp/wordpress/. /var/www/html/wordpress \
	&& chown -R www-data:www-data /var/www/html/wordpress \
	&& rm latest.tar.gz
ADD srcs/wp-config.php /var/www/html/wordpress

#### Utils ####

# Config nginx
ADD /srcs/nginx.conf /etc/nginx/sites-available/
ADD /srcs/nginx.conf /etc/nginx/sites-enabled/

# Config index
RUN rm var/www/html/index.html \
	&& rm var/www/html/index.nginx-debian.html
ADD /srcs/index.html /var/www/html/

# Config mariadb
ADD /srcs/script.sh ./
ADD ./srcs/config.inc.php ./tmp/config.inc.php

#### Start service ####

RUN service nginx start \
	&& service php7.3-fpm start \
	&& service mysql start

#### Expose ####

EXPOSE 80 443

CMD /bin/bash ./script.sh && sleep infinity & wait