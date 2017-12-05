# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"

    config.vm.box_url = "https://atlas.hashicorp.com/ubuntu/boxes/trusty64"

    config.vm.network :forwarded_port, guest: 80, host: 8080

    config.vm.network :private_network, :ip => "10.0.1.102"

    config.vm.provision :shell, :path => "install.sh"

    config.vm.hostname = "rts.local"

    config.vm.synced_folder ".", "/vagrant", :owner => 'www-data', :group => 'www-data', :mount_options => ["dmode=777", "fmode=777"]

    config.ssh.forward_agent = true

    config.vm.provider :virtualbox do |vb|
        vb.customize ["modifyvm", :id, "--memory", "2048"]
    end
end