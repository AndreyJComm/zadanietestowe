#!/usr/bin/env bash

# Install base part
apt-get -y update
apt-get -y install git cron nano curl htop apt-transport-https



# Install php 5
sudo add-apt-repository ppa:ondrej/php -y
apt-get -y update
apt-get -y upgrade
apt-get -y install php5 php5-gd php5-fpm php5-mysql libapache2-mod-php5 php5-mcrypt


# Install Apache2
apt-get -y install apache2

#Install mysql
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password 1111'
sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password 1111'
sudo apt-get -y install mysql-server

# Downloading and Installing Composer
curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer

# Restart Apache2
sudo echo "default_charset = \"UTF-8\"" >> /etc/php5/apache2/php.ini
sudo rm -f /var/www/html/index.html
sudo /etc/init.d/apache2 restart