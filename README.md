# test-peaks
teste technique

l'application consiste à récupérer des personnages à partir de l'API MARVEL, 

j'ai utilisé le framework slim pour faire cette mission, et les vues (templates) avec twig,

j'ai utilisé un serveur web (nginx), pour l'implémenter j'ai utilisé Docker,

pour lancer l'application, il faut lancer la commande docker-compose up depuis la racine, il faut avoir docker installé 

Installation 

To run the app, you need to have docker, docker-compose and dnsmasq installed.
Docker engine

    Remove docker older version sudo apt-get remove docker docker-engine docker.io
    As always, apt update before anything ... sudo apt-get update -y
    allow Docker to use the aufs storage drivers. sudo apt-get install -y linux-image-extra-$(uname -r) linux-image-extra-virtual
    Install packages to allow apt to use a repository over HTTPS sudo apt-get install -y apt-transport-https ca-certificates curl software-properties-common
    Add GPG key curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo apt-key add -
    Add repository sudo add-apt-repository "deb [arch=amd64] https://download.docker.com/linux/ubuntu $(lsb_release -cs) stable"
    update apt list sudo apt-get update -y
    install docker latest version sudo apt-get install -y docker-ce

source : https://docs.docker.com/engine/installation/linux/docker-ce/ubuntu/#uninstall-old-versions
Docker compose

    download docker compose in /usr/local/bin/docker-compose

  sudo curl -L https://github.com/docker/compose/releases/download/1.17.1/docker-compose-`uname -s`-`uname -m` -o /usr/local/bin/docker-compose

    make docker-compose executable sudo chmod +x /usr/local/bin/docker-compose
    Installing command completion sudo curl -L https://raw.githubusercontent.com/docker/compose/1.17.0/contrib/completion/bash/docker-compose -o /etc/bash_completion.d/docker-compose
    Optional, add current user to docker group sudo usermod -a -G docker $USER

source : https://docs.docker.com/compose/install/
dnsmasq

In order to redirect .dev tld to localhost, you need dnsmasq. To install it, do the following on ubuntu :

    edit /etc/NetworkManager/NetworkManager.conf and replace dns=dnsmasq by #dns=dnsmasq
    run sudo apt-get install dnsmasq
    edit /etc/dnsmasq.conf and add those lines to the file :

  listen-address=127.0.0.1
  bind-interfaces
  address=/dev/127.0.0.1

    run sudo netstat -plant | grep :53 and look for NUMBER/dnsmasq
    run sudo kill -9 NUMBER replace NUMBER by the number(s) you have seen in previous step.
    run sudo systemctl restart dnsmasq.service, this will restart the dnsmasq service.
    edit /etc/dhcp/dhclient.conf and uncomment (remove the #) on this line : prepend domain-name-servers 127.0.0.1;
    run sudo systemctl restart NetworkManager.service to restart the network manager, you will temporarily lost your network connection.

source : https://www.leaseweb.com/labs/2013/08/wildcard-dns-ubuntu-hosts-file-using-dnsmasq/


