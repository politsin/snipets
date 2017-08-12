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
 - Settings-Editor-TabType ставим soft
 - Packages-Drupal - добавляем к форматам theme, галочки Scroll Past End и Soft Wrap
 - Packages-SymbolsTreeView ставим в autohide 'class variable', галочка вкл - Auto Toggle ++ добавляем модуль symbols-tree-view-fix

## Php-для отладки быстро
 - качем архив https://yadi.sk/d/F_cR0Xvg3Lvu4Q и распаковываем в C:/php
 - устанавливаем переменные окружения:set Path=%path%;C:\php
 - устанавливаем пакет https://www.microsoft.com/ru-RU/download/details.aspx?id=48145 
 - Траблшутинг: в настройках linter-php и autocomplete-php путь C:\php\php.exe, linter-drupalcs - C:\php\phpcs
## Php-для отладки долго
 - Скачиваем PHP VC14 x64 Non Thread Safe ZIP http://windows.php.net/download#php-7.0 и кладём в папку C:/php
 - устанавливаем переменные окружения:set Path=%path%;C:\php
 - устанавливаем пакет https://www.microsoft.com/ru-RU/download/details.aspx?id=48145 
 - Проверяем что всё ок: cd C:/php/ && php.exe -v
 - качаем pear https://pear.php.net/go-pear.phar и кладём его в C:/php/go-pear.phar
 - выполняем в консоли C:/php/php.exe go-pear.phar (ok - 12 - C:\php\pear.ini - ok)
 - Качаем phpcs версии 2.x: pear install --alldeps PHP_CodeSniffer-2.9.1
 - Проверяем что всё ок: cd C:/php/ && phpcs --version
 - Качем модуль coder https://www.drupal.org/project/coder кладём Drupal и DrupalPractice в папку C:\php\pear\PHP\CodeSniffer\Standards
 - Проверяем что всё ок: cd C:/php/ && phpcs -i
