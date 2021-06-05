# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/focal64"

  config.vm.network "forwarded_port", guest: 80, host: 8080

  config.vm.network "forwarded_port", guest: 3306, host: 3309

  config.vm.network "private_network", ip: "192.168.50.4"

  config.vm.synced_folder "./app", "/app"

  config.vm.synced_folder "./config", "/vagrant-conf"

  config.vm.provision "shell", path: "provision.sh"
end
