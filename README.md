# var-www-html

sudo apt-get install lighttpd

sudo groupadd www-data

sudo usermod -G www-data -a pi

sudo chown -R www-data:www-data /var/www/html

sudo chmod -R 775 /var/www/html

sudo apt-get install php7.0-common php7.0-cgi php

sudo lighty-enable-mod fastcgi

sudo lighty-enable-mod fastcgi-php

sudo service lighttpd force-reload
