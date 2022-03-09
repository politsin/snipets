```sh
tail -n 100000000000 nginx-access.log | awk '{print $1}'| sort| uniq -c| sort -nr| head -n 40
service fail2ban restart
echo "" > nginx-access.log

## test 
systemctl status fail2ban.service
fail2ban-client status nginx-limit-req
```

```
failregex = <HOST>.*
```

```
[nginx-limit-req]
enabled = true
filter = nginx-limit-req
action = iptables-multiport[name=ReqLimit, port="http,https", protocol=tcp]
logpath = /***/log/nginx-access.log
findtime = 36000
maxretry = 5
bantime = 3600
```

`fail2ban-client -vvv set nginx-limit-req banip `
