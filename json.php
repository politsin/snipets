<?php
// Разкодировать
$json = trim($json); // при декодирования json данных от криворуких разработчиков (напр 1С)
$raws  = \Drupal\Component\Serialization\Json::decode($json);
// Кодировать правильно
$response = new \Symfony\Component\HttpFoundation\JsonResponse($tree);
return $response;
// Кодировать в русские буковы:
$json = json_encode($tree, JSON_UNESCAPED_UNICODE);
$response = new \Symfony\Component\HttpFoundation\Response($json);
$response->headers->set('Content-Type', 'application/json');
return $response;
