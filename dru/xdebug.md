# Xdebug

## Install
* `apt install php-xdebug`
* `php.ini` - enable
* `FFox` - https://addons.mozilla.org/ru/firefox/addon/xdebug-helper-for-firefox/
  - PHPSTORM [Save]
  - Кнопочка включения рядом с браузером

```ini
[xdebug]
zend_extension=/usr/lib/php/20200930/xdebug.so
xdebug.remote_enable=true
xdebug.remote_host=127.0.0.1
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.profiler_enable=1
xdebug.extended_info = 1
xdebug.profiler_output_dir=/tmp
xdebug.idekey = "PHPSTORM"
```
