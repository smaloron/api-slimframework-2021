#!/usr/bin/env bash

PASSWORD='123'
PHPVERSION='8.0'

# Dépôts pour PHP 8
sudo apt install software-properties-common
sudo add-apt-repository ppa:ondrej/php

# Mise à jour des logiciels disponibles
sudo apt update
sudo apt-get -y upgrade

# Installation du serveur web Apache
sudo apt-get install -y apache2

# Installation de PHP
sudo apt-get install -y php$PHPVERSION
# Installation du pont entre Apache et PHP
sudo apt-get install -y libapache2-mod-php$PHPVERSION

# mysql
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password password $PASSWORD"
sudo debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $PASSWORD"
sudo apt-get install -y mysql-server
sudo apt-get install php$PHPVERSION-mysql

# phpmyadmin
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $PASSWORD"
sudo debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2"
sudo apt-get install -y phpmyadmin

# Copie de la configuration de l'hôte virtuel vers le dossier de configuration d'Apache
# sudo cp -f -R /vagrant-conf/apache2 /etc/apache2

service apache2 restart

