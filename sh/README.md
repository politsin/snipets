# SH
Список установленных пакетов
* `dpkg -l`
* `dpkg -l | grep ii`

# Rm `exim`
* `apt-get remove exim4-base exim4-config vim vim-common vim-tiny`
* `apt autoremove`

# Rm `files`
* for f in /var/www/html/assets/wget/big/dir/*; do rm "$f"; done
