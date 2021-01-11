# Xdebug

## Refs
* VS Code plugin / https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug
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
xdebug.mode=off
#xdebug.mode = debug
xdebug.client_host=127.0.0.1
xdebug.remote_enable=true
xdebug.idekey = "PHPSTORM"
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
