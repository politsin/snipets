# Xdebug

## Refs
* https://www.drupal.org/docs/develop/development-tools/xdebug-debugger

## Install
* `apt install php-xdebug`
* `php.ini` - enable
* `FFox` - https://addons.mozilla.org/ru/firefox/addon/xdebug-helper-for-firefox/
  - PHPSTORM [Save]
  - Кнопочка включения в строке поиска
  - Приложение добавляет куку: `XDEBUG_SESSION:"PHPSTORM"`

`/etc/php/7.4/mods-available/xdebug.ini`
```ini
[xdebug]
zend_extension=xdebug.so
xdebug.remote_enable=true
xdebug.remote_host=127.0.0.1
xdebug.remote_port=9000
xdebug.remote_handler=dbgp
xdebug.extended_info = 1
xdebug.idekey = "PHPSTORM"
#xdebug.profiler_enable=1
#xdebug.profiler_output_dir=/tmp
#xdebug.mode = off
#xdebug.default_enable = off
```

`.vscode/launch.json`
```js
{
  "version": "0.2.0",
  "configurations": [
    {
      "name": "Listen for XDebug",
      "type": "php",
      "request": "launch",
      "port": 9000,
      "pathMappings": {
        "/var/www/html": "${workspaceFolder}"
      },
      "xdebugSettings": {
        "show_hidden": 1
      }
    }
  ]
}
```
