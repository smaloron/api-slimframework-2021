# Copie des fichiers de configuration
sudo cp -f /vagrant-conf/000-default.conf /etc/apache2/sites-available
sudo cp -f /vagrant-conf/20-xdebug.ini /etc/php/$PHPVERSION/mods-available

# lancement d'Apache
sudo service apache2 restart