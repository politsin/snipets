# Composer
  * `cd /var/www/html && composer update -W && drush updatedb --yes`  
  * `cd /var/www/html && composer update -W --ignore-platform-reqs && drush updatedb --yes`
  * `composer require 'drupal/devel_entity_updates:^3.0'` && `drush entity-updates `
  * composer update --with-dependencies
  * drush updatedb

# Drush
  * drush entity-updates

## services
```php
<?php
\Drupal::messenger()->addError("Hello world");
\Drupal::messenger()->addStatus("Hello world");
\Drupal::messenger()->addWarning("Hello world");

// Watchdog
\Drupal::logger(__CLASS__)->notice($message);
\Drupal::logger(__CLASS__)->error($message);

// Storage.
/** @var \Drupal\taxonomy\TaxonomyStorageInterface $storage */
$storage = \Drupal::entityTypeManager()->getStorage('taxonomy_term');
/** @var \Drupal\taxonomy\TermInterface $term */
$term = $storage->load($tid);
/** @var \Drupal\node\NodeStorageInterface $storage */
$storage = \Drupal::entityTypeManager()->getStorage('node');
/** @var \Drupal\node\NodeInterface $node */
$node = $storage->load($nid);

// Date Formater.
\Drupal::service('date.formatter')->format($timestamp, $type, $format, $timezone, $langcode);

\Drupal::logger('example')->notice('@hello: deleted %world.',[
  '@hello' => $this->entity->bundle(),
  '%world' => $this->entity->label(),
]);

grep:
REQUEST_TIME
drupal_mes
entityM
entity.m
entity_m
format_date
db_query

    $query = \Drupal::database()->select('node__field_of_activity', 'nfoa');
    $query->fields('nfoa', [
      'entity_id',
      'field_of_activity_target_id',
    ]);
    $query->condition('bundle', 'partner');
    if (!empty($nids)) {
      $query->condition('entity_id', $nids, 'IN');
    }
    $res = $query->execute()->fetchAll();

```

# Git
  * git config --global user.name "Anatoly Politsin"
  * git config --global user.email politsin@gmail.com
  * git config --global push.default simple
  * `git commit --amend --author="Anatoly Politsin <politsin@gmail.com>" && git push origin master --force`
```
[user]
	email = politsin@gmail.com
	name = Anatoly Politsin
```

# Cab Snip
  * Modules
    - r4032login
    - email_registration
    - ultimate_cron
    - node_view_permissions
    - blank_node_title
    - mailsystem
    - s3fs
  * Drush
    - `drush generate module`
    - `drush generate content-entity`
    - `drush generate controller`, `drush generate permissions`, `drush generate form-config`

# Поискать файлы
```sh
grep -Hr pure-ftpd /etc/
grep ': ru' -P -R -I -l | xargs sed -i 's/: ru/: en/g'
grep 'project' -P -R -I -l | xargs sed -i 's/project/work/g'
grep 'Project' -P -R -I -l | xargs sed -i 's/Project/Work/g'
`find . -type f -mtime -4`  - позволит найти последни`\е изменённые файлы за последние 4 дня в текущей папке.
`find ./ -type f -name "*.*" -exec chmod -x {} \;` всем chmod
```

# snipets
* wget https://www.drupal.org/files/issues/core-8.3.0-twig_debug_not_display-suggestions-array-2118743-107.patch
* /var/www/html/core$ patch -p1 < core-8.3.0-twig_debug_not_display-suggestions-array-2118743-107.patch
* /var/www/html$ patch -p1 < twig_debug_output_does-2118743-93.patch.txt
* http://www.anexusit.com/blog/how-to-apply-patches-drupal-8-composer

# VsCode Remote:
Local:
* https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-ssh
* https://marketplace.visualstudio.com/items?itemName=ms-vscode-remote.remote-ssh-edit
* https://marketplace.visualstudio.com/items?itemName=ms-vscode.remote-explorer
* https://marketplace.visualstudio.com/items?itemName=MS-CEINTL.vscode-language-pack-ru
* https://marketplace.visualstudio.com/items?itemName=ms-vscode.atom-keybindings
* https://marketplace.visualstudio.com/items?itemName=formulahendry.auto-close-tag
* https://marketplace.visualstudio.com/items?itemName=vscode-icons-team.vscode-icons
* https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode

Remote:
* https://marketplace.visualstudio.com/items?itemName=bmewburn.vscode-intelephense-client
* https://marketplace.visualstudio.com/items?itemName=wongjn.php-sniffer
* https://marketplace.visualstudio.com/items?itemName=esbenp.prettier-vscode
* https://marketplace.visualstudio.com/items?itemName=redhat.vscode-yaml

## Пользователь:
```json
{
  "atomKeymap.promptV3Features": true,
  "diffEditor.ignoreTrimWhitespace": false,
  "editor.tabSize": 2,
  "editor.multiCursorModifier": "ctrlCmd",
  "editor.formatOnPaste": true,
  "editor.minimap.showSlider": "always",
  "editor.minimap.side": "left",
  "editor.minimap.renderCharacters": false,
  "editor.minimap.maxColumn": 80,
  "editor.renderWhitespace": "none",
  "editor.wordSeparators": "`~!@#%^&*()-=+[{]}\\|;:'\",.<>/?",
  "editor.semanticTokenColorCustomizations": {},
  "editor.guides.bracketPairs": true,
  "files.insertFinalNewline": true,
  "files.trimTrailingWhitespace": true,
  "files.associations": {
    "*.module": "php",
    "*.theme": "php",
    "*.inc": "php"
  },
  "intelephense.environment.documentRoot": "/var/www/html",
  "terminal.integrated.enableMultiLinePasteWarning": false,
  "workbench.colorTheme": "One Dark Pro",
  "workbench.iconTheme": "vscode-icons",
  "[twig]": {
    "editor.formatOnPaste": false
  },
  "[yaml]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[html]": {
    "editor.defaultFormatter": "esbenp.prettier-vscode"
  },
  "[php]": {
    "editor.defaultFormatter": "wongjn.php-sniffer"
  },
  "php.validate.enable": false,
  "php.suggest.basic": false
}
```
## Remote:
```json
{
  "phpSniffer.autoDetect": true,
  "phpSniffer.run": "onType"
}


