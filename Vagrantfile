Vagrant.configure("2") do |config|

  config.vm.box = "ubuntu/trusty64"
  config.vm.hostname = "ubuntu-makagon77"

  config.vm.network "private_network", ip: "192.168.255.77"

  config.ssh.forward_agent = true

  config.vm.synced_folder "./zadanietest", "/var/www/html", :nfs => true

  config.vm.provider :virtualbox do |vb|
    vb.name = "Zadanie test"
    vb.customize [
      "modifyvm", :id,
      "--memory", 1024,
      "--cpus", 2
    ]
  end

  config.vm.provision :shell, path: "bootstrap.sh"

end
