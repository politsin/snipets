```sh
docker run -d --name vpn --privileged -p 1194:1194/udp -p 443:443/tcp umputun/dockvpn
docker run -t -i --name vpn-keys  --rm -p 8080:8080 --volumes-from vpn umputun/dockvpn serveconfig
docker run -d --name vpn --privileged -p 1194:1194/udp -p 443:443/tcp -v /opt/vpn:/etc/openvpn umputun/dockvpn
```
