# Copie des fichiers de configuration

sudo rm -R -f /etc/apache2
sudo rm -R -f /etc/php
sudo rm -R -f /etc/mysql

sudo cp -f -R /vagrant-conf/apache2 /etc/
sudo cp -f -R /vagrant-conf/php /etc/
sudo cp -f -R /vagrant-conf/mysql /etc/

sudo service apache2 restart
sudo service mysql restart

echo "mise à jour effectuée"