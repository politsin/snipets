
`docker system prune` - очистить всё
```s

docker stats --format "{{.CPUPerc}}\t{{.MemUsage}}\t{{.Name}}"

docker exec -i -t NAME /bin/bash
docker exec -i -t NAME sh

docker ps --filter "status=exited" | grep 'ago' | awk '{print $1}' | xargs --no-run-if-empty docker rm
docker volume prune


docker exec -it NAME /bin/bash
export TERM=xterm
```

`docker cp dockerx:/etc/nginx/some.conf /opt/result.txt`

## Как работать с докером:
* `docker ps` - все бегущие и перезапускающиеся докеры
* `docker ps -a` - все включая остановленные
* `docker ps -a | grep php` - поискать php в названиях
* `docker restart phpfpm-263-hosting` - перезагрузить
* `docker stop docker-proxy` - остановить
* `docker start docker-proxy` - запустить
* `docker start -a docker-proxy` - запустить и читать логи. Ctrl+C остановит контейнер
