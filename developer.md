# Установка окружения для работы

## Браузеры
 - Хром https://www.google.ru/chrome/browser/desktop/index.html
 - Хром-канарейка https://www.google.ru/chrome/browser/canary.html
 - Яндекс браузер https://browser.yandex.ru/desktop/main/
 - Мозила для девелоперов https://www.mozilla.org/ru/firefox/developer/

## Программы
 - WinSCP https://winscp.net/eng/download.php (Installation package)
 - Putty https://www.chiark.greenend.org.uk/~sgtatham/putty/latest.html (putty-64bit-**-installer.msi)
 - Atom https://atom.io/ (download/windows_x64) 

## Настройка Atom
Команды в консоли:
 - apm install linter linter-ui-default busy-signal intentions atom-beautify autoclose-html autocomplete-php drupal highlight-selected indent-guide-improved linter-drupalcs linter-php minimap minimap-highlight-selected php-twig simple-drag-drop-text symbols-tree-view
 - RD /S /Q %HOMEPATH%\.atom\packages\drupal\snippets 

## Php-для отладки быстро
 - качем и кладём в C:/php
 - устанавливаем пакет https://www.microsoft.com/ru-RU/download/details.aspx?id=48145 
 - устанавливаем переменные окружения
## Php-для отладки долго
 - Скачиваем PHP VC14 x64 Non Thread Safe ZIP http://windows.php.net/download#php-7.0 и кладём в папку C:/php
 - устанавливаем пакет https://www.microsoft.com/ru-RU/download/details.aspx?id=48145 
 - качаем pear https://pear.php.net/go-pear.phar и кладём его в C:/php/go-pear.phar
 - выполняем в консоли C:/php/php.exe go-pear.phar
 