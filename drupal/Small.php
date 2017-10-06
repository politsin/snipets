<?php

/**
 * YML, SOAP, Unicode.
 */
use Drupal\Component\Utility\Unicode;
use Drupal\Component\Serialization\Json;
use Symfony\Component\Yaml\Yaml;

$json   = Unicode::substr($result, $start - 2);
$data   = Json::decode($json);
if ($debug) {
  $message = json_encode($params, JSON_UNESCAPED_UNICODE);
}
$yaml = Yaml::dump($array);
$array = Yaml::parce($yaml);

/**
 * Markup.
 */
use Drupal\Core\Render\Markup;
drupal_set_message(Markup::create($message), 'warning');

/**
 * SOAP.
 */
$options = [
  'login'    => '***',
  'password' => '***',
];

$url = 'https://*****/ExchangeWebSite.1cws?wsdl';
$client = new \SoapClient($url, $options);

try {
  $res = $client->$method($params);
}
catch (\Exception $e) {
  drupal_set_message('Извините, наш сервис недоступен.', 'error');
  drupal_set_message("Отладочная информация SOAP:$method " . $e->faultstring, 'error');
}

/**
 * PhpTransliteration.
 */
use Drupal\Component\Transliteration\PhpTransliteration;
$langcode = '';
$trans = new PhpTransliteration();
$name = $trans->transliterate($name, $langcode);
