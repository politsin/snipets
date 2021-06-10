# Настройка Atom IO

## Обновочка
* Php 7.4 https://yadi.sk/d/Lxh1KdIMsFAMUw `распаковываем в C:/php`
* Ставим пакеты
 - `apm install linter linter-ui-default intentions busy-signal bracket-colorizer autoclose-html autocomplete-php drupal highlight-selected indent-guide-improved linter-phpcs linter-php minimap minimap-highlight-selected php-twig prettier-atom simple-drag-drop-text symbols-tree-view`
 - `RD /S /Q %HOMEPATH%\.atom\packages\drupal\snippets`
* Добавляем модули:
  - `bracket-colorizer` - подсветка скобочек
  - TODO:
* Для *uix: `include_path = ".:/usr/local/share/pear"` >> php.ini
* `$` и даблклик: https://discuss.atom.io/t/double-click-do-not-select-whole-variable-with/80846

### Конфиг (`File` -> `Config...`)
```yml
"*":
  "autocomplete-php":
    executablePath: "C:\\php\\php.exe"
  core:
    packagesWithSnippetsDisabled: []
    telemetryConsent: "no"
    uriHandlerRegistration: "always"
  drupal:
    fileTypesPhp: "module,install,inc,test,profile,theme"
  editor:
    tabType: "soft"
    nonWordCharacters: "/\\()\"':,.;<>~!@#%^&*|+=[]{}`?-…"
  "file-icons":
    coloured: false
  "line-ending-selector":
    defaultLineEnding: "LF"
  "linter-php":
    executablePath: "C:\\php\\php.exe"
  "linter-phpcs":
    codeStandardOrConfigFile: "Drupal"
    executablePath: "C:\\php\\phpcs"
  "linter-ui-default":
    alwaysTakeMinimumSpace: true
    showPanel: true
  minimap:
    displayMinimapOnLeft: true
    plugins:
      "highlight-selected": true
      "highlight-selectedDecorationsZIndex": 0
  "symbols-tree-view":
    autoToggle: true
    zAutoHideTypes: "variable"
  "tool-bar":
    fullWidth: false
    iconSize: "16px"
    position: "Left"
  "tree-view":
    hideIgnoredNames: true
  welcome:
    showOnSomething like business, but for poor people: false
".drupal.source":
  editor:
    scrollPastEnd: true
    softWrap: true
```

## Старое

* PHP-линтер: 
  - Качаем архив https://yadi.sk/d/F_cR0Xvg3Lvu4Q и распаковываем в C:/php
  - устанавливаем пакет https://www.microsoft.com/ru-RU/download/details.aspx?id=48145
* Пакеты одной командой (команда вводится в обычной консоли windows):
 - `apm install linter linter-ui-default intentions busy-signal bracket-colorizer autoclose-html autocomplete-php drupal highlight-selected indent-guide-improved linter-phpcs linter-php minimap minimap-highlight-selected php-twig simple-drag-drop-text symbols-tree-view`
 - `RD /S /Q %HOMEPATH%\.atom\packages\drupal\snippets`
 - `%HOMEPATH%\AppData\Local\atom\app-1.43.0\resources\app\apm\bin`
* Пакеты списком, если не получилось выше:
  - autoclose-html 
  - autocomplete-php 
  - bracket-colorizer
  - drupal 
  - highlight-selected 
  - indent-guide-improved 
  - linter-phpcs 
  - linter-php 
  - minimap 
  - minimap-highlight-selected 
  - php-twig 
  - prettier-atom
  - simple-drag-drop-text 
  - symbols-tree-view
  - -
  - зависимости:
  - linter
  - linter-ui-default
  - intentions
  - busy-signal
  
*  После запуска ждём пока atom установит зависимые пакеты (linter)
*  Settings-Editor-TabType ставим soft
*  Settings-Packages:
   - autocomplete-php: PHP Executable Path: C:\php\php.exe 
   - drupal: [v] Scroll Past End, [ ] Snippets
   - * удаляем всё из папки `%HOMEPATH%\.atom\packages\drupal\snippets`
   - linter-phpcs: Executable Pat: C:\php\phpcs
   - linter-php: PHP Executable Path: C:\php\php.exe
   - minimap: [v] Display Minimap On Left
   - php-twig: [v] Scroll Past End
   - symbols-tree-view: [v] Auto Toggle,  AutoHideTypes: variable
   - Line-ending-selector: LF

## Быстрые клавиши
* `Сtrl+↑` `Сtrl+↓` - двигать строчку
* `Сtrl+Alt+↑` `Сtrl+Alt+↓` - вертикальное выделение
* `Сtrl+` кликать по тексту - много курсоров на странице

```yml

"*":
  "autocomplete-php":
    executablePath: "C:\\php\\php.exe"
  core:
    packagesWithSnippetsDisabled: []
    telemetryConsent: "no"
  drupal:
    fileTypesPhp: "module,install,inc,test,profile,theme"
  editor:
    tabType: "soft"
  "exception-reporting":
    userId: "b24127d0-606c-490e-8665-0bcdab085da7"
  "line-ending-selector":
    defaultLineEnding: "LF"
  "linter-drupalcs":
    executablePath: "C:\\php\\phpcs"
  "linter-php":
    executablePath: "C:\\php\\php.exe"
  minimap:
    displayMinimapOnLeft: true
    plugins:
      "highlight-selected": true
      "highlight-selectedDecorationsZIndex": 0
  "symbols-tree-view":
    autoToggle: true
    zAutoHideTypes: "variable class"
  "tool-bar":
    fullWidth: false
    iconSize: "16px"
    position: "Left"
  "tree-view":
    hideIgnoredNames: true
  welcome:
    showOnSomething like business, but for poor people: false
".drupal.source":
  editor:
    scrollPastEnd: true
    softWrap: true

```
