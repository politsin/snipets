# Visual Studio Code for Drupal

## Refs:
* https://www.drupal.org/docs/develop/development-tools/configuring-visual-studio-code
* ToDo[src]: https://github.com/tsega/drupal-8-twig-snippets-vs-code

## Всякое
* Форматирование `Alt`+`Shift`+`F`
* Форматировать выделенный фрагмент `Ctrl`+`F`
* Prettier: `Ctrl`+`Shift`+`P` -> Format Document [`Alt+Shift+F`]
  - JavaScript / TypeScript / JSX / JSON / Vue / Angular
  - CSS / SCSS / Less
  - HTML / YAML / Markdown / GraphQL
* PHP Intelephense:
  - `Ctrl`+`Shift`+`P`: `@` внутри файла, `#` по рабочей области

## Deco / Util
* [Russian Language](https://marketplace.visualstudio.com/items?itemName=MS-CEINTL.vscode-language-pack-ru) [590k]
* Atom [Keymap](https://marketplace.visualstudio.com/items?itemName=ms-vscode.atom-keybindings) `vscode:extension/ms-vscode.atom-keybindings`
* Atom Theme [One Dark Pro](https://marketplace.visualstudio.com/items?itemName=zhuangtongfa.Material-theme) `zhuangtongfa.Material-theme`
* [vscode-icons](https://marketplace.visualstudio.com/items?itemName=vscode-icons-team.vscode-icons) `vscode-icons-team.vscode-icons`
* [select highlight in minimap](https://marketplace.visualstudio.com/items?itemName=mde.select-highlight-minimap) `mde.select-highlight-minimap`
* [Highlight Matching Tag](https://marketplace.visualstudio.com/items?itemName=vincaslt.highlight-matching-tag) `vincaslt.highlight-matching-tag`
* [Bracket Pair Colorizer 2](https://marketplace.visualstudio.com/items?itemName=CoenraadS.bracket-pair-colorizer-2) `vscode:extension/CoenraadS.bracket-pair-colorizer-2`
* [GitLens — Git supercharged](https://marketplace.visualstudio.com/items?itemName=eamodio.gitlens) [7.1M]
* [?] [Composer](https://marketplace.visualstudio.com/items?itemName=ikappas.composer) [124k]

## Local
* [Auto Close Tag](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-close-tag) `vscode:extension/formulahendry.auto-close-tag`
* [Auto Rename Tag](https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-rename-tag) `vscode:extension/formulahendry.auto-rename-tag`
* [Remote - SSH](https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-ssh) `ms-vscode-remote.remote-ssh`
* [Terminal](https://marketplace.visualstudio.com/items?itemName=formulahendry.terminal) `formulahendry.terminal`

## PHP
* PHP [Intelephense](https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client) [3.5M] `bmewburn.vscode-intelephense-client`
* PHP [cs](https://marketplace.visualstudio.com/items?itemName=ikappas.phpcs) [900k] `ikappas.phpcs`
* PHP [cbf](https://marketplace.visualstudio.com/items?itemName=persoderlind.vscode-phpcbf) [900k] `persoderlind.vscode-phpcbf`
* PHP [DocBlocker](https://marketplace.visualstudio.com/items?itemName=neilbrayfield.php-docblocker) [447k]
* PHP [Namespace Resolver](https://marketplace.visualstudio.com/items?itemName=MehediDracula.php-namespace-resolver) [317k]
* Drupal [Syntax Highlighting](https://marketplace.visualstudio.com/items?itemName=marcostazi.VS-code-drupal) [57k]
* Twig [Language](https://marketplace.visualstudio.com/items?itemName=mblode.twig-language) [68k] `Twig Language`
* [YAML](https://marketplace.visualstudio.com/items?itemName=redhat.vscode-yaml) [4.7M]
* [EditorConfig](https://marketplace.visualstudio.com/items?itemName=EditorConfig.EditorConfig) `EditorConfig.EditorConfig`
* [ ] PHP [Debug  (XDebug)](https://marketplace.visualstudio.com/items?itemName=felixfbecker.php-debug) [3.8M]

## JS / Frontend
* [Sass](https://marketplace.visualstudio.com/items?itemName=Syler.sass-indented) [500k]
* [Prettier - Code formatter](https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode) [9.4M]
* [ESLint](https://marketplace.visualstudio.com/items?itemName=dbaeumer.vscode-eslint) [11M]
* [TSLint](https://marketplace.visualstudio.com/items?itemName=ms-vscode.vscode-typescript-tslint-plugin) [2.4M]
* [Class Helper](https://marketplace.visualstudio.com/items?itemName=predrag-nikolic.php-class-helper) [24k]
* [Import Cost](https://marketplace.visualstudio.com/items?itemName=wix.vscode-import-cost) [840k]
* [?] [ES7 React/Redux/GraphQL/React-Native snippets](https://marketplace.visualstudio.com/items?itemName=dsznajder.es7-react-js-snippets) [2M]
* [?] [CSS Peek](https://marketplace.visualstudio.com/items?itemName=pranaygp.vscode-css-peek) [1.3M]
* [?] [JavaScript (ES6) code snippets](https://marketplace.visualstudio.com/items?itemName=xabikos.JavaScriptSnippets) [4.4M]

## Local
```json
{
  "workbench.colorTheme": "One Dark Pro",
  "atomKeymap.promptV3Features": true,
  "editor.tabSize": 2,
  "editor.multiCursorModifier": "ctrlCmd",
  "editor.formatOnPaste": true,
  "editor.minimap.showSlider": "always",
  "editor.minimap.side": "left",
  "editor.minimap.renderCharacters": false,
  "editor.minimap.maxColumn": 80,
  "editor.renderWhitespace": "none",
  "editor.formatOnSave": true,
  "diffEditor.ignoreTrimWhitespace": false,
  "problems.autoReveal": false,
  "git.enableSmartCommit": true,
  "git.confirmSync": false,
  "git.autorefresh": false,
  "gitlens.advanced.messages": {
    "suppressLineUncommittedWarning": true
  },
  "explorer.confirmDelete": false,
  "explorer.confirmDragAndDrop": false,
  "update.showReleaseNotes": false,
  "files.associations": {
    "*.module": "php",
    "*.theme": "php",
    "*.inc": "php"
  },
  "files.insertFinalNewline": true,
  "php.validate.run": "onType",
  "php.validate.executablePath": "C:\\php\\php.exe",
  "php.executablePath": "C:\\php\\php.exe",
  "phpcs.standard": "Drupal",
  "phpcs.executablePath": "C:\\php\\php.exe",
  "phpcs.showSources": true,
  "php.suggest.basic": false,
  "[php]": {
    "editor.defaultFormatter": "persoderlind.vscode-phpcbf"
  },
  "phpcbf.onsave": true,
  "phpcbf.standard": "Drupal",
  "intelephense.environment.documentRoot": "/var/www/html",
  "namespaceResolver.highlightOnSave": true,
  "twig-language-2.indentStyle": "space",
  "remote.SSH.remotePlatform": {
    "138.201.195.25": "linux"
  },
  "terminal.integrated.rendererType": "dom",
  "terminal.integrated.shell.windows": "C:\\WINDOWS\\SysWOW64\\WindowsPowerShell\\v1.0\\powershell.exe",
  "terminal.explorerKind": "external",
  "terminal.external.windowsExec": "C:\\Windows\\SysWOW64\\WindowsPowerShell\\v1.0\\powershell.exe",
  "terminal.integrated.copyOnSelection": true,
  "terminal.integrated.cursorStyle": "line",
  "terminal.enableAppInsights": false,
  "window.zoomLevel": 0,
  "extensions.ignoreRecommendations": false,
  "javascript.updateImportsOnFileMove.enabled": "always",
  "javascript.implicitProjectConfig.checkJs": true,
  "javascript.referencesCodeLens.enabled": true,
  "javascript.suggest.completeFunctionCalls": true,
  "typescript.referencesCodeLens.showOnAllFunctions": true,
  "typescript.suggest.completeFunctionCalls": true,
  "typescript.updateImportsOnFileMove.enabled": "always",
  "liveServer.settings.donotShowInfoMsg": true,
    "[json]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[yaml]": {
        "editor.defaultFormatter": "redhat.vscode-yaml"
    },
    "[javascriptreact]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    },
    "[typescriptreact]": {
        "editor.defaultFormatter": "esbenp.prettier-vscode"
    }
}
```
## Remote
```js
{
  /* PHP */
  "phpcs.enable": true,
  // "phpcs.standard": "Drupal,DrupalPractice",
  "phpcs.standard": "Drupal",
  "phpcs.executablePath": "/usr/bin/phpcs",
  "php.suggest.basic": false,
  "php.validate.enable": false,
  "namespaceResolver.highlightOnOpen": true,
  "intelephense.environment.documentRoot": "/var/www/html",
  "intelephense.telemetry.enabled": false,
  "intelephense.format.enable": true,
  "intelephense.trace.server": "messages",
  /* Editor */
  "editor.autoIndent": "full",
  "editor.formatOnPaste": true,
  "editor.formatOnSave": true,
  "editor.tabSize": 2,
  "editor.renderWhitespace": "boundary",
  "files.eol": "\n",
  "files.insertFinalNewline": true,
  "files.simpleDialog.enable": true,
  "files.trimFinalNewlines": true,
  "files.trimTrailingWhitespace": true,
  "files.associations": {
    "*.module": "php",
    "*.theme": "php"
  },
  "workbench.list.smoothScrolling": true,
  "telemetry.enableCrashReporter": false,
  "telemetry.enableTelemetry": false,
  "intelephense.format.braces": "k&r",
  "twig-language-2.indentStyle": "space",
  "composer.executablePath": "/usr/bin/composer"
}
```
