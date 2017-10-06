<?php

use Drupal\Component\Transliteration\PhpTransliteration;
$langcode = '';
$trans = new PhpTransliteration();
$name = $trans->transliterate($name, $langcode);
