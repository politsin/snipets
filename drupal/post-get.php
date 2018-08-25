<?php

namespace Drupal\app\Controller;

/**
 * @file
 * Contains \Drupal\app\Controller\PostToMq.
 */

use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Serialization\Json;
use Symfony\Component\Yaml\Yaml;

/**
 * Controller PostToMq.
 */
class PostToMq extends ControllerBase {

  /**
   * Init.
   */
  public static function init($message = "") {
    $output = "PostToMq::init()\n";
    $rand = rand(0, 999);
    $data = [
      'message' => $message,
      'random' => $rand,
    ];

    $output .= "Random: {$rand}\n";
    // Post.
    $output .= self::postExample($data);
    // MQ.
    $output .= self::mqExample($data);

    return $output;
  }

  /**
   * Post.
   */
  public static function postExample($data) {
    $client = \Drupal::httpClient();
    $destination = 'https://example.com/app/hello';
    $post = [
      'form_params' => $data,
    ];
    $json = $client->post($destination, $post)->getBody();
    $array = Json::decode($json);
    return "\n" . __CLASS__ . __METHOD__ . "\n" . Yaml::dump($array) . "\n";
  }

  /**
   * MQ.
   */
  public static function mqExample($data) {
    $output = "\n" . __CLASS__ . __METHOD__ . "\n";
    $output .= "TODO\n";
    return $output;
  }

  /**
   * Hello.
   *
   * @return string
   *   Return Hello string.
   */
  public function hello() {
    $message = \Drupal::request()->request->get('message');
    $rand = \Drupal::request()->request->get('random');
    if ($message) {
      $time = format_date(REQUEST_TIME, 'custom', 'dM H:i:s');
      $node = Node::create([
        'uid' => 1,
        'type' => 'service',
        'title' => "$time >> $message >> $rand",
      ]);
      $node->save();
      $output = [
        'result' => 'ok',
        'time' => $time,
        'message' => $message,
        'rand' => $rand,
        'node' => $node->id(),
      ];
      $result = new JsonResponse($output);
    }
    else {
      $result = [
        '#type' => 'markup',
        '#markup' => $this->t('Implement method: hello'),
      ];
    }
    return $result;
  }

}
